<x-authentication-layout>
    <h1 class="text-3xl text-gray-800 dark:text-gray-100 font-bold mb-6">{{ __('Welcome back!') }}</h1>
    @if (session('status'))
    <div class="mb-4 font-medium text-sm text-green-600">
        {{ session('status') }}
    </div>
    @endif

    <!-- Tampilkan alert jika logout sukses -->
    @if (session('logout_success'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            alert('{{ session("logout_success") }}');
        });
    </script>
    @endif

    <!-- Form -->
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="space-y-4">
            <div>
                <x-label for="email" value="{{ __('Email') }}" class="text-white" />
                <x-input id="email" type="email" name="email" :value="old('email')" required autofocus />
            </div>
            <div>
                <x-label for="password" value="{{ __('Password') }}" class="text-white" />
                <x-input id="password" type="password" name="password" required autocomplete="current-password" />
            </div>
        </div>
        <div class="flex items-center justify-between mt-6">
            @if (Route::has('password.request'))
            <div class="mr-1">
                <a class="text-sm underline hover:no-underline text-white" href="{{ route('password.request') }}">
                    {{ __('Forgot Password?') }}
                </a>
            </div>
            @endif
            <x-button class="ml-3">
                {{ __('Sign in') }}
            </x-button>
        </div>
    </form>
    <!-- terhubung ke file validation-errors.blade.php -->
    <x-validation-errors class="mt-4" />
    <!-- Footer -->
    <div class="pt-5 mt-6 border-t border-gray-100 dark:border-gray-700/60">
        <div class="text-sm text-white">
            {{ __('Don\'t you have an account?') }} <a class="font-medium text-yellow-500 hover:text-yellow-600 dark:hover:text-yellow-400" href="{{ route('register') }}">{{ __('Sign Up') }}</a>
        </div>
        <!-- Warning -->
        <div class="mt-5">
            <div class="bg-green-500/100 text-blue-700 px-3 py-2 rounded-lg">
                <span class="text-sm">
                    <!-- menyesuaikan dengan tahun yang terbaru -->
                    &copy; Copy Right {{ date('Y') }}.
                </span>
            </div>
        </div>
    </div>
</x-authentication-layout>