<?php

// app/Http/Controllers/LoginController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Show the login form
    public function showLoginForm() {
        return view('auth.login'); // Refers to resources/views/auth/login.blade.php
    }

    // Handle login submission
    public function login(Request $request) {
        // Step 1: Validate the request (ensure valid email and password)
        $request->validate([
            'email' => 'required|email',  // Email is required and must be in proper format
            'password' => 'required|min:6' // Password is required
        ]);

        // Step 2: Attempt to log the user in
        // Auth::attempt() checks if the email and password are correct
        if (Auth::attempt($request->only('email', 'password'))) {
            // If successful, redirect to dashboard (or intended page)
            return redirect()->intended('dashboard');
        }

        // Step 3: If authentication fails, redirect back with error
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.', // Custom error message
        ])->withInput();
    }

    // Handle logout
    public function logout() {
        Auth::logout(); // Logs out the user
        return redirect('/login'); // Redirect to login page after logout
    }
}

