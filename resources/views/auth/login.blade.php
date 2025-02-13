<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="flex items-center justify-between mb-4 mr-2">
            <h2 class="text-3xl font-bold text-gray-200">Log in</h2>
            <a href="/">
                <i class="fa fa-x text-gray-200"></i>
            </a>
        </div>
        <!-- Email Address -->
        <div>
            <x-text-input id="email"
                class="border text-gray-100 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 shadow-xs-light"
                type="email" name="email" :value="old('email')" required autofocus autocomplete="username"
                placeholder="E-mail" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-text-input id="password"
                class="border text-gray-100 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 shadow-xs-light"
                type="password" name="password" required autocomplete="current-password" placeholder="Password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex justify-between items-center mt-4">
            <!-- Remember Me -->
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-200">{{ __('Remember me') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-200 hover:text-gray-500 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

        </div>
        <x-primary-button class="mt-4">
            {{ __('Login') }}
        </x-primary-button>

        <!-- Register Link -->
        <div class="text-center mt-5">
            <a class="text-sm text-gray-200 hover:text-gray-400 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('register') }}">
                {{ __("Don't have an account? Register") }}
            </a>
        </div>

    </form>
</x-guest-layout>
