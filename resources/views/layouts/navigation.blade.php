<nav class="bg-white border-b border-slate-200 sticky top-0 z-50 backdrop-blur">

    <div class="max-w-7xl mx-auto px-6">

        <div class="h-20 flex items-center justify-between">

            <!-- Logo + Navigation -->

            <div class="flex items-center gap-12">

                <a
                    href="{{ route('dashboard') }}"
                    class="flex items-center gap-4">

                    <div
                        class="w-12 h-12 rounded-2xl bg-gradient-to-r from-[#5865F2] to-[#4752C4] flex items-center justify-center text-white text-xl font-bold shadow-lg">

                        S

                    </div>

                    <div>

                        <h2 class="font-bold text-slate-900 text-lg">

                            Secure Messenger

                        </h2>

                        <p class="text-xs text-slate-500">

                            Private Communication

                        </p>

                    </div>

                </a>

                <!-- Desktop Nav -->

                <div class="hidden md:flex items-center gap-8">

                    <a
                        href="{{ route('dashboard') }}"
                        class="text-slate-700 hover:text-[#5865F2] font-medium transition">

                        Dashboard

                    </a>

                    <a
                        href="{{ route('find.user') }}"
                        class="text-slate-700 hover:text-[#5865F2] font-medium transition">

                        Find User

                    </a>

                    <a
                        href="{{ route('requests.index') }}"
                        class="text-slate-700 hover:text-[#5865F2] font-medium transition">

                        Requests

                    </a>

                    <a
                        href="{{ route('contacts.index') }}"
                        class="text-slate-700 hover:text-[#5865F2] font-medium transition">

                        Contacts

                    </a>

                </div>

            </div>

            <!-- Right Side -->

            <div class="flex items-center gap-4">

                <!-- Search -->

                <a
                    href="{{ route('find.user') }}"
                    class="hidden md:flex w-11 h-11 rounded-xl bg-slate-100 hover:bg-slate-200 items-center justify-center transition">

                    🔍

                </a>

                <!-- Requests -->

                <a
                    href="{{ route('requests.index') }}"
                    class="relative w-11 h-11 rounded-xl bg-slate-100 hover:bg-slate-200 flex items-center justify-center transition">

                    📨

                </a>

                <!-- User -->

                <div
                    class="flex items-center gap-3 bg-slate-50 border border-slate-200 rounded-2xl px-3 py-2">

                    @if(Auth::user()->profile_photo)

                        <img
                            src="{{ asset('storage/' . Auth::user()->profile_photo) }}"
                            class="w-10 h-10 rounded-xl object-cover">

                    @else

                        <div
                            class="w-10 h-10 rounded-xl bg-gradient-to-r from-[#5865F2] to-[#4752C4] text-white flex items-center justify-center font-bold">

                            {{ strtoupper(substr(Auth::user()->name,0,1)) }}

                        </div>

                    @endif

                    <div class="hidden sm:block">

                        <p class="font-semibold text-slate-900 leading-none">

                            {{ Auth::user()->name }}

                        </p>

                        <p class="text-xs text-green-600 mt-1">

                            ● Online

                        </p>

                    </div>

                </div>

                <!-- Logout -->

                <form method="POST" action="{{ route('logout') }}">

                    @csrf

                    <button
                        type="submit"
                        class="px-4 py-2 rounded-xl bg-red-500 hover:bg-red-600 text-white font-medium transition">

                        Logout

                    </button>

                </form>

            </div>

        </div>

    </div>

</nav>