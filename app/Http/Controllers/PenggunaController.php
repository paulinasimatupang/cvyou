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
<<<<<<< Updated upstream
}
=======
<<<<<<< HEAD

    public function showRegistrationForm()
    {
        return view('Register');
    }

    public function register(Request $request)
    {
        // Validasi data pendaftaran di sini jika diperlukan

        // Simpan pengguna baru ke database
        $user = Pengguna::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        // Login pengguna setelah pendaftaran
        Auth::login($user);

        return redirect('/dashboard');
    }


}
=======
}
>>>>>>> d5ca2ecd7db21f7d9c279f95582400c48e5e7275
>>>>>>> Stashed changes
