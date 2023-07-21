<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TutorController extends Controller
{
    public function showRegistrationForm()
    {
        return view('tutor.register');
    }

    public function register(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        // Create a new user
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        // Log in the user
        Auth::login($user);

        // Redirect to the tutor's dashboard or homepage
        return redirect()->route('dashboard');
    }

    public function showLoginForm()
    {
        return view('tutor.login');
    }

    public function login(Request $request)
    {
        // Validate the login form data
        $credentials = $request->only('email', 'password');
        $remember = $request->filled('remember');

        // Attempt to authenticate the user
        if (Auth::attempt($credentials, $remember)) {
            // Authentication successful, redirect to the tutor's dashboard or homepage
            return redirect()->route('dashboard');
        }

        // Authentication failed, redirect back to the login form with an error message
        return redirect()->back()->withInput()->withErrors([
            'email' => 'Invalid credentials',
        ]);
    }
}
