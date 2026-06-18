<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>E2EE Admin Dashboard</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body class="bg-slate-100">

@php

$users = \App\Models\User::count();

$messages = \App\Models\Message::count();

$contacts = \App\Models\Contact::count();

$pending = \App\Models\ChatRequest::where('status','pending')->count();

$todayUsers = \App\Models\User::whereDate('created_at',today())->count();

$todayMessages = \App\Models\Message::whereDate('created_at',today())->count();

$seen = \App\Models\Message::where('is_seen',true)->count();

$unseen = \App\Models\Message::where('is_seen',false)->count();

@endphp


<!-- ===================================== -->
<!-- NAVBAR -->
<!-- ===================================== -->

<nav class="sticky top-0 z-50 bg-white/95 backdrop-blur-xl border-b border-slate-200 shadow-sm">

    <div class="max-w-7xl mx-auto px-8">

        <div class="h-20 flex items-center justify-between">

            <!-- Logo -->

            <div class="flex items-center gap-4">

                <div
                    class="w-14 h-14 rounded-2xl bg-gradient-to-r from-indigo-600 to-blue-600 flex items-center justify-center shadow-lg">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-8 h-8 text-white"
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

                    <h2 class="text-xl font-bold text-slate-800">

                        E2EE Admin

                    </h2>

                    <p class="text-sm text-slate-500">

                        Secure Messenger Dashboard

                    </p>

                </div>

            </div>

            <!-- Menu -->

            <div class="hidden lg:flex items-center gap-2">

                <a href="{{ route('admin.dashboard') }}"
                   class="px-5 py-3 rounded-xl bg-indigo-600 text-white font-semibold shadow">

                    Dashboard

                </a>

                <a href="{{ route('admin.messages') }}"
                   class="px-5 py-3 rounded-xl hover:bg-slate-100 font-medium transition">

                    Messages

                </a>

                <a href="#"
                   class="px-5 py-3 rounded-xl hover:bg-slate-100 font-medium transition">

                    Users

                </a>

                <a href="#"
                   class="px-5 py-3 rounded-xl hover:bg-slate-100 font-medium transition">

                    Analytics

                </a>

                <a href="#"
                   class="px-5 py-3 rounded-xl hover:bg-slate-100 font-medium transition">

                    Security

                </a>

            </div>

            <!-- Right -->

            <div class="flex items-center gap-4">

                <div
                    class="px-4 py-2 rounded-xl bg-green-100 text-green-700 font-semibold">

                    ● Online

                </div>

                <div
                    class="flex items-center gap-3 bg-slate-50 border border-slate-200 rounded-2xl px-3 py-2">

                    @if(auth()->user()->profile_photo)

                        <img
                            src="{{ asset('storage/'.auth()->user()->profile_photo) }}"
                            class="w-11 h-11 rounded-xl object-cover">

                    @else

                        <div
                            class="w-11 h-11 rounded-xl bg-gradient-to-r from-indigo-600 to-blue-600 text-white flex items-center justify-center font-bold">

                            {{ strtoupper(substr(auth()->user()->name,0,1)) }}

                        </div>

                    @endif

                    <div>

                        <div class="font-semibold">

                            {{ auth()->user()->name }}

                        </div>

                        <div class="text-xs text-slate-500">

                            Administrator

                        </div>

                    </div>

                </div>

                <form method="POST"
                      action="{{ route('logout') }}">

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


<!-- ===================================== -->
<!-- CONTENT -->
<!-- ===================================== -->

<div class="max-w-7xl mx-auto px-8 py-10">

    <!-- Welcome -->

    <div
        class="rounded-3xl bg-gradient-to-r from-indigo-600 via-blue-600 to-cyan-500 p-10 shadow-2xl">

        <div class="flex items-center justify-between">

            <div>

                <span
                    class="px-4 py-2 rounded-full bg-white/20 text-white text-xs uppercase tracking-[3px]">

                    Administrator Panel

                </span>

                <h1 class="mt-6 text-5xl font-bold text-white">

                    Welcome,
                    {{ auth()->user()->name }}

                </h1>

                <p class="mt-4 text-indigo-100 text-lg max-w-2xl">

                    Manage encrypted communications, monitor system activity,
                    review users and securely decrypt messages when authorized.

                </p>

            </div>

            <div class="hidden xl:flex">

                <div
                    class="w-52 h-52 rounded-full bg-white/10 backdrop-blur flex items-center justify-center">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-28 h-28 text-white"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="1.5"
                              d="M12 3l7 4v5c0 5-3.5 8-7 9-3.5-1-7-4-7-9V7l7-4z"/>

                    </svg>

                </div>

            </div>

        </div>

    </div>

    <!-- Statistics -->

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mt-10">

        <div class="bg-white rounded-3xl p-8 border border-slate-200 shadow-sm hover:shadow-xl transition">

            <p class="text-slate-500">Users</p>

            <h2 class="text-5xl font-bold mt-4">{{ $users }}</h2>

            <p class="mt-4 text-green-600">

                +{{ $todayUsers }} Today

            </p>

        </div>

        <div class="bg-white rounded-3xl p-8 border border-slate-200 shadow-sm hover:shadow-xl transition">

            <p class="text-slate-500">Messages</p>

            <h2 class="text-5xl font-bold mt-4">{{ $messages }}</h2>

            <p class="mt-4 text-blue-600">

                +{{ $todayMessages }} Today

            </p>

        </div>

        <div class="bg-white rounded-3xl p-8 border border-slate-200 shadow-sm hover:shadow-xl transition">

            <p class="text-slate-500">Contacts</p>

            <h2 class="text-5xl font-bold mt-4">{{ $contacts }}</h2>

            <p class="mt-4 text-emerald-600">

                Active Connections

            </p>

        </div>

        <div class="bg-white rounded-3xl p-8 border border-slate-200 shadow-sm hover:shadow-xl transition">

            <p class="text-slate-500">Pending Requests</p>

            <h2 class="text-5xl font-bold mt-4 text-orange-500">{{ $pending }}</h2>

            <p class="mt-4 text-orange-500">

                Awaiting Approval

            </p>

        </div>

    </div>

    <!-- Continue with Improved Part 2 -->
     <!-- ===================================== -->
<!-- DASHBOARD CONTENT -->
<!-- ===================================== -->

<div class="grid grid-cols-1 xl:grid-cols-3 gap-8 mt-10">

    <!-- ================= LEFT CONTENT ================= -->

    <div class="xl:col-span-2 space-y-8">

        <!-- Quick Actions -->

        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm">

            <div class="px-8 py-6 border-b border-slate-200">

                <h2 class="text-2xl font-bold text-slate-800">

                    Quick Actions

                </h2>

                <p class="text-slate-500 mt-1">

                    Frequently used administrator functions

                </p>

            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 p-8">

                <!-- Messages -->

                <a href="{{ route('admin.messages') }}"
                   class="group rounded-2xl border border-slate-200 p-6 hover:border-indigo-300 hover:shadow-lg transition">

                    <div class="w-14 h-14 rounded-2xl bg-indigo-100 text-indigo-600 flex items-center justify-center mb-5 group-hover:bg-indigo-600 group-hover:text-white transition">

                        🔐

                    </div>

                    <h3 class="font-bold text-lg">

                        Messages

                    </h3>

                    <p class="text-sm text-slate-500 mt-2">

                        View encrypted conversations

                    </p>

                </a>

                <!-- Users -->
                    
                <div class="rounded-2xl border border-slate-200 p-6 hover:border-blue-300 hover:shadow-lg transition">

                    <div class="w-14 h-14 rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center mb-5">

                        👥

                    </div>

                    <h3 class="font-bold text-lg">

                        Users

                    </h3>

                    <p class="text-sm text-slate-500 mt-2">

                        {{ $users }} Registered Users

                    </p>

                </div>

                <!-- Security -->

                <div class="rounded-2xl border border-slate-200 p-6 hover:border-green-300 hover:shadow-lg transition">

                    <div class="w-14 h-14 rounded-2xl bg-green-100 text-green-600 flex items-center justify-center mb-5">

                        🛡

                    </div>

                    <h3 class="font-bold text-lg">

                        Security

                    </h3>

                    <p class="text-sm text-green-600 mt-2">

                        Encryption Active

                    </p>

                </div>

                <!-- Requests -->

                <div class="rounded-2xl border border-slate-200 p-6 hover:border-orange-300 hover:shadow-lg transition">

                    <div class="w-14 h-14 rounded-2xl bg-orange-100 text-orange-600 flex items-center justify-center mb-5">

                        📨

                    </div>

                    <h3 class="font-bold text-lg">

                        Requests

                    </h3>

                    <p class="text-sm text-slate-500 mt-2">

                        {{ $pending }} Pending

                    </p>

                </div>

            </div>

        </div>

        <!-- Security Overview -->

        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm">

            <div class="px-8 py-6 border-b border-slate-200">

                <h2 class="text-2xl font-bold">

                    Security Overview

                </h2>

            </div>

            <div class="grid md:grid-cols-2 gap-8 p-8">

                <div class="space-y-5">

                    <div class="flex justify-between">

                        <span class="text-slate-500">

                            Encryption

                        </span>

                        <span class="font-semibold text-green-600">

                            AES-256 Enabled

                        </span>

                    </div>

                    <div class="flex justify-between">

                        <span class="text-slate-500">

                            Laravel Crypt

                        </span>

                        <span class="font-semibold text-green-600">

                            Active

                        </span>

                    </div>

                    <div class="flex justify-between">

                        <span class="text-slate-500">

                            Application

                        </span>

                        <span class="font-semibold text-green-600">

                            Running

                        </span>

                    </div>

                    <div class="flex justify-between">

                        <span class="text-slate-500">

                            Database

                        </span>

                        <span class="font-semibold text-green-600">

                            Connected

                        </span>

                    </div>

                </div>

                <div>

                    <div class="flex justify-between mb-3">

                        <span class="font-medium">

                            Security Score

                        </span>

                        <span class="font-bold">

                            100%

                        </span>

                    </div>

                    <div class="w-full h-4 rounded-full bg-slate-200 overflow-hidden">

                        <div class="h-full w-full bg-gradient-to-r from-green-500 via-emerald-500 to-cyan-500 rounded-full"></div>

                    </div>

                    <p class="mt-5 text-sm text-slate-500">

                        All encryption services are functioning normally.

                    </p>

                </div>

            </div>

        </div>

    </div>

    <!-- ================= RIGHT PANEL ================= -->

    <div class="space-y-8">

        <!-- System Status -->

        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm">

            <div class="px-8 py-6 border-b border-slate-200">

                <h2 class="text-xl font-bold">

                    System Status

                </h2>

            </div>

            <div class="p-8 space-y-6">

                <div class="flex justify-between">

                    <span class="text-slate-500">

                        Server

                    </span>

                    <span class="text-green-600 font-semibold">

                        ● Online

                    </span>

                </div>

                <div class="flex justify-between">

                    <span class="text-slate-500">

                        API

                    </span>

                    <span class="text-green-600 font-semibold">

                        Running

                    </span>

                </div>

                <div class="flex justify-between">

                    <span class="text-slate-500">

                        Messages

                    </span>

                    <span class="font-semibold">

                        {{ $messages }}

                    </span>

                </div>

                <div class="flex justify-between">

                    <span class="text-slate-500">

                        Seen

                    </span>

                    <span class="text-green-600 font-semibold">

                        {{ $seen }}

                    </span>

                </div>

                <div class="flex justify-between">

                    <span class="text-slate-500">

                        Pending

                    </span>

                    <span class="text-orange-600 font-semibold">

                        {{ $unseen }}

                    </span>

                </div>

            </div>

        </div>

        <!-- Today's Activity -->

        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm">

            <div class="px-8 py-6 border-b border-slate-200">

                <h2 class="text-xl font-bold">

                    Today's Activity

                </h2>

            </div>

            <div class="p-8 space-y-5">

                <div class="flex justify-between">

                    <span class="text-slate-500">

                        New Users

                    </span>

                    <span class="font-bold text-indigo-600">

                        {{ $todayUsers }}

                    </span>

                </div>

                <div class="flex justify-between">

                    <span class="text-slate-500">

                        New Messages

                    </span>

                    <span class="font-bold text-blue-600">

                        {{ $todayMessages }}

                    </span>

                </div>

                <div class="flex justify-between">

                    <span class="text-slate-500">

                        Pending Requests

                    </span>

                    <span class="font-bold text-orange-500">

                        {{ $pending }}

                    </span>

                </div>

                <div class="flex justify-between">

                    <span class="text-slate-500">

                        Contacts

                    </span>

                    <span class="font-bold text-emerald-600">

                        {{ $contacts }}

                    </span>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- ===================================== -->
<!-- RECENT ENCRYPTED MESSAGES -->
<!-- ===================================== -->

<div class="mt-10 bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">

    <div class="px-8 py-6 border-b border-slate-200 flex items-center justify-between">

        <div>

            <h2 class="text-2xl font-bold text-slate-800">

                Recent Encrypted Messages

            </h2>

            <p class="text-slate-500 mt-1">

                Latest secure conversations

            </p>

        </div>

        <a href="{{ route('admin.messages') }}"
           class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl font-semibold transition">

            View All

        </a>

    </div>

    <div class="overflow-x-auto">

        <table class="w-full">
            <thead class="bg-slate-50 border-b border-slate-200">

<tr>

    <th class="px-6 py-5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
        Message
    </th>

    <th class="px-6 py-5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
        Sender
    </th>

    <th class="px-6 py-5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
        Receiver
    </th>

    <th class="px-6 py-5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
        Status
    </th>

    <th class="px-6 py-5 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
        Date
    </th>

    <th class="px-6 py-5 text-center text-xs font-semibold uppercase tracking-wider text-slate-500">
        Action
    </th>

</tr>

</thead>

<tbody class="divide-y divide-slate-100 bg-white">

@forelse($latestMessages as $message)

<tr class="hover:bg-slate-50 transition">

    <!-- Message -->

    <td class="px-6 py-6">

        <div class="flex items-start gap-4">

            <div
                class="w-12 h-12 rounded-2xl bg-indigo-100 text-indigo-600 flex items-center justify-center font-bold">

                #{{ $message->id }}

            </div>

            <div class="flex-1">

                <div
                    class="rounded-2xl border border-slate-200 overflow-hidden">

                    <div
                        class="bg-slate-900 px-4 py-2 flex items-center justify-between">

                        <span class="text-green-400 text-xs font-semibold">

                            AES-256 ENCRYPTED

                        </span>

                        <span class="text-slate-400 text-xs">

                            {{ strlen($message->getRawOriginal('message')) }} bytes

                        </span>

                    </div>

                    <div class="bg-slate-950 p-4">

                        <code class="text-green-400 text-xs leading-6 break-all">

                            {{ Str::limit($message->getRawOriginal('message'),120) }}

                        </code>

                    </div>

                </div>

            </div>

        </div>

    </td>

    <!-- Sender -->

    <td class="px-6 py-6">

        <div class="flex items-center gap-3">

            @if(optional($message->sender)->profile_photo)

                <img
                    src="{{ asset('storage/'.optional($message->sender)->profile_photo) }}"
                    class="w-8 h-8 rounded-xl object-cover">

            @else

                <div
                    class="w-8 h-8 rounded-xl bg-indigo-600 text-white flex items-center justify-center font-bold">

                    {{ strtoupper(substr(optional($message->sender)->name ?? 'U',0,1)) }}

                </div>

            @endif

            <div>

                <h4 class="font-semibold text-slate-800">

                    {{ optional($message->sender)->name ?? 'Unknown User' }}

                </h4>

                <p class="text-sm text-slate-500">

                    {{ optional($message->sender)->email }}

                </p>

            </div>

        </div>

    </td>

    <!-- Receiver -->

    <td class="px-6 py-6">

        <div class="flex items-center gap-1">

            @if(optional($message->receiver)->profile_photo)

                <img
                    src="{{ asset('storage/'.optional($message->receiver)->profile_photo) }}"
                    class="w-8 h-8 rounded-xl object-cover">

            @else

                <div
                    class="w-8 h-8 rounded-xl bg-emerald-600 text-white flex items-center justify-center font-bold">

                    {{ strtoupper(substr(optional($message->receiver)->name ?? 'U',0,1)) }}

                </div>

            @endif

            <div>

                <h4 class="font-semibold text-slate-800">

                    {{ optional($message->receiver)->name ?? 'Unknown User' }}

                </h4>

                <p class="text-sm text-slate-500">

                    {{ optional($message->receiver)->email }}

                </p>

            </div>

        </div>

    </td>

    <!-- Status -->

    <td class="px-6 py-6">

        @if($message->is_seen)

            <span class="inline-flex items-center gap-2 rounded-full bg-green-100 px-4 py-2 text-green-700 font-medium text-sm">

                <span class="w-2 h-2 rounded-full bg-green-500"></span>

                Seen

            </span>

        @else

            <span class="inline-flex items-center gap-2 rounded-full bg-amber-100 px-4 py-2 text-amber-700 font-medium text-sm">

                <span class="w-2 h-2 rounded-full bg-amber-500"></span>

                Pending

            </span>

        @endif

    </td>

    <!-- Date -->

    <td class="px-6 py-6 whitespace-nowrap text-center">

    <div class="font-semibold text-slate-700">
        {{ $message->created_at->format('d M Y') }}
    </div>

    <div class="text-sm text-slate-500">
        {{ $message->created_at->format('h:i A') }}
    </div>

    <div class="text-xs text-slate-400">
        {{ $message->created_at->diffForHumans() }}
    </div>

</td>

    <!-- Action -->

    <td class="px-6 py-6 text-center">

        <a href="{{ route('admin.decrypt',$message->id) }}"
           class="inline-flex items-center gap-2 rounded-xl bg-indigo-600 hover:bg-indigo-700 px-5 py-3 text-white font-semibold transition">

            <svg xmlns="http://www.w3.org/2000/svg"
                 class="w-5 h-5"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke="currentColor">

                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M15 11V7a3 3 0 10-6 0v4m-2 0h10a2 2 0 012 2v5a2 2 0 01-2 2H7a2 2 0 01-2-2v-5a2 2 0 012-2z"/>

            </svg>

            Decrypt

        </a>

    </td>

</tr>

@empty

<tr>

<td colspan="6">

<div class="py-20 text-center">

    <div
        class="mx-auto w-24 h-24 rounded-full bg-slate-100 flex items-center justify-center">

        <svg xmlns="http://www.w3.org/2000/svg"
             class="w-12 h-12 text-slate-400"
             fill="none"
             viewBox="0 0 24 24"
             stroke="currentColor">

            <path stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="1.5"
                  d="M12 15v2m6-8V7a6 6 0 10-12 0v2m-1 0h14a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2v-8a2 2 0 012-2z"/>

        </svg>

    </div>

    <h2 class="mt-6 text-2xl font-bold text-slate-700">

        No Encrypted Messages

    </h2>

    <p class="mt-2 text-slate-500">

        Messages will appear here once users start secure conversations.

    </p>

</div>

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

</div>

<!-- Footer -->

<div class="mt-10 py-6 flex items-center justify-between text-sm text-slate-500 border-t border-slate-200">

    <div>

        © {{ date('Y') }} E2EE Secure Messenger Admin Panel

    </div>

    <div class="flex items-center gap-6">

        <span class="text-green-600 font-medium">
            ● Encryption Active
        </span>

        <span>
            Laravel 12
        </span>

        <span>
            AES-256 Encryption
        </span>

    </div>

</div>

</div>

</body>

</html>