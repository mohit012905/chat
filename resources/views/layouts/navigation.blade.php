<nav class="sticky top-0 z-50 bg-white/90 backdrop-blur-xl border-b border-slate-200 shadow-sm">

    <div class="max-w-7xl mx-auto px-6">

        <div class="h-20 flex items-center justify-between">

            <!-- Brand -->
            <div class="flex items-center gap-12">

                <a href="{{ route('dashboard') }}" class="flex items-center gap-4 group">

                    <div
                        class="w-12 h-12 rounded-2xl bg-gradient-to-br from-indigo-600 via-blue-600 to-cyan-500 flex items-center justify-center shadow-lg group-hover:scale-105 transition">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-6 h-6 text-white"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M12 3l7 4v5c0 5-3.5 8-7 9-3.5-1-7-4-7-9V7l7-4z"/>

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M9.5 12l2 2 3-4"/>

                        </svg>

                    </div>

                    <div>

                        <h1 class="text-xl font-bold text-slate-900 tracking-tight">
                            E2EE Messenger
                        </h1>

                        <p class="text-xs text-slate-500">
                            End-to-End Encrypted Communication
                        </p>

                    </div>

                </a>

                <!-- Navigation -->

                <div class="hidden lg:flex items-center gap-2">

                    <a href="{{ route('dashboard') }}"
                       class="px-4 py-2 rounded-xl transition font-medium
                       {{ request()->routeIs('dashboard') ? 'bg-indigo-600 text-white shadow' : 'text-slate-600 hover:bg-slate-100 hover:text-indigo-600' }}">

                        Dashboard

                    </a>

                    <a href="{{ route('find.user') }}"
                       class="px-4 py-2 rounded-xl transition font-medium
                       {{ request()->routeIs('find.user') ? 'bg-indigo-600 text-white shadow' : 'text-slate-600 hover:bg-slate-100 hover:text-indigo-600' }}">

                        Find User

                    </a>

                    <a href="{{ route('requests.index') }}"
                       class="px-4 py-2 rounded-xl transition font-medium
                       {{ request()->routeIs('requests.*') ? 'bg-indigo-600 text-white shadow' : 'text-slate-600 hover:bg-slate-100 hover:text-indigo-600' }}">

                        Requests

                    </a>

                    <a href="{{ route('contacts.index') }}"
                       class="px-4 py-2 rounded-xl transition font-medium
                       {{ request()->routeIs('contacts.*') ? 'bg-indigo-600 text-white shadow' : 'text-slate-600 hover:bg-slate-100 hover:text-indigo-600' }}">

                        Contacts

                    </a>

                </div>

            </div>

            <!-- Right Side -->

            <div class="flex items-center gap-4">

                <!-- Search -->

                <a href="{{ route('find.user') }}"
                   class="hidden md:flex w-11 h-11 rounded-xl bg-slate-100 hover:bg-indigo-100 hover:text-indigo-600 items-center justify-center transition">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-5 h-5"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M21 21l-5-5m2-5a7 7 0 11-14 0a7 7 0 0114 0z"/>

                    </svg>

                </a>

                <!-- Requests -->

                <a href="{{ route('requests.index') }}"
                   class="relative w-11 h-11 rounded-xl bg-slate-100 hover:bg-orange-100 flex items-center justify-center transition">

                    📨

                    @php
                        $pending = \App\Models\ChatRequest::where('receiver_id', auth()->id())
                            ->where('status', 'pending')
                            ->count();
                    @endphp

                    @if($pending > 0)

                        <span
                            class="absolute -top-1 -right-1 min-w-[20px] h-5 px-1 rounded-full bg-red-500 text-white text-[11px] font-bold flex items-center justify-center">

                            {{ $pending }}

                        </span>

                    @endif

                </a>

                <!-- User Dropdown -->

                <details class="relative">

                    <summary
                        class="list-none cursor-pointer flex items-center gap-3 bg-white border border-slate-200 rounded-2xl px-3 py-2 shadow-sm hover:shadow-md transition">

                        @if(Auth::user()->profile_photo)

                            <img
                                src="{{ asset('storage/' . Auth::user()->profile_photo) }}"
                                class="w-10 h-10 rounded-xl object-cover">

                        @else

                            <div
                                class="w-10 h-10 rounded-xl bg-gradient-to-r from-indigo-600 to-blue-600 text-white flex items-center justify-center font-bold">

                                {{ strtoupper(substr(Auth::user()->name,0,1)) }}

                            </div>

                        @endif

                        <div class="hidden sm:block">

                            <div class="font-semibold text-slate-900">
                                {{ Auth::user()->name }}
                            </div>

                            <div class="text-xs text-green-600">
                                ● Online
                            </div>

                        </div>

                    </summary>

                    <div
                        class="absolute right-0 mt-3 w-56 bg-white rounded-2xl shadow-2xl border border-slate-200 overflow-hidden">

                        <div class="px-5 py-4 border-b">

                            <p class="font-semibold">
                                {{ Auth::user()->name }}
                            </p>

                            <p class="text-sm text-slate-500">
                                {{ Auth::user()->email }}
                            </p>

                        </div>

                        <a href="{{ route('profile.edit') }}"
                           class="block px-5 py-3 hover:bg-slate-100 transition">

                            Profile Settings

                        </a>

                        <form method="POST"
                              action="{{ route('logout') }}">

                            @csrf

                            <button
                                type="submit"
                                class="w-full text-left px-5 py-3 text-red-600 hover:bg-red-50 transition">

                                Logout

                            </button>

                        </form>

                    </div>

                </details>

            </div>

        </div>

    </div>

</nav>