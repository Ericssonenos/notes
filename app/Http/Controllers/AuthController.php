<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\User;

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
                'text_email' => 'required|email',
                'text_password' => 'required|min:6|max:10'
            ],
            // mensagens de validação personalizadas
            [
                'text_email.required' => 'O campo de e-mail é obrigatório.',
                'text_email.email' => 'O campo de e-mail deve ser um endereço de e-mail válido.',
                'text_password.required' => 'O campo de senha é obrigatório.',
                'text_password.min' => 'A senha deve ter pelo menos 6 caracteres.',
                'text_password.max' => 'A senha não pode ter mais de 10 caracteres.'
            ]
        );

       $user = User::where('text_email', $request->text_email)
            ->where('deleted_at', null)
            ->first();
        if(!$user) {
            return redirect()->back()->withErrors(['text_email' => 'e-mail inválido.'])->withInput();
        }

       if(!password_verify($request->text_password, $user->text_password)) {
           return redirect()->back()->withErrors(['text_password' => 'senha inválida.'])->withInput();
       }

       $user->dt_last_login = now();
       $user->save();

       session(
        [
            'user_id' => $user->id,
            'user_email' => $user->text_email,
        ]
       );

         return redirect('/');
    }

    public function logout()
    {
        session()->forget(['user_id', 'user_email']);
        return redirect('/login');
    }
}
