<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Encrypted Messages | E2EE Admin</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body class="bg-slate-100">

@php

$totalMessages = \App\Models\Message::count();

$seenMessages = \App\Models\Message::where('is_seen',1)->count();

$pendingMessages = \App\Models\Message::where('is_seen',0)->count();

$todayMessages = \App\Models\Message::whereDate('created_at',today())->count();

@endphp

<!-- ================= NAVBAR ================= -->

<nav class="sticky top-0 z-50 bg-white border-b border-slate-200 shadow-sm">

    <div class="max-w-7xl mx-auto px-8">

        <div class="h-20 flex items-center justify-between">

            <!-- Logo -->

            <div class="flex items-center gap-4">

                <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-indigo-600 via-blue-600 to-cyan-500 flex items-center justify-center shadow-lg">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-7 h-7 text-white"
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

                    <h2 class="text-2xl font-bold text-slate-800">

                        E2EE Admin Panel

                    </h2>

                    <p class="text-sm text-slate-500">

                        Secure Message Management

                    </p>

                </div>

            </div>

            <!-- Navigation -->

            <div class="flex items-center gap-3">

                <a href="{{ route('admin.dashboard') }}"
                    class="px-5 py-3 rounded-xl hover:bg-slate-100 font-medium text-slate-700">

                    Dashboard

                </a>

                <a href="{{ route('admin.messages') }}"
                    class="px-5 py-3 rounded-xl bg-indigo-600 text-white font-semibold shadow">

                    Messages

                </a>

                <form method="POST" action="{{ route('logout') }}">

                    @csrf

                    <button
                        class="px-5 py-3 rounded-xl bg-red-500 hover:bg-red-600 text-white font-semibold transition">

                        Logout

                    </button>

                </form>

            </div>

        </div>

    </div>

</nav>

<!-- ================= PAGE ================= -->

<div class="max-w-7xl mx-auto px-8 py-10">

    <!-- Header -->

    <div class="flex items-center justify-between mb-10">

        <div>

            <h1 class="text-4xl font-bold text-slate-800">

                Encrypted Messages

            </h1>

            <p class="text-slate-500 mt-2">

                View, monitor and decrypt secure user conversations.

            </p>

        </div>

        <div class="text-right">

            <div class="text-sm text-slate-500">

                Logged in as

            </div>

            <div class="font-bold text-lg">

                {{ auth()->user()->name }}

            </div>

            <span class="inline-flex mt-2 px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm font-semibold">

                ● Administrator

            </span>

        </div>

    </div>

    <!-- Statistics -->

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-10">

        <!-- Total -->

        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 hover:shadow-lg transition">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-slate-500">

                        Total Messages

                    </p>

                    <h2 class="text-4xl font-bold mt-3 text-slate-800">

                        {{ $totalMessages }}

                    </h2>

                </div>

                <div class="w-16 h-16 rounded-2xl bg-indigo-100 flex items-center justify-center text-3xl">

                    💬

                </div>

            </div>

        </div>

        <!-- Seen -->

        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 hover:shadow-lg transition">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-slate-500">

                        Seen

                    </p>

                    <h2 class="text-4xl font-bold mt-3 text-green-600">

                        {{ $seenMessages }}

                    </h2>

                </div>

                <div class="w-16 h-16 rounded-2xl bg-green-100 flex items-center justify-center text-3xl">

                    👁️

                </div>

            </div>

        </div>

        <!-- Pending -->

        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 hover:shadow-lg transition">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-slate-500">

                        Pending

                    </p>

                    <h2 class="text-4xl font-bold mt-3 text-orange-500">

                        {{ $pendingMessages }}

                    </h2>

                </div>

                <div class="w-16 h-16 rounded-2xl bg-orange-100 flex items-center justify-center text-3xl">

                    ⏳

                </div>

            </div>

        </div>

        <!-- Today -->

        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 hover:shadow-lg transition">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-slate-500">

                        Today

                    </p>

                    <h2 class="text-4xl font-bold mt-3 text-blue-600">

                        {{ $todayMessages }}

                    </h2>

                </div>

                <div class="w-16 h-16 rounded-2xl bg-blue-100 flex items-center justify-center text-3xl">

                    📅

                </div>

            </div>

        </div>

    </div>

    <!-- Search Card -->

    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 mb-8">

        <div class="grid md:grid-cols-4 gap-4">

            <input
                type="text"
                placeholder="Search sender, receiver..."
                class="rounded-xl border-slate-300 focus:border-indigo-500 focus:ring-indigo-500">

            <select
                class="rounded-xl border-slate-300 focus:border-indigo-500 focus:ring-indigo-500">

                <option>All Status</option>
                <option>Seen</option>
                <option>Pending</option>

            </select>

            <input
                type="date"
                class="rounded-xl border-slate-300 focus:border-indigo-500 focus:ring-indigo-500">

            <button
                class="rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white font-semibold transition">

                Search Messages

            </button>

        </div>

    </div>

    <!-- Messages Table -->

    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">

        <div class="flex items-center justify-between px-8 py-6 border-b border-slate-200">

            <div>

                <h2 class="text-2xl font-bold text-slate-800">

                    Message History

                </h2>

                <p class="text-slate-500 mt-1">

                    Latest encrypted conversations

                </p>

            </div>

        </div>

        <div class="overflow-x-auto">

            <table class="min-w-full">
                        </table>

    </div>

    <!-- Pagination -->

    <div class="flex flex-col md:flex-row items-center justify-between gap-4 px-8 py-6 border-t border-slate-200 bg-slate-50">

        <div class="text-sm text-slate-500">

            Showing

            <span class="font-semibold">

                {{ $messages->firstItem() ?? 0 }}

            </span>

            to

            <span class="font-semibold">

                {{ $messages->lastItem() ?? 0 }}

            </span>

            of

            <span class="font-semibold">

                {{ $messages->total() }}

            </span>

            encrypted messages

        </div>

        <div>

            {{ $messages->links() }}

        </div>

    </div>

</div>

<!-- Activity Section -->

<div class="grid lg:grid-cols-3 gap-6 mt-10">

    <!-- Security Status -->

    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6">

        <div class="flex items-center justify-between mb-6">

            <h3 class="text-xl font-bold text-slate-800">

                Security Status

            </h3>

            <span class="text-3xl">

                🛡️

            </span>

        </div>

        <div class="space-y-5">

            <div class="flex justify-between items-center">

                <span class="text-slate-600">

                    Encryption

                </span>

                <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm font-semibold">

                    Enabled

                </span>

            </div>

            <div class="flex justify-between items-center">

                <span class="text-slate-600">

                    Algorithm

                </span>

                <span class="font-semibold text-slate-800">

                    AES-256

                </span>

            </div>

            <div class="flex justify-between items-center">

                <span class="text-slate-600">

                    Laravel Crypt

                </span>

                <span class="font-semibold text-green-600">

                    Active

                </span>

            </div>

            <div class="flex justify-between items-center">

                <span class="text-slate-600">

                    Server Status

                </span>

                <span class="font-semibold text-green-600">

                    ● Online

                </span>

            </div>

        </div>

    </div>

    <!-- Admin -->

    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6">

        <div class="flex items-center gap-4">

            <div class="w-16 h-16 rounded-full bg-gradient-to-r from-indigo-600 to-blue-600 flex items-center justify-center text-white text-2xl font-bold">

                {{ strtoupper(substr(auth()->user()->name,0,1)) }}

            </div>

            <div>

                <h3 class="text-xl font-bold">

                    {{ auth()->user()->name }}

                </h3>

                <p class="text-slate-500">

                    System Administrator

                </p>

            </div>

        </div>

        <div class="mt-6 space-y-3">

            <div class="flex justify-between">

                <span class="text-slate-500">

                    Role

                </span>

                <span class="font-semibold">

                    Administrator

                </span>

            </div>

            <div class="flex justify-between">

                <span class="text-slate-500">

                    Login Time

                </span>

                <span class="font-semibold">

                    {{ now()->format('h:i A') }}

                </span>

            </div>

            <div class="flex justify-between">

                <span class="text-slate-500">

                    Date

                </span>

                <span class="font-semibold">

                    {{ now()->format('d M Y') }}

                </span>

            </div>

        </div>

    </div>

    <!-- Quick Actions -->

    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6">

        <h3 class="text-xl font-bold mb-6 text-slate-800">

            Quick Actions

        </h3>

        <div class="space-y-4">

            <a href="{{ route('admin.dashboard') }}"
                class="flex items-center justify-between rounded-2xl border border-slate-200 hover:border-indigo-500 hover:bg-indigo-50 px-5 py-4 transition">

                <span class="font-semibold text-slate-700">

                    Dashboard

                </span>

                <span>

                    📊

                </span>

            </a>

            <a href="{{ route('admin.messages') }}"
                class="flex items-center justify-between rounded-2xl border border-slate-200 hover:border-indigo-500 hover:bg-indigo-50 px-5 py-4 transition">

                <span class="font-semibold text-slate-700">

                    All Messages

                </span>

                <span>

                    🔐

                </span>

            </a>

            <a href="{{ route('admin.dashboard') }}"
                class="flex items-center justify-between rounded-2xl border border-slate-200 hover:border-indigo-500 hover:bg-indigo-50 px-5 py-4 transition">

                <span class="font-semibold text-slate-700">

                    Analytics

                </span>

                <span>

                    📈

                </span>

            </a>

        </div>

    </div>

</div>

<!-- Footer -->

<footer class="mt-12 rounded-3xl bg-white border border-slate-200 shadow-sm">

    <div class="px-8 py-6 flex flex-col md:flex-row justify-between items-center">

        <div>

            <h3 class="font-bold text-slate-800">

                E2EE Secure Messenger

            </h3>

            <p class="text-slate-500 text-sm mt-1">

                Administrator Control Panel

            </p>

        </div>

        <div class="flex items-center gap-6 mt-4 md:mt-0">

            <span class="text-sm text-slate-500">

                Laravel 12

            </span>

            <span class="text-sm text-green-600 font-semibold">

                AES-256 Enabled

            </span>

            <span class="text-sm text-slate-500">

                © {{ date('Y') }}

            </span>

        </div>

    </div>

</footer>

</div>

</body>

</html>
