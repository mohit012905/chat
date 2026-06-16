<x-guest-layout>

<div class="min-h-screen bg-slate-50 py-12">

    <div class="max-w-7xl mx-auto px-6">

        <div
            class="grid lg:grid-cols-[55%_45%]
            bg-white
            rounded-[40px]
            shadow-[0_20px_80px_rgba(0,0,0,0.08)]
            overflow-hidden">

            <!-- LEFT SIDE -->

            <div
                class="hidden lg:flex flex-col justify-between
                bg-gradient-to-br from-[#5865F2] via-[#4F5BD5] to-[#3B45B8]
                text-white p-12 min-h-[750px]">

                <!-- Logo -->

                <div>

                    <div class="flex items-center gap-4">

                        <div
                            class="w-14 h-14 rounded-3xl bg-white/20 flex items-center justify-center text-2xl">

                            🔒

                        </div>

                        <div>

                            <h1 class="text-2xl font-black">

                                Secure Messenger

                            </h1>

                            <p class="text-indigo-100">

                                Private Communication Platform

                            </p>

                        </div>

                    </div>

                </div>

                <!-- Main Content -->

                <div>

                   

                    <h2
                        class="mt-6 text-5xl xl:text-6xl font-black leading-tight">

                        Secure Access

                        <br>

                        To Your

                        <br>

                        Messages

                    </h2>

                    <p
                        class="mt-6 text-lg text-indigo-100 max-w-lg">

                        Sign in to access your trusted contacts,
                        manage requests and continue secure conversations.

                    </p>

                    <div class="space-y-4 mt-8">

                        <div class="flex items-center gap-3">

                            <div
                                class="w-8 h-8 rounded-xl bg-white/20 flex items-center justify-center">

                                ✓

                            </div>

                            <span>Trusted Connections</span>

                        </div>

                        <div class="flex items-center gap-3">

                            <div
                                class="w-8 h-8 rounded-xl bg-white/20 flex items-center justify-center">

                                ✓

                            </div>

                            <span>Private Messaging</span>

                        </div>

                        <div class="flex items-center gap-3">

                            <div
                                class="w-8 h-8 rounded-xl bg-white/20 flex items-center justify-center">

                                ✓

                            </div>

                            <span>Real-Time Communication</span>

                        </div>

                    </div>

                    <!-- Preview Card -->

                    <div
                        class="mt-10 bg-white/10 backdrop-blur-xl rounded-3xl p-6 border border-white/10">

                        <div class="space-y-4">

                            <div
                                class="bg-white/10 rounded-2xl p-4">

                                🟢 12 Contacts Online

                            </div>

                            <div
                                class="bg-white/10 rounded-2xl p-4">

                                📨 3 Pending Requests

                            </div>

                            <div
                                class="bg-white/10 rounded-2xl p-4">

                                🔒 Secure Session Ready

                            </div>

                        </div>

                    </div>

                </div>

                <div class="text-indigo-200 text-sm">

                    © {{ date('Y') }} Secure Messenger

                </div>

            </div>

            <!-- RIGHT SIDE -->

            <div
                class="flex items-center justify-center p-12 bg-slate-50">

                <div class="w-full max-w-md">

                    <div class="text-center mb-8">

                        <h2
                            class="text-4xl font-black text-slate-900">

                            Sign In

                        </h2>

                        <p
                            class="mt-2 text-slate-500">

                            Welcome back to Secure Messenger

                        </p>
                                
                    </div>

                    <div
                        class="bg-white rounded-[28px] border border-slate-200 p-8 shadow-xl">

                        <form
                            method="POST"
                            action="{{ route('login') }}"
                            class="space-y-5">

                            @csrf

                            <!-- Email -->

                            <div>

                                <label
                                    class="block text-sm font-medium mb-2">

                                    Email Address

                                </label>

                                <input
                                    type="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    required
                                    autofocus
                                    placeholder="john@example.com"
                                    class="w-full h-12 px-4 rounded-xl border border-slate-300 focus:border-[#5865F2] focus:ring-[#5865F2]">

                                <x-input-error
                                    :messages="$errors->get('email')"
                                    class="mt-2" />

                            </div>

                            <!-- Password -->

                            <div>

                                <label
                                    class="block text-sm font-medium mb-2">

                                    Password

                                </label>

                                <input
                                    type="password"
                                    name="password"
                                    required
                                    placeholder="Enter password"
                                    class="w-full h-12 px-4 rounded-xl border border-slate-300 focus:border-[#5865F2] focus:ring-[#5865F2]">

                                <x-input-error
                                    :messages="$errors->get('password')"
                                    class="mt-2" />

                            </div>

                            <!-- Remember Me -->

                            <div class="flex items-center justify-between">

                                <label
                                    class="flex items-center gap-2 text-sm text-slate-600">

                                    <input
                                        type="checkbox"
                                        name="remember"
                                        class="rounded border-slate-300">

                                    Remember Me

                                </label>

                                @if (Route::has('password.request'))

                                    <a
                                        href="{{ route('password.request') }}"
                                        class="text-sm text-[#5865F2] hover:underline">

                                        Forgot Password?

                                    </a>

                                @endif

                            </div>

                            <!-- Button -->

                            <button
                                type="submit"
                                class="w-full h-12 rounded-xl bg-[#5865F2] text-white font-semibold hover:bg-[#4752C4] transition">

                                Sign In

                            </button>

                        </form>

                        <div
                            class="border-t border-slate-200 mt-6 pt-6">

                            <p
                                class="text-center text-sm text-slate-500">

                                Don't have an account yet?

                            </p>

                            <div class="text-center mt-4">

                                <a
                                    href="{{ route('register') }}"
                                    class="font-semibold text-[#5865F2] hover:underline">

                                    Create Account

                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</x-guest-layout>