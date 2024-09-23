<!-- login.blade.php -->
<x-guest-layout>
    <a href="/" class="text-center">
        <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
    </a>
    <form method="POST" action="{{ route('login') }}" class="container-sm my-5 p-5 rounded-3 border shadow-lg text-primary bg-white">
        @csrf
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Email Address -->
        <div class="mb-3">
            <x-input-label for="email" :value="__('Email')" class="text-primary" />
            <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mb-3">
            <x-input-label for="password" :value="__('Password')" class="text-primary" />
            <x-text-input id="password" class="form-control"
                          type="password"
                          name="password"
                          required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="mb-3 form-check">
            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
            <label for="remember_me" class="form-check-label text-primary">{{ __('Remember me') }}</label>
        </div>

        <div class="d-flex justify-content-between">
            @if (Route::has('password.request'))
                <a class="text-decoration-none text-primary" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <button class="btn-dark">
                {{ __('Log in') }}
            </button>
        </div>
    </form>
</x-guest-layout>
