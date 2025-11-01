<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // action that shows the registration form
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // action that shows the change password form
    public function showChangePasswordForm()
    {
        return view('auth.change-password');
    }

    // action that shows the login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // action that handles the registration logic
    public function register(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Log the user in
        Auth::login($user);

        // Redirect to the home page
        return redirect()->route('bookmarks.index');
    }

    // action that handles the login logic
    public function login(Request $request)
    {
        // Validate the request data
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Attempt to log the user in
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirect to the home page
            // return redirect()->route('bookmarks.index');
            return redirect()->intended('bookmarks.index');
        }

        // If login fails, redirect back with an error message
        return redirect()->back()->withErrors([
            'invalid_credentials' => __('Invalid email or password.'),
        ]);
    }

    // action handles the logout logic
    public function logout()
    {
        Auth::logout();
        return redirect()->route('bookmarks.index');
    }

    public function changePassword(Request $request)
    {
        // Validate the request data
        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        // Check if the current password matches
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors([
                'current_password' => __('The current password is incorrect.'),
            ]);
        }

        // Update the user's password
        $user->password = Hash::make($request->new_password);
        $user->save();

        // Redirect back with a success message
        return
            redirect()
            ->route('bookmarks.index')
            ->with('success', __('Password changed successfully!'));
    }
}
