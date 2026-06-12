<x-guest-layout>

<div class="w-full">

    <!-- Header -->
    <div class="text-center mb-8">
        <h1 class="text-4xl font-extrabold text-blue-600">
            🔒 Secure Messenger
        </h1>

        <p class="text-gray-500 mt-2">
            Create your secure account and start encrypted communication.
        </p>
    </div>

    <!-- Registration Card -->
    <div class="bg-white shadow-2xl rounded-3xl p-8">

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Full Name')" />

                <x-text-input
                    id="name"
                    class="block mt-2 w-full rounded-xl"
                    type="text"
                    name="name"
                    :value="old('name')"
                    required
                    autofocus
                    autocomplete="name"
                    placeholder="Enter your full name"
                />

                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email -->
            <div class="mt-5">
                <x-input-label for="email" :value="__('Email Address')" />

                <x-text-input
                    id="email"
                    class="block mt-2 w-full rounded-xl"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required
                    autocomplete="username"
                    placeholder="example@email.com"
                />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-5">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input
                    id="password"
                    class="block mt-2 w-full rounded-xl"
                    type="password"
                    name="password"
                    required
                    autocomplete="new-password"
                    placeholder="Create a strong password"
                />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-5">
                <x-input-label
                    for="password_confirmation"
                    :value="__('Confirm Password')"
                />

                <x-text-input
                    id="password_confirmation"
                    class="block mt-2 w-full rounded-xl"
                    type="password"
                    name="password_confirmation"
                    required
                    autocomplete="new-password"
                    placeholder="Confirm your password"
                />

                <x-input-error
                    :messages="$errors->get('password_confirmation')"
                    class="mt-2"
                />
            </div>

            <!-- Buttons -->
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mt-8 gap-4">

                <a
                    href="{{ route('login') }}"
                    class="text-blue-600 hover:text-blue-800 font-medium"
                >
                    Already have an account?
                </a>

                <button
                    type="submit"
                    class="bg-gradient-to-r from-blue-600 to-indigo-700 hover:from-blue-700 hover:to-indigo-800 text-white font-bold px-8 py-3 rounded-xl shadow-lg transition duration-300"
                >
                    Create Account 🚀
                </button>

            </div>

        </form>

    </div>

    <!-- Footer -->
    <div class="text-center mt-6 text-sm text-gray-500">
        Your account will automatically receive a unique 6-digit Secure Messenger code.
    </div>

</div>
</x-guest-layout>
