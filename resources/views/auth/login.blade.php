@extends('layouts.app')

@section('content')
    <form
        method="POST"
        action="{{ route('login') }}"
        class="lg:w-1/2 lg:mx-auto bg-card py-12 px-16 rounded shadow"
    >
        @csrf

        <h1 class="text-2xl font-normal mb-10 text-center">Login</h1>

        <div class="mb-6">
            <label for="email" class="text-sm mb-2 block">E-Mail Address</label>

            <input id="email"
                type="email"
                class="border border-gray-400 rounded p-2 text-xs w-full @error('email') border-error @enderror"
                name="email"
                value="{{ old('email') }}"
                required autocomplete="email"
                autofocus
            >

            @error('email')
                <span class="text-error text-sm" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-6">
            <label for="password" class="text-sm mb-2 block">Password</label>

            <div>
                <input id="password"
                    type="password"
                    class="border border-gray-400 rounded p-2 text-xs w-full @error('password') border-error @enderror"
                    name="password"
                    required autocomplete="current-password">

                @error('password')
                    <span class="" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="mb-6">
            <div class="flex items-center">
                <input
                    class="mr-2"
                    type="checkbox"
                    name="remember"
                    id="remember"
                    {{ old('remember') ? 'checked' : '' }}
                >

                <label class="text-sm" for="remember">Remember Me</label>
            </div>
        </div>

        <button type="submit" class="button mr-2">Login</button>

        @if (Route::has('password.request'))
            <a class="text-accent" href="{{ route('password.request') }}">
                Forgot Your Password?
            </a>
        @endif
    </form>
@endsection
