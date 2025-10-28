<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('login');
    }

    // Handle login
    public function login(Request $request)
    {
        $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
        ]);

        // Check if the user exists
        $user = User::where('email', $credentials['email'])->first();

        if (!$user) {
            return back()->with('error', 'No account found with that email.')->withInput();
        }

        // Check password manually for clearer message
        if (!Hash::check($credentials['password'], $user->password)) {
            return back()->with('error', 'Incorrect password.')->withInput();
        }

        // If everything is correct, log them in
        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->intended('/')->with('success', 'Welcome back, ' . $user->name . '!');
    }

    // Show register form
    public function showRegisterForm()
    {
        return view('register');
    }

    // Handle register
    public function register(Request $request)
    {

        // dd('Register method reached');
        // dd($request->all());

        $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6',
        ]);

        // Create new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Optionally log in the user immediately after registration
        auth()->login($user);

        // Redirect with success
        return redirect()->route('/')->with('success', 'Welcome aboard, ' . $user->name . '!');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
