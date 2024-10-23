<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; // Import Auth if you plan to use it

class RegisterController extends Controller
{
    // Show the registration form
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Handle registration
    public function register(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create the user with a hashed password
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash the password
        ]);

        // Optionally log in the user after registration
        // Auth::login($user);
        return redirect()->route('login')->with('success', 'Registration successful! You can now log in.');
    }
}

