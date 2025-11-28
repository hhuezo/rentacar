@extends('layouts.app')

@section('content')

<!-- Cargar Tailwind SOLO para esta vista -->
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;700;800&display=swap" rel="stylesheet" />

<style>
    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
    }
</style>

<div class="relative flex min-h-screen w-full flex-col bg-gray-100 overflow-x-hidden py-10">

    <div class="flex flex-1 justify-center items-center px-4">
        <div class="w-full max-w-md">

            <!-- LOGO + NOMBRE -->
            <header class="flex items-center justify-center px-10 py-3 mb-6">
                <div class="flex items-center gap-4">
                    <div class="text-blue-700 size-8">
                        <svg fill="none" viewBox="0 0 48 48">
                            <path d="M24 4C25.7 14.2 33.8 22.2 44 24C33.8 25.8 25.7 33.8 24 44C22.2 33.8 14.2 25.7 4 24C14.2 22.2 22.2 14.2 24 4Z" fill="currentColor"/>
                        </svg>
                    </div>
                    <h2 class="text-blue-700 text-2xl font-bold">Sofía Renta Car</h2>
                </div>
            </header>

            <!-- CARD -->
            <main class="flex flex-col bg-white p-6 sm:p-8 rounded-xl border border-gray-200">

                <h1 class="text-gray-800 text-[32px] font-bold text-center">Bienvenido</h1>
                <p class="text-gray-500 text-base text-center pb-8 pt-1">
                    Inicia sesión para administrar tus reservas.
                </p>

                <!-- FORM LOGIN -->
                <form method="POST" action="{{ route('login') }}" class="w-full flex flex-col gap-4 px-4">
                    @csrf

                    <!-- Email -->
                    <label class="flex flex-col w-full">
                        <p class="text-gray-800 text-sm font-medium pb-2">Correo electrónico</p>
                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required autofocus
                            class="form-input flex w-full rounded-lg border border-gray-300 bg-gray-50 h-12 px-4 text-gray-800 focus:ring-2 focus:ring-blue-500 @error('email') border-red-500 @enderror"
                            placeholder="Ingresa tu correo"
                        >
                        @error('email')
                            <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </label>

                    <!-- Password -->
                    <label class="flex flex-col w-full">
                        <div class="flex justify-between items-center pb-2">
                            <p class="text-gray-800 text-sm font-medium">Contraseña</p>
                            @if (Route::has('password.request'))
                                <a class="text-blue-700 text-sm font-medium hover:underline" href="{{ route('password.request') }}">
                                    ¿Olvidaste tu contraseña?
                                </a>
                            @endif
                        </div>

                        <div class="relative flex items-center">
                            <input
                                id="password"
                                type="password"
                                name="password"
                                required
                                class="form-input flex w-full rounded-lg border border-gray-300 bg-gray-50 h-12 px-4 text-gray-800 focus:ring-2 focus:ring-blue-500 @error('password') border-red-500 @enderror"
                                placeholder="Ingresa tu contraseña"
                            >
                        </div>

                        @error('password')
                            <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </label>

                    <!-- Remember -->
                    <label class="flex items-center gap-2 mt-2">
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} class="rounded border-gray-300 text-blue-700 h-4 w-4">
                        <span class="text-gray-700 text-sm">Recordarme</span>
                    </label>

                    <!-- Submit -->
                    <button class="mt-4 flex items-center justify-center rounded-lg h-12 w-full bg-blue-700 text-white font-bold hover:bg-blue-800 transition">
                        Iniciar sesión
                    </button>
                </form>

                <!-- Register -->
                <p class="text-gray-500 text-sm text-center mt-8">
                    ¿No tienes una cuenta?
                    <a class="font-medium text-blue-700 hover:underline" href="{{ route('register') }}">
                        Regístrate
                    </a>
                </p>

            </main>
        </div>
    </div>
</div>

@endsection
