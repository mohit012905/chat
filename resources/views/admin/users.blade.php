<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <title>Manage Users | E2EE Admin</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body class="bg-slate-100">

@php

$totalUsers = \App\Models\User::count();

$onlineUsers = \App\Models\User::where('last_seen','>=',now()->subMinutes(5))->count();

$newUsers = \App\Models\User::whereDate('created_at',today())->count();

$admins = \App\Models\User::where('is_admin',1)->count();

@endphp

<!-- ================= NAVBAR ================= -->

<nav class="sticky top-0 z-50 bg-white border-b border-slate-200 shadow-sm">

    <div class="max-w-7xl mx-auto px-8">

        <div class="h-20 flex items-center justify-between">

            <div class="flex items-center gap-4">

                <div class="w-14 h-14 rounded-2xl bg-gradient-to-r from-indigo-600 to-blue-600 flex items-center justify-center shadow-lg">

                    🔐

                </div>

                <div>

                    <h2 class="text-2xl font-bold text-slate-800">

                        E2EE Admin

                    </h2>

                    <p class="text-sm text-slate-500">

                        User Management

                    </p>

                </div>

            </div>

            <div class="flex items-center gap-3">

                <a href="{{ route('admin.dashboard') }}"
                   class="px-5 py-3 rounded-xl hover:bg-slate-100">

                    Dashboard

                </a>

                <a href="{{ route('admin.messages') }}"
                   class="px-5 py-3 rounded-xl hover:bg-slate-100">

                    Messages

                </a>

                <a href="{{ route('admin.users') }}"
                   class="px-5 py-3 rounded-xl bg-indigo-600 text-white font-semibold">

                    Users

                </a>

                <form method="POST"
                      action="{{ route('logout') }}">

                    @csrf

                    <button
                        class="px-5 py-3 rounded-xl bg-red-500 hover:bg-red-600 text-white">

                        Logout

                    </button>

                </form>

            </div>

        </div>

    </div>

</nav>

<!-- ================= PAGE ================= -->

<div class="max-w-7xl mx-auto px-8 py-10">

<div class="flex justify-between items-center mb-10">

<div>

<h1 class="text-4xl font-bold text-slate-800">

Manage Users

</h1>

<p class="text-slate-500 mt-2">

Manage registered users, monitor activity and permissions.

</p>

</div>

<div>

<button
class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-xl shadow">

+ Add User

</button>

</div>

</div>

<!-- ================= STATS ================= -->

<div class="grid md:grid-cols-2 xl:grid-cols-4 gap-6 mb-10">

<div class="bg-white rounded-3xl shadow-sm border p-6">

<div class="flex justify-between">

<div>

<p class="text-slate-500">

Total Users

</p>

<h2 class="text-4xl font-bold mt-3">

{{ $totalUsers }}

</h2>

</div>

<div class="text-5xl">

👥

</div>

</div>

</div>

<div class="bg-white rounded-3xl shadow-sm border p-6">

<div class="flex justify-between">

<div>

<p class="text-slate-500">

Online Users

</p>

<h2 class="text-4xl font-bold text-green-600 mt-3">

{{ $onlineUsers }}

</h2>

</div>

<div class="text-5xl">

🟢

</div>

</div>

</div>

<div class="bg-white rounded-3xl shadow-sm border p-6">

<div class="flex justify-between">

<div>

<p class="text-slate-500">

New Today

</p>

<h2 class="text-4xl font-bold text-blue-600 mt-3">

{{ $newUsers }}

</h2>

</div>

<div class="text-5xl">

🆕

</div>

</div>

</div>

<div class="bg-white rounded-3xl shadow-sm border p-6">

<div class="flex justify-between">

<div>

<p class="text-slate-500">

Administrators

</p>

<h2 class="text-4xl font-bold text-orange-500 mt-3">

{{ $admins }}

</h2>

</div>

<div class="text-5xl">

🛡️

</div>

</div>

</div>

</div>

<!-- Search -->

<div class="bg-white rounded-3xl border shadow-sm p-6 mb-8">

<div class="grid md:grid-cols-4 gap-4">

<input
type="text"
placeholder="Search users..."
class="rounded-xl border-slate-300">

<select class="rounded-xl border-slate-300">

<option>All Users</option>

<option>Online</option>

<option>Offline</option>

<option>Admin</option>

</select>

<input
type="date"
class="rounded-xl border-slate-300">

<button
class="rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white">

Search

</button>

</div>

</div>

<!-- Users Table -->

<div class="bg-white rounded-3xl shadow-sm border overflow-hidden">

<div class="px-8 py-6 border-b">

<h2 class="text-2xl font-bold">

Registered Users

</h2>

<p class="text-slate-500">

All registered accounts

</p>

</div>

<div class="overflow-x-auto">

<table class="min-w-full">

<thead class="bg-slate-50">

<tr>

<th class="px-6 py-5">User</th>

<th class="px-6 py-5">Email</th>

<th class="px-6 py-5">Role</th>

<th class="px-6 py-5">Status</th>

<th class="px-6 py-5">Joined</th>

<th class="px-6 py-5 text-center">Action</th>

</tr>

</thead>

<tbody class="divide-y divide-slate-100">
    @forelse($users as $user)

<tr class="hover:bg-slate-50 transition duration-300">

    <!-- User -->

    <td class="px-6 py-5">

        <div class="flex items-center gap-4">

            @if($user->profile_photo)

                <img
                    src="{{ asset('storage/'.$user->profile_photo) }}"
                    class="w-14 h-14 rounded-full object-cover border-2 border-indigo-100 shadow">

            @else

                <div
                    class="w-14 h-14 rounded-full bg-gradient-to-r from-indigo-600 to-blue-600 text-white flex items-center justify-center text-lg font-bold shadow">

                    {{ strtoupper(substr($user->name,0,1)) }}

                </div>

            @endif

            <div>

                <h3 class="font-bold text-slate-800">

                    {{ $user->name }}

                </h3>

                <p class="text-sm text-slate-500">

                    User ID : {{ $user->id }}

                </p>

            </div>

        </div>

    </td>

    <!-- Email -->

    <td class="px-6 py-5">

        <div class="font-medium text-slate-700">

            {{ $user->email }}

        </div>

    </td>

    <!-- Role -->

    <td class="px-6 py-5">

        @if($user->is_admin)

            <span
                class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-red-100 text-red-700 font-semibold">

                🛡 Administrator

            </span>

        @else

            <span
                class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-indigo-100 text-indigo-700 font-semibold">

                👤 User

            </span>

        @endif

    </td>

    <!-- Online -->

    <td class="px-6 py-5">

        @if($user->last_seen >= now()->subMinutes(5))

            <span
                class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-green-100 text-green-700 font-semibold">

                <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>

                Online

            </span>

        @else

            <span
                class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-slate-100 text-slate-600 font-semibold">

                ⚪ Offline

            </span>

        @endif

    </td>

    <!-- Joined -->

    <td class="px-6 py-5">

        <div class="font-semibold text-slate-700">

            {{ $user->created_at->format('d M Y') }}

        </div>

        <div class="text-xs text-slate-500">

            {{ $user->created_at->diffForHumans() }}

        </div>

    </td>

    <!-- Actions -->

    <td class="px-6 py-5">

        <div class="flex items-center justify-center gap-3">

            <!-- View -->

            <a href="{{ route('admin.users.show',$user->id) }}"
               class="px-4 py-2 rounded-xl bg-blue-100 hover:bg-blue-200 text-blue-700 font-semibold">

                👁 View

            </a>

            <!-- Edit -->

            <a href="{{ route('admin.users.edit',$user->id) }}"
               class="px-4 py-2 rounded-xl bg-amber-100 hover:bg-amber-200 text-amber-700 font-semibold">

                ✏ Edit

            </a>

            <!-- Delete -->

            <form
                method="POST"
                action="{{ route('admin.users.destroy',$user->id) }}">

                @csrf
                @method('DELETE')

                <button
                    onclick="return confirm('Delete this user?')"
                    class="px-4 py-2 rounded-xl bg-red-100 hover:bg-red-200 text-red-700 font-semibold">

                    🗑 Delete

                </button>

            </form>

        </div>

    </td>

</tr>

@empty

<tr>

    <td colspan="6">

        <div class="py-24 text-center">

            <div
                class="mx-auto w-24 h-24 rounded-full bg-indigo-100 flex items-center justify-center text-5xl">

                👥

            </div>

            <h2 class="mt-6 text-3xl font-bold text-slate-700">

                No Users Found

            </h2>

            <p class="mt-3 text-slate-500">

                Registered users will appear here.

            </p>

        </div>

    </td>

</tr>

@endforelse

</tbody>

</table>

</div>

<div class="border-t border-slate-200 bg-slate-50 px-8 py-5">

    {{ $users->links() }}

</div>

</div>
<!-- ================= DASHBOARD SUMMARY ================= -->

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-10">

    <!-- User Statistics -->

    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6">

        <div class="flex items-center justify-between mb-6">

            <h3 class="text-xl font-bold text-slate-800">
                User Statistics
            </h3>

            <div class="w-12 h-12 rounded-xl bg-indigo-100 flex items-center justify-center text-2xl">
                📊
            </div>

        </div>

        <div class="space-y-5">

            <div class="flex justify-between">

                <span class="text-slate-500">Total Users</span>

                <span class="font-bold text-slate-800">
                    {{ $totalUsers }}
                </span>

            </div>

            <div class="flex justify-between">

                <span class="text-slate-500">Online Users</span>

                <span class="font-bold text-green-600">
                    {{ $onlineUsers }}
                </span>

            </div>

            <div class="flex justify-between">

                <span class="text-slate-500">New Today</span>

                <span class="font-bold text-blue-600">
                    {{ $newUsers }}
                </span>

            </div>

            <div class="flex justify-between">

                <span class="text-slate-500">Administrators</span>

                <span class="font-bold text-red-600">
                    {{ $admins }}
                </span>

            </div>

        </div>

    </div>

    <!-- Administrator -->

    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6">

        <div class="flex items-center gap-4">

            <div class="w-16 h-16 rounded-full bg-gradient-to-r from-indigo-600 to-blue-600 text-white flex items-center justify-center text-2xl font-bold">

                {{ strtoupper(substr(auth()->user()->name,0,1)) }}

            </div>

            <div>

                <h3 class="font-bold text-xl">

                    {{ auth()->user()->name }}

                </h3>

                <p class="text-slate-500">

                    System Administrator

                </p>

            </div>

        </div>

        <div class="border-t mt-6 pt-6 space-y-4">

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

                    Login

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

        <h3 class="text-xl font-bold text-slate-800 mb-6">

            Quick Actions

        </h3>

        <div class="space-y-4">

            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center justify-between px-5 py-4 rounded-2xl border hover:bg-indigo-50 hover:border-indigo-500 transition">

                <span class="font-semibold">

                    Dashboard

                </span>

                <span class="text-xl">

                    📊

                </span>

            </a>

            <a href="{{ route('admin.messages') }}"
               class="flex items-center justify-between px-5 py-4 rounded-2xl border hover:bg-indigo-50 hover:border-indigo-500 transition">

                <span class="font-semibold">

                    Messages

                </span>

                <span class="text-xl">

                    💬

                </span>

            </a>

            <a href="{{ route('admin.users') }}"
               class="flex items-center justify-between px-5 py-4 rounded-2xl border hover:bg-indigo-50 hover:border-indigo-500 transition">

                <span class="font-semibold">

                    Manage Users

                </span>

                <span class="text-xl">

                    👥

                </span>

            </a>

        </div>

    </div>

</div>

<!-- ================= FOOTER ================= -->

<footer class="mt-10 bg-white rounded-3xl border border-slate-200 shadow-sm">

    <div class="px-8 py-6 flex flex-col md:flex-row justify-between items-center">

        <div>

            <h3 class="font-bold text-slate-800">

                E2EE Secure Messenger

            </h3>

            <p class="text-slate-500 text-sm">

                Administrator Control Panel

            </p>

        </div>

        <div class="flex items-center gap-6 mt-4 md:mt-0">

            <span class="text-sm text-slate-500">

                Laravel 12

            </span>

            <span class="text-green-600 font-semibold">

                ● System Online

            </span>

            <span class="text-slate-500 text-sm">

                © {{ date('Y') }} All Rights Reserved

            </span>

        </div>

    </div>

</footer>

</div>

</body>

</html>