<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function dashboard()
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            return view('dashboard');
        }

        // If the user is not authenticated, redirect to the login form
        return redirect()->route('loginForm');
    }

    public function loginForm()
    {
        if (Auth::check()) {
            // User is already logged in, redirect to the dashboard
            return view('dashboard');
        }

        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Check if the user's email is verified
            if (Auth::user()->email_verified_at) {
                // Authentication passed
                return view('dashboard');
            } else {
                // Email is not verified
                Auth::logout(); // Log the user out
                return redirect()->route('loginForm')->with('error', 'Email not verified. Please check your email for verification instructions.');
            }
        }

        // Authentication failed
        return redirect()->route('loginForm')->with('error', 'Invalid credentials');
    }

    public function registerForm(){
        return view('auth.register');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('loginForm'); // Redirect to the login form after logout
    }

    public function register(Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|string|min:6',

        ]);

        $token = Str::random(24);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => $token


        ]);

        Mail::send('auth.verification-mail', ['user' => $user], function($mail) use($user){
            $mail->to($user->email);
            $mail->subject('Account Verification');
        });

        return redirect('/')->with('message', 'Your account has been created, Please check your email for verification');
    }

    public function verification(User $user, $token){
        if($user->remember_token !== $token){
            return redirect('/')->with('error', 'Invalid token');
        }

        $user->email_verified_at = now();
        $user->save();

        return redirect('/')->with('message', 'Your account has been verified');
    }
}
