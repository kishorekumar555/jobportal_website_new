<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function showAuth(){
        return view('auth');
    }

    public function register(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'UserType' => 'required|string',
            'Name' => 'required|string',
            'Email' => 'required|string|email|unique:users',
            'Password' => 'required|string|min:6',
        ]);

        // Insert data into users table
        $user = User::create([
            'UserType' => $request->UserType,
            'Name' => $request->Name,
            'Email' => $request->Email,
            'Password' => Hash::make($request->Password),
            'RegistrationDate' => now(), // Set current timestamp
        ]);

        // Log in the user after registration
        Auth::login($user);

        // Redirect to a specific route after registration
        return redirect()->route('Home');
    }

    public function login(Request $request)
    {
        // Validate login credentials
        $request->validate([
            'Email' => 'required|email',
            'Password' => 'required|string',
        ]);

        // Attempt to log in the user
        if ((Auth::attempt(['Email' => $request->Email, 'Password' => $request->Password]))) {
            return redirect()->route('Home');
        }

        // Handle failed login
        throw ValidationException::withMessages([
            'Email' => [trans('auth.failed')],
        ]);
    }
}