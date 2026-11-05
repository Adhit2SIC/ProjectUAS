<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.Login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'Alamat Email wajib diisi.',
            'email.email' => 'Format Email tidak valid.',
            'password.required' => 'Kata Sandi wajib diisi.',       
            ]
    );

    $remember = $request ->has('remember');
    if (Auth::attempt($credentials, $remember)){
            $request->session()->regenerate();
          $user = Auth::user();
          if ($user->peran === 'admin'){
            return admin()->intended('/dashboard');
          }
          return redirect()->intended('/dashboard');
       }
       return back()->with('error', 'Email atau kata sandi yang Anda masukkan salah.')->withInput($request->only('email'));
}
public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}

