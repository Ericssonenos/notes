@extends('layouts.mainLayout')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-50 dark:bg-gray-900 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
                <div class="mx-auto h-12 w-12 text-center">
                    <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900 dark:text-white">
                        Notes
                    </h2>
                </div>
                <p class="mt-2 text-center text-sm text-gray-600 dark:text-gray-400">
                    Acesse o sistema com suas credenciais
                </p>
            </div>

            @if(session('status'))
                <div class="mb-4 text-center text-sm font-medium text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <form class="mt-8 space-y-6" action="/loginSubmit" method="post" novalidate>
                @csrf
                <div class="space-y-6">
                    <div class="space-y-2">
                        <label for="text_email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Email
                        </label>
                        <input
                            id="text_email"
                            name="text_email"
                            type="email"
                            autocomplete="email"
                            required
                            autofocus
                            tabindex="1"
                            value="{{ old('text_email') }}"
                            placeholder="seu.email@empresa.com"
                            class="appearance-none relative block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 placeholder-gray-500 dark:placeholder-gray-400 text-gray-900 dark:text-white rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm dark:bg-gray-800"
                        />
                        @error('text_email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <div class="flex items-center justify-between">
                            <label for="text_password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Senha
                            </label>
                            {{-- Uncomment if you have password reset functionality
                            <a href="#" class="text-sm text-blue-600 hover:text-blue-500" tabindex="5">
                                Esqueceu a senha?
                            </a>
                            --}}
                        </div>
                        <input
                            id="text_password"
                            name="text_password"
                            type="password"
                            autocomplete="current-password"
                            required
                            tabindex="2"
                            placeholder="Sua senha"
                            class="appearance-none relative block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 placeholder-gray-500 dark:placeholder-gray-400 text-gray-900 dark:text-white rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm dark:bg-gray-800"
                        />
                        @error('text_password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-between">
                        <label for="remember" class="flex items-center space-x-3">
                            <input
                                id="remember"
                                name="remember"
                                type="checkbox"
                                tabindex="3"
                                class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                            />
                            <span class="text-sm text-gray-700 dark:text-gray-300">Lembrar de mim</span>
                        </label>
                    </div>

                    <button
                        type="submit"
                        tabindex="4"
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:bg-blue-600 dark:hover:bg-blue-700 transition-colors"
                    >
                        Entrar no Sistema
                    </button>
                </div>

                {{-- Error messages --}}
                @if(session('loginError'))
                    <div class="rounded-md bg-red-50 dark:bg-red-900 p-4">
                        <div class="text-sm text-red-800 dark:text-red-200">
                            {{ session('loginError') }}
                        </div>
                    </div>
                @endif

                <div class="text-center text-sm text-gray-600 dark:text-gray-400">
                    Não tem acesso ao sistema?
                    {{-- Uncomment if you have registration functionality
                    <a href="/register" tabindex="5" class="font-medium text-blue-600 hover:text-blue-500">
                        Solicitar cadastro
                    </a>
                    --}}
                </div>
            </form>

            <!-- Copyright -->
            <div class="text-center text-xs text-gray-500 dark:text-gray-400 mt-8">
                &copy; {{ date('Y') }} Notes. Todos os direitos reservados.
            </div>
        </div>
    </div>
@endsection
