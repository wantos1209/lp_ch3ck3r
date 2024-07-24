<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->isadmin) {
                return redirect('/');
            } else {
                Auth::logout();
                return back()->withErrors([
                    'username' => 'You do not have admin access.',
                ]);
            }
        } else {
            // Login gagal
            return back()->withErrors([
                'username' => 'Incorrect username or password.',
            ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();
        return redirect('/');
    }
}
