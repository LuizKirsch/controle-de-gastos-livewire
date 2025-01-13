<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Exibe a página de login.
     */
    public function loginForm()
    {
        return view('auth.login');
    }

    /**
     * Processa a tentativa de login.
     */
    public function login(Request $request)
    {
        // Validação dos dados de login
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Tenta autenticar o usuário
        if (Auth::attempt($request->only('email', 'password'))) {
            // Regenera a sessão para segurança
            $request->session()->regenerate();

            // Redireciona para a rota originalmente solicitada ou para a home
            return redirect()->intended(route('home'));
        }

        // Retorna ao formulário com mensagem de erro
        return back()->withErrors([
            'email' => 'As credenciais fornecidas estão incorretas.',
        ])->onlyInput('email');
    }

    /**
     * Processa o logout.
     */
    public function logout(Request $request)
    {
        // Faz o logout do usuário
        Auth::logout();

        // Invalida a sessão
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redireciona para a página de login
        return redirect()->route('login');
    }
}
