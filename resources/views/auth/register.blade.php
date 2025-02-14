<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf
        <div class="flex items-center justify-between mb-4 mr-2">
            <h2 class="text-3xl font-bold text-gray-200">Register</h2>
            <a href="/">
                <i class="fa fa-x text-gray-200"></i>
            </a>
        </div>
        <!-- Name -->
        <div>
            <x-text-input id="name"
                class="border text-gray-100 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 shadow-xs-light"
                type="text" name="name" :value="old('name')" required autofocus autocomplete="name"
                placeholder="Name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-text-input id="email"
                class="border text-gray-100 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 shadow-xs-light"
                type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>



        <!-- Password -->
        <div class="mt-4">
            <x-text-input id="password"
                class="border text-gray-100 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 shadow-xs-light"
                type="password" name="password" required autocomplete="new-password" placeholder="Password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-text-input id="password_confirmation"
                class="border text-gray-100 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 shadow-xs-light"
                type="password" name="password_confirmation" required autocomplete="new-password"
                placeholder="Confirm Password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-2">
            <x-primary-button class="">
                {{ __('Register') }}
            </x-primary-button>

            <div class="text-center mt-4">
                <a class="underline text-sm text-gray-200 hover:text-gray-500 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('login') }}">
                    {{ __('Already registered? Login') }}
                </a>
            </div>
        </div>
    </form>
</x-guest-layout>
