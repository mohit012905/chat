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
            class="hidden lg:flex flex-col justify-between overflow-y-auto
            bg-gradient-to-br from-[#5865F2] via-[#4F5BD5] to-[#3B45B8]
            text-white px-12 py-8">

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

                <span
                    class="inline-flex px-4 py-2 rounded-full bg-white/10 border border-white/20">

                    Secure Communication Platform

                </span>

                <h2
                    class="mt-6 text-5xl xl:text-6xl font-black leading-tight">

                    Connect Only

                    <br>

                    With People

                    <br>

                    You Trust

                </h2>

                <p
                    class="mt-6 text-lg text-indigo-100 max-w-lg">

                    Build trusted connections through unique identity codes,
                    approve requests and communicate securely.

                </p>

                <div class="space-y-4 mt-8">

                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-xl bg-white/20 flex items-center justify-center">
                            ✓
                        </div>
                        <span>Unique Identity Codes</span>
                    </div>

                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-xl bg-white/20 flex items-center justify-center">
                            ✓
                        </div>
                        <span>Request-Based Connections</span>
                    </div>

                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-xl bg-white/20 flex items-center justify-center">
                            ✓
                        </div>
                        <span>Private Messaging</span>
                    </div>

                </div>

            </div>

            <div class="text-indigo-200 text-sm">

                © {{ date('Y') }} Secure Messenger

            </div>

        </div>

        <!-- RIGHT SIDE -->

        <div
            class="flex items-center justify-center px-6 py-8 overflow-y-auto">

            <div class="w-full max-w-lg">

                <div class="text-center mb-8">

                    <h2 class="text-4xl font-black text-slate-900">

                        Create Account

                    </h2>

                    <p class="mt-2 text-slate-500">

                        Start your secure messaging journey

                    </p>

                </div>

                <div
                    class="bg-white rounded-[28px] border border-slate-200 p-8 shadow-xl">

                    <form
                        method="POST"
                        action="{{ route('register') }}"
                        class="space-y-4">

                        @csrf

                        <div>

                            <label class="block text-sm font-medium mb-2">

                                Full Name

                            </label>

                            <input
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                required
                                autofocus
                                placeholder="John Doe"
                                class="w-full h-12 px-4 rounded-xl border border-slate-300 focus:border-[#5865F2] focus:ring-[#5865F2]">

                            <x-input-error :messages="$errors->get('name')" class="mt-2"/>

                        </div>

                        <div>

                            <label class="block text-sm font-medium mb-2">

                                Email Address

                            </label>

                            <input
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                placeholder="john@example.com"
                                class="w-full h-12 px-4 rounded-xl border border-slate-300 focus:border-[#5865F2] focus:ring-[#5865F2]">

                            <x-input-error :messages="$errors->get('email')" class="mt-2"/>

                        </div>

                        <div>

                            <label class="block text-sm font-medium mb-2">

                                Password

                            </label>

                            <input
                                type="password"
                                name="password"
                                required
                                placeholder="Create password"
                                class="w-full h-12 px-4 rounded-xl border border-slate-300 focus:border-[#5865F2] focus:ring-[#5865F2]">

                            <x-input-error :messages="$errors->get('password')" class="mt-2"/>

                        </div>

                        <div>

                            <label class="block text-sm font-medium mb-2">

                                Confirm Password

                            </label>

                            <input
                                type="password"
                                name="password_confirmation"
                                required
                                placeholder="Confirm password"
                                class="w-full h-12 px-4 rounded-xl border border-slate-300 focus:border-[#5865F2] focus:ring-[#5865F2]">

                        </div>

                        <button
                            type="submit"
                            class="w-full h-12 rounded-xl bg-[#5865F2] text-white font-semibold hover:bg-[#4752C4] transition">

                            Create Account

                        </button>

                    </form>

                    <div class="border-t border-slate-200 mt-6 pt-6">

                        <p class="text-center text-sm text-slate-500">

                            You'll automatically receive a secure identity code.

                        </p>

                        <div class="text-center mt-4">

                            <a
                                href="{{ route('login') }}"
                                class="font-semibold text-[#5865F2] hover:underline">

                                Already have an account? Sign In

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</x-guest-layout>