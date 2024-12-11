<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="max-w-md mx-auto bg-white overflow-hidden mt-10">
        <div class="px-1 py-4">
            <h2 class="text-2xl font-bold text-center text-red-700">Welcome Back!</h2>
            <p class="text-center text-gray-600 mt-2">Please login to your account</p>

            <form method="POST" action="{{ route('login') }}" class="mt-6">
                @csrf

                <!-- Mobile Number -->
                <div class="mb-4">
                    <x-input-label for="cp_number" :value="__('Mobile Number')" class="text-red-700" />
                    <x-text-input id="cp_number" class="block mt-1 w-full rounded-md shadow-sm" type="text"
                        name="cp_number" :value="old('cp_number')" required autofocus autocomplete="tel"
                        placeholder="Enter your mobile number" />
                    <x-input-error :messages="$errors->get('cp_number')" class="mt-2 text-red-700" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <x-input-label for="password" :value="__('Password')" class="text-red-700" />
                    <x-text-input id="password" class="block mt-1 w-full rounded-md shadow-sm" type="password"
                        name="password" required autocomplete="current-password" placeholder="Enter your password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-700" />
                </div>

                <div class="flex items-center justify-end">
                    <x-primary-button class="w-full bg-red-700 hover:bg-red-800 text-white uppercase">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>