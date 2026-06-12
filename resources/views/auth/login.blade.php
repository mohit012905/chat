<x-guest-layout>
<div class="w-full">

    <!-- Logo & Heading -->
    <div class="text-center mb-8">
        <h1 class="text-4xl font-extrabold text-blue-600">
            🔒 Secure Messenger
        </h1>

        <p class="text-gray-500 mt-2">
            Sign in to access your secure encrypted conversations.
        </p>
    </div>

    <!-- Login Card -->
    <div class="bg-white shadow-2xl rounded-3xl p-8">

        <!-- Session Status -->
        <x-auth-session-status
            class="mb-4"
            :status="session('status')"
        />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div>
                <x-input-label
                    for="email"
                    :value="__('Email Address')"
                />

                <x-text-input
                    id="email"
                    class="block mt-2 w-full rounded-xl"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required
                    autofocus
                    autocomplete="username"
                    placeholder="Enter your email"
                />

                <x-input-error
                    :messages="$errors->get('email')"
                    class="mt-2"
                />
            </div>

            <!-- Password -->
            <div class="mt-5">
                <x-input-label
                    for="password"
                    :value="__('Password')"
                />

                <x-text-input
                    id="password"
                    class="block mt-2 w-full rounded-xl"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password"
                    placeholder="Enter your password"
                />

                <x-input-error
                    :messages="$errors->get('password')"
                    class="mt-2"
                />
            </div>

            <!-- Remember Me -->
            <div class="mt-5">
                <label class="inline-flex items-center">
                    <input
                        id="remember_me"
                        type="checkbox"
                        name="remember"
                        class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500"
                    >

                    <span class="ms-2 text-sm text-gray-600">
                        Remember Me
                    </span>
                </label>
            </div>

            <!-- Actions -->
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mt-8 gap-4">

                @if (Route::has('password.request'))
                    <a
                        href="{{ route('password.request') }}"
                        class="text-blue-600 hover:text-blue-800 text-sm"
                    >
                        Forgot Password?
                    </a>
                @endif

                <button
                    type="submit"
                    class="bg-gradient-to-r from-blue-600 to-indigo-700 hover:from-blue-700 hover:to-indigo-800 text-white font-bold px-8 py-3 rounded-xl shadow-lg transition duration-300"
                >
                    Login 🔐
                </button>

            </div>

        </form>

    </div>

    <!-- Footer -->
    <div class="text-center mt-6">
        <p class="text-gray-500">
            New to Secure Messenger?
        </p>

        <a
            href="{{ route('register') }}"
            class="text-blue-600 font-semibold hover:text-blue-800"
        >
            Create an Account →
        </a>
    </div>

</div>

</x-guest-layout>
