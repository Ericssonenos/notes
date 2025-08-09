<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
        public function login()
    {
        return view('auth.login');
    }

    public function loginSubmit(Request $request)
    {
        $request->validate(
            // Regras de validação
            [
                'text_username' => 'required|email',
                'text_password' => 'required|min:6|max:10'
            ],
            // mensagens de validação personalizadas
            [
                'text_username.required' => 'O campo de e-mail é obrigatório.',
                'text_username.email' => 'O campo de e-mail deve ser um endereço de e-mail válido.',
                'text_password.required' => 'O campo de senha é obrigatório.',
                'text_password.min' => 'A senha deve ter pelo menos 6 caracteres.',
                'text_password.max' => 'A senha não pode ter mais de 10 caracteres.'
            ]
        );

        $username = $request->input('text_username');
        $password = $request->input('text_password');

        echo "Username: $username, Password: $password";
    }

    public function logout()
    {
        echo "logout";
    }
}
