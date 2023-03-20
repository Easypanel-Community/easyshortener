{{-- https://shouts.dev/articles/laravel-two-factor-authentication-with-google-authenticator --}}
<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Please confirm access to your account by entering the authentication code provided by your authenticator application.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('2faVerify') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="one_time_password" />
            <x-text-input  id="one_time_password" name="one_time_password" class="block mt-1 w-full" type="text" required autofocus />
        </div>

        @if ($errors->any())
            <div class="relative px-3 py-3 mb-4 text-red-500">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Authenticate') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>