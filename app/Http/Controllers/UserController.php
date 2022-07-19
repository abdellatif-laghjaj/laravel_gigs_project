<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Show Register/Create Form
    public function create()
    {
        return view('users.register');
    }

    // Create New User
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:6'],
            'email' => ['email', 'required', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:8']
        ]);

        //hash the password
        $formFields['password'] = bcrypt($formFields['password']);

        //create user
        $user = User::create($formFields);

        //login
        auth()->login($user);

        //redirect to homepage
        return redirect('/')->with("message", 'User created and loged in');
    }

    // Logout User
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect("/")->with("message", "You have been logged out");
    }

    // Show Login Form
    public function login()
    {
        return view('users.login');
    }

    // Authenticate User
    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['email', 'required'],
            'password' => 'required'
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();
            return redirect("/")->with("message", "You're you logged in");
        }
        return back()->withErrors([
            'email' => 'The credentials you entered did not match our records. Please try again.'
        ])->onlyInput('email');
    }
}
