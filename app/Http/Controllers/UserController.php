<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //show register form
    public function create()
    {
        return view('users.register');
    }

    //show login form
    public function login()
    {
        return view('users.login');
    }
}
