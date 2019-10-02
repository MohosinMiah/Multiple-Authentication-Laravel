<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
class LoginController extends Controller
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('Userlogout');

            // $this->middleware('guest')->except('logout');
            // $this->middleware('guest:admin')->except('logout');
            // $this->middleware('guest:writer')->except('logout');

    }
    public function Userlogout(Request $request)
    {
        Auth::guard('web')->logout();
        // $request->session()->flush();
        // $request->session()->regenerate();
        return redirect('/');
    }

}
