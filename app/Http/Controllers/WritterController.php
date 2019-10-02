<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WritterController extends Controller
{

    protected $redirectTo = '/writter/login';

    public function __construct()
    {
        $this->middleware('auth:writter');

    }

    public function index()
    {
        return view('writter-home');
    }

}
