<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Exibir tela de login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Validar login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ], [
            'email.required'    => 'O campo e-mail é obrigatório.',
            'email.email'       => 'Digite um e-mail válido.',
            'password.required' => 'O campo senha é obrigatório.',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/produtos')->with('success', 'Login realizado com sucesso!');
        }

        return back()->withErrors([
            'email' => 'As credenciais informadas não conferem.',
        ])->onlyInput('email');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
