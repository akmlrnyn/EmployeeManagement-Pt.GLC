<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
            <h1 style="font-weight: 700; font-size:1.1rem">PT. GLC Indonesia</h1>
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label class="text-xs" for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="example@gmail.com" />
            </div>

            <div class="mt-4">
                <x-label class="text-xs" for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex flex-col gap-4 items-center justify-start mt-4">
                <div class="flex">
                <x-button class="ms-0">
                    {{ __('Log in') }}
                </x-button>
                <x-button class="ms-3">
                    <a href="{{ url('/register') }}">Register</a>
                </x-button>
                </div>
            </div>
        </form>
        
    </x-authentication-card>
</x-guest-layout>
