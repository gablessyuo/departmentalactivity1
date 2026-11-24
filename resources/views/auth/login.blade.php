
<x-guest-layout>
    <h2 class="text-2xl font-bold text-center text-green-800 mb-6">
        Green Leaf Nursery
    </h2>

    <p class="text-center text-gray-600 mb-6">Login to your account</p>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <x-input-label for="email" value="Email Address" />
            <x-text-input
                id="email"
                class="block mt-1 w-full"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
                autocomplete="username"
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" value="Password" />
            <x-text-input
                id="password"
                class="block mt-1 w-full"
                type="password"
                name="password"
                required
                autocomplete="current-password"
            />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-6">
            <x-primary-button>
                Login
            </x-primary-button>
        </div>
    </form>

    <p class="text-center text-sm text-gray-600 mt-5">
        Don't have an account?
        <a href="{{ route('register') }}" class="text-green-700 font-semibold">
            Register
        </a>
    </p>
</x-guest-layout>
