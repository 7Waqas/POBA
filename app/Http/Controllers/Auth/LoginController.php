<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLogin()
    {
        if (Auth::guard('web')->check()) {
            return redirect()->route('admin.dashboard');
        }
        if (Auth::guard('alumni')->check()) {
            return redirect()->route('home');
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        $remember    = $request->boolean('remember');

        // 1. Try admin guard first
        if (Auth::guard('web')->attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        }

        // 2. Try alumni guard
        if (Auth::guard('alumni')->attempt($credentials, $remember)) {
            $alumni = Auth::guard('alumni')->user();

            // Block inactive / suspended accounts
            if (! $alumni->is_active) {
                Auth::guard('alumni')->logout();
                return back()->withErrors(['email' => 'Your account has been suspended. Please contact support.']);
            }

            // Block unapproved accounts
            if ($alumni->status !== 'approved') {
                Auth::guard('alumni')->logout();
                $message = $alumni->status === 'rejected'
                    ? 'Your application was not approved. Please contact support.'
                    : 'Your account is pending admin approval. You will receive an email once approved.';
                return back()->withErrors(['email' => $message]);
            }

            $request->session()->regenerate();
            return redirect()->intended(route('home'));
        }

        return back()
            ->withErrors(['email' => 'The provided credentials do not match our records.'])
            ->withInput($request->only('email', 'remember'));
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        Auth::guard('alumni')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}