<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class logged
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verifica se o usuário está autenticado
        if(!session()->has('user_id')) {
            // Redireciona para a página de login se não estiver autenticado
            return redirect('/login');
        }
        // Se estiver autenticado, permite o acesso à próxima solicitação
        return $next($request);
    }
}
