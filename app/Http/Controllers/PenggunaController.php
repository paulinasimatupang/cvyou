<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Auth;

class PenggunaController extends Controller
{
    public function showLoginForm()
    {
        return view('Pengguna');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/dashboard');
        }

        return redirect()->route('login')->with('error', 'Invalid credentials');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}