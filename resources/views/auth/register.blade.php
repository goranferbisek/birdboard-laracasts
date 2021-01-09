@extends('layouts.app')

@section('content')
    <form
        method="POST"
        action="{{ route('register') }}"
        class="lg:w-1/2 lg:mx-auto bg-card py-12 px-16 rounded shadow"
    >
        @csrf

        <h1 class="text-2xl font-normal mb-10 text-center">Register</h1>

        <div class="mb-6">
            <label for="name" class="text-sm mb-2 block">Name</label>

            <input id="name"
                type="text"
                class="border border-gray-400 rounded p-2 text-xs w-full @error('name') border-error @enderror"
                name="name"
                value="{{ old('name') }}"
                required
                autocomplete="name"
                autofocus
            >

            @error('name')
                <span class="text-error" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-6">
            <label for="email" class="text-sm mb-2 block">E-Mail Address</label>

            <input id="email"
                type="email"
                class="border border-gray-400 rounded p-2 text-xs w-full @error('email') border-error @enderror"
                name="email"
                value="{{ old('email') }}"
                required
                autocomplete="email"
            >

            @error('email')
                <span class="text-error" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-6">
            <label for="password" class="text-sm mb-2 block">Password</label>

            <div class="col-md-6">
                <input id="password"
                    type="password"
                    class="border border-gray-400 rounded p-2 text-xs w-full @error('password') border-error @enderror"
                    name="password"
                    required
                    autocomplete="new-password"
                >

                @error('password')
                    <span class="text-error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="mb-6">
            <label for="password-confirm" class="text-sm mb-2 block">Confirm Password</label>

            <div class="col-md-6">
                <input id="password-confirm"
                    type="password"
                    class="border border-gray-400 rounded p-2 text-xs w-full"
                    name="password_confirmation"
                    required
                    autocomplete="new-password"
                >
            </div>
        </div>

        <button type="submit" class="button">Register</button>
    </form>
@endsection
