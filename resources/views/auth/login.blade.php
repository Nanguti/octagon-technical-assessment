<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <select id="login_method" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="login_method" required>
                <option selected disabled>Select a Login Method</option>
                <option value="email">Email</option>
                <option value="fingerprint">Fingerprint</option>
            </select>
        </div>

        <!-- Email Address -->
        <div class="mt-4 d-none" id="email_field">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4 d-none" id="password_field">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mt-4 d-none" id="fingerprint_field">
            <x-input-label for="fingerprint" :value="__('Fingerprint')" />
            <x-text-input id="fingerprint" class="block mt-1 w-full" type="text" name="fingerprint" />
        </div>
        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
        
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800 px-2 " href="{{ route('register') }} ">
                {{ __('Not registered? ') }}
            </a>

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
        
    </form>
    <style> 
        .d-none {
            display: none !important;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const loginMethodSelect = document.getElementById('login_method');
            const emailField = document.getElementById('email_field');
            const passwordField = document.getElementById('password_field');
            const fingerprintField = document.getElementById('fingerprint_field');
            const fingerprintInput = document.getElementById('fingerprint');

            // Hide email, password, and fingerprint fields initially
            emailField.classList.add('d-none');
            passwordField.classList.add('d-none');
            fingerprintField.classList.add('d-none');

            if (loginMethodSelect && emailField && fingerprintField) {
                loginMethodSelect.addEventListener('change', function() {
                    const selectedMethod = this.value;
                    if (selectedMethod === 'email') {
                        emailField.classList.remove('d-none');
                        passwordField.classList.remove('d-none');
                        fingerprintField.classList.add('d-none');
                        fingerprintInput.removeAttribute('required');
                        fingerprintInput.removeAttribute('autofocus');
                    } else if (selectedMethod === 'fingerprint') {
                        emailField.classList.add('d-none');
                        passwordField.classList.add('d-none');
                        fingerprintField.classList.remove('d-none');
                        fingerprintInput.setAttribute('required', 'required');
                        fingerprintInput.setAttribute('autofocus', 'autofocus');
                    }
                });
            } else {
                console.error("One or more elements not found.");
            }
        });

    </script>
</x-guest-layout>
