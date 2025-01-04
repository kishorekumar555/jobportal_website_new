<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function showAuth()
    {
        return view('auth');
    }

    public function register(Request $request)
    {
        // Validate the form data
        $request->validate([
       'user_type' => 'required|string|max:255',
       'name' => 'required|string|max:255',
       'email' => 'required|string|email|max:255|unique:users,email',
       'password' => 'required|string|min:6',
        ]);

            // Create a new user
        $user = User::create([
        'user_type' => $request->user_type,
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'registration_date' => now(),
            ]);

        // Log the user in
        Auth::login($user);

        return redirect()->route('Home')->with('success', 'Registration successful!');
    }
    public function login(Request $request)
{
    // Validate login data
    $credentials = $request->validate([
        'email' => 'required|string|email',
        'password' => 'required|string',
    ]);

    if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {
        $request->session()->regenerate();
        return redirect()->intended(route('Home'))->with('success', 'Logged in successfully!');
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ])->onlyInput('email');
}

}
