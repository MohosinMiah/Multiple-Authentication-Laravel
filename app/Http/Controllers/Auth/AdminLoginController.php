<?php

namespace App\Http\Controllers\Auth;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminLoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
            // $this->middleware('guest');
            $this->middleware('guest:admin')->except('logout');
            // $this->middleware('guest:writter');

    }


    public function showAdminRegisterForm(){

        return view('auth.admin-register');

    }


    public function createAdmin(Request $request)
    {

            $admin = Admin::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
            ]);

        //     var_dump($admin);

        $this->guard()->login($admin);

        return redirect()->intended(route('admin.dashboard'));
    }


    public function showLoginForm()
    {
        return view('auth.admin-login');
    }


    public function login(Request $request)
    {
        $this->validateLogin($request);

        if ($this->attemptLogin($request)) {

            return redirect()->intended(route('admin.dashboard'));

        //  return redirect()->route('admin.dashboard');
        }

        return redirect()->back();
    }


    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }


    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }



    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

    public function username()
    {
        return 'email';
    }


    public function logout()
    {
        Auth::guard('admin')->logout();
        // $request->session()->flush();
        // $request->session()->regenerate();
        return redirect('/');
    }


    protected function guard()
    {
        return Auth::guard('admin');
    }
}
