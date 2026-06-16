<x-app-layout>

<div class="min-h-screen bg-slate-50">

    <div class="max-w-7xl mx-auto px-6 py-8">

        <!-- HERO SECTION -->

        <div
            class="relative overflow-hidden rounded-[40px]
            bg-gradient-to-br from-[#5865F2] via-[#4F5BD5] to-[#3B45B8]
            p-12 text-white shadow-2xl mb-8">

            <!-- Background Glow -->

            <div
                class="absolute -top-24 -right-24 w-96 h-96 bg-white/10 rounded-full blur-3xl">
            </div>

            <div
                class="absolute -bottom-32 left-0 w-80 h-80 bg-white/5 rounded-full blur-3xl">
            </div>

            <div class="relative z-10">

                <span
                    class="inline-flex items-center px-4 py-2 rounded-full bg-white/10 border border-white/20 backdrop-blur">

                    Secure Communication Platform

                </span>

                <div class="mt-6 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-10">

                    <div>

                        <h1
                            class="text-5xl lg:text-6xl font-black leading-tight">

                            Welcome back,
                            <br>

                            {{ Auth::user()->name }}

                        </h1>

                        <p
                            class="mt-5 text-xl text-indigo-100 max-w-2xl">

                            Connect securely, manage trusted contacts,
                            exchange messages privately and maintain complete control
                            over your communication network.

                        </p>

                    </div>

                    <div>

                        @if(Auth::user()->profile_photo)

                            <img
                                src="{{ asset('storage/' . Auth::user()->profile_photo) }}"
                                class="w-32 h-32 rounded-[30px] object-cover border-4 border-white/20 shadow-xl">

                        @else

                            <div
                                class="w-32 h-32 rounded-[30px] bg-white/10 backdrop-blur flex items-center justify-center text-6xl border border-white/10">

                                👤

                            </div>

                        @endif

                    </div>

                </div>

            </div>

        </div>

        <!-- STATS -->

        <div class="grid md:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">

            <!-- Code -->

            <div
                class="bg-white rounded-[28px] p-8 border border-slate-200 shadow-sm hover:shadow-xl transition">

                <p class="text-slate-500 font-medium">

                    Identity Code

                </p>

                <h2
                    class="mt-4 text-4xl font-black text-[#5865F2]">

                    {{ Auth::user()->unique_code }}

                </h2>

                <p class="text-sm text-slate-400 mt-2">

                    Share with trusted users

                </p>

            </div>

            <!-- Status -->

            <div
                class="bg-white rounded-[28px] p-8 border border-slate-200 shadow-sm hover:shadow-xl transition">

                <p class="text-slate-500 font-medium">

                    Account Status

                </p>

                <h2
                    class="mt-4 text-4xl font-black text-green-600">

                    Active

                </h2>

                <p class="text-sm text-slate-400 mt-2">

                    Secure account enabled

                </p>

            </div>

            <!-- Requests -->

            <div
                class="bg-white rounded-[28px] p-8 border border-slate-200 shadow-sm hover:shadow-xl transition">

                <p class="text-slate-500 font-medium">

                    Requests

                </p>

                <h2
                    class="mt-4 text-4xl font-black text-orange-500">

                    {{ Auth::user()->receivedRequests()->count() ?? 0 }}

                </h2>

                <p class="text-sm text-slate-400 mt-2">

                    Pending connection requests

                </p>

            </div>

            <!-- Contacts -->

            <div
                class="bg-white rounded-[28px] p-8 border border-slate-200 shadow-sm hover:shadow-xl transition">

                <p class="text-slate-500 font-medium">

                    Contacts

                </p>

                <h2
                    class="mt-4 text-4xl font-black text-purple-600">

                    {{ Auth::user()->contacts()->count() ?? 0 }}

                </h2>

                <p class="text-sm text-slate-400 mt-2">

                    Trusted connections

                </p>

            </div>

        </div>
                <!-- QUICK ACTIONS -->

        <div class="mb-8">

            <div class="flex items-center justify-between mb-6">

                <div>

                    <h2 class="text-3xl font-bold text-slate-900">

                        Quick Actions

                    </h2>

                    <p class="text-slate-500 mt-1">

                        Manage your secure communication network

                    </p>

                </div>

            </div>

            <div class="grid md:grid-cols-3 gap-6">

                <!-- Find User -->

                <a
                    href="{{ route('find.user') }}"
                    class="group bg-white rounded-[28px] p-8 border border-slate-200 shadow-sm hover:shadow-2xl hover:-translate-y-2 transition duration-300">

                    <div
                        class="w-16 h-16 rounded-2xl bg-blue-100 flex items-center justify-center text-3xl">

                        🔍

                    </div>

                    <h3
                        class="mt-6 text-xl font-bold text-slate-900">

                        Find User

                    </h3>

                    <p
                        class="mt-2 text-slate-500">

                        Search users securely using their unique identity code.

                    </p>

                </a>

                <!-- Requests -->

                <a
                    href="{{ route('requests.index') }}"
                    class="group bg-white rounded-[28px] p-8 border border-slate-200 shadow-sm hover:shadow-2xl hover:-translate-y-2 transition duration-300">

                    <div
                        class="w-16 h-16 rounded-2xl bg-orange-100 flex items-center justify-center text-3xl">

                        📨

                    </div>

                    <h3
                        class="mt-6 text-xl font-bold text-slate-900">

                        Requests

                    </h3>

                    <p
                        class="mt-2 text-slate-500">

                        Review incoming connection requests from other users.

                    </p>

                </a>

                <!-- Contacts -->

                <a
                    href="{{ route('contacts.index') }}"
                    class="group bg-white rounded-[28px] p-8 border border-slate-200 shadow-sm hover:shadow-2xl hover:-translate-y-2 transition duration-300">

                    <div
                        class="w-16 h-16 rounded-2xl bg-purple-100 flex items-center justify-center text-3xl">

                        💬

                    </div>

                    <h3
                        class="mt-6 text-xl font-bold text-slate-900">

                        Contacts

                    </h3>

                    <p
                        class="mt-2 text-slate-500">

                        Access trusted contacts and continue conversations.

                    </p>

                </a>

            </div>

        </div>

        <!-- IDENTITY + SECURITY -->

        <div class="grid lg:grid-cols-2 gap-6 mb-8">

            <!-- UNIQUE CODE CARD -->

            <div
                class="relative overflow-hidden bg-white rounded-[32px] border border-slate-200 p-10 shadow-sm">

                <div
                    class="absolute top-0 right-0 w-48 h-48 bg-blue-50 rounded-full blur-3xl">
                </div>

                <div class="relative z-10">

                    <span
                        class="inline-flex px-4 py-2 rounded-full bg-blue-50 text-blue-600 font-medium">

                        Secure Identity

                    </span>

                    <h3
                        class="mt-6 text-slate-500 uppercase tracking-wider text-sm">

                        Your Unique Code

                    </h3>

                    <h2
                        class="mt-4 text-6xl font-black text-[#5865F2]">

                        {{ Auth::user()->unique_code }}

                    </h2>

                    <p
                        class="mt-4 text-slate-500">

                        Share this code only with people you trust.

                    </p>

                    <button
                        onclick="copyCode()"
                        class="mt-8 px-6 py-3 rounded-xl bg-[#5865F2] text-white font-semibold hover:bg-[#4752C4] transition">

                        Copy Code

                    </button>

                </div>

            </div>

            <!-- SECURITY OVERVIEW -->

            <div
                class="bg-white rounded-[32px] border border-slate-200 p-10 shadow-sm">

                <h3
                    class="text-2xl font-bold text-slate-900">

                    Security Overview

                </h3>

                <div class="mt-8 space-y-6">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="font-semibold">

                                Account Protection

                            </p>

                            <p class="text-sm text-slate-500">

                                Identity verification enabled

                            </p>

                        </div>

                        <span
                            class="px-3 py-1 rounded-full bg-green-100 text-green-600 text-sm font-medium">

                            Active

                        </span>

                    </div>

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="font-semibold">

                                Messaging Access

                            </p>

                            <p class="text-sm text-slate-500">

                                Secure communication available

                            </p>

                        </div>

                        <span
                            class="px-3 py-1 rounded-full bg-green-100 text-green-600 text-sm font-medium">

                            Enabled

                        </span>

                    </div>

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="font-semibold">

                                Connection Requests

                            </p>

                            <p class="text-sm text-slate-500">

                                Request approval system active

                            </p>

                        </div>

                        <span
                            class="px-3 py-1 rounded-full bg-blue-100 text-blue-600 text-sm font-medium">

                            Ready

                        </span>

                    </div>

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="font-semibold">

                                Privacy Status

                            </p>

                            <p class="text-sm text-slate-500">

                                Secure communication channel

                            </p>

                        </div>

                        <span
                            class="px-3 py-1 rounded-full bg-purple-100 text-purple-600 text-sm font-medium">

                            Protected

                        </span>

                    </div>

                </div>

            </div>

        </div>

        <!-- GETTING STARTED -->

        <div class="grid lg:grid-cols-2 gap-6 mb-8">

            <!-- Timeline -->

            <div
                class="bg-white rounded-[32px] border border-slate-200 p-10 shadow-sm">

                <h3
                    class="text-2xl font-bold text-slate-900 mb-8">

                    Getting Started

                </h3>

                <div class="space-y-8">

                    <div class="flex gap-5">

                        <div
                            class="w-12 h-12 rounded-full bg-[#5865F2] text-white flex items-center justify-center font-bold shrink-0">

                            1

                        </div>

                        <div>

                            <h4
                                class="font-semibold text-lg text-slate-900">

                                Share Your Identity Code

                            </h4>

                            <p
                                class="text-slate-500 mt-1">

                                Send your secure identity code to trusted users.

                            </p>

                        </div>

                    </div>

                    <div class="flex gap-5">

                        <div
                            class="w-12 h-12 rounded-full bg-[#5865F2] text-white flex items-center justify-center font-bold shrink-0">

                            2

                        </div>

                        <div>

                            <h4
                                class="font-semibold text-lg text-slate-900">

                                Send Connection Requests

                            </h4>

                            <p
                                class="text-slate-500 mt-1">

                                Build trusted connections through requests.

                            </p>

                        </div>

                    </div>

                    <div class="flex gap-5">

                        <div
                            class="w-12 h-12 rounded-full bg-[#5865F2] text-white flex items-center justify-center font-bold shrink-0">

                            3

                        </div>

                        <div>

                            <h4
                                class="font-semibold text-lg text-slate-900">

                                Start Secure Messaging

                            </h4>

                            <p
                                class="text-slate-500 mt-1">

                                Communicate privately after approval.

                            </p>

                        </div>

                    </div>

                </div>

            </div>

            <!-- Activity -->

            <div
                class="bg-white rounded-[32px] border border-slate-200 p-10 shadow-sm">

                <h3
                    class="text-2xl font-bold text-slate-900 mb-8">

                    Recent Activity

                </h3>

                <div class="space-y-5">

                    <div
                        class="flex items-center justify-between p-4 rounded-2xl bg-slate-50">

                        <div>

                            <p class="font-medium text-slate-900">

                                Account Created

                            </p>

                            <p class="text-sm text-slate-500">

                                Welcome to Secure Messenger

                            </p>

                        </div>

                        <span
                            class="text-xs text-slate-400">

                            Today

                        </span>

                    </div>

                    <div
                        class="flex items-center justify-between p-4 rounded-2xl bg-slate-50">

                        <div>

                            <p class="font-medium text-slate-900">

                                Identity Code Generated

                            </p>

                            <p class="text-sm text-slate-500">

                                Secure account activated

                            </p>

                        </div>

                        <span
                            class="text-xs text-slate-400">

                            Active

                        </span>

                    </div>

                    <div
                        class="flex items-center justify-between p-4 rounded-2xl bg-slate-50">

                        <div>

                            <p class="font-medium text-slate-900">

                                Ready For Connections

                            </p>

                            <p class="text-sm text-slate-500">

                                Start adding trusted contacts

                            </p>

                        </div>

                        <span
                            class="text-xs text-green-600 font-medium">

                            Ready

                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<script>

function copyCode() {

    navigator.clipboard.writeText('{{ Auth::user()->unique_code }}');

    const toast = document.createElement('div');

    toast.innerHTML = `
        <div class="flex items-center gap-3">
            <span>✅</span>
            <span>Identity Code Copied</span>
        </div>
    `;

    toast.className =
        'fixed top-6 right-6 bg-slate-900 text-white px-5 py-4 rounded-2xl shadow-2xl z-50';

    document.body.appendChild(toast);

    setTimeout(() => {

        toast.style.opacity = '0';
        toast.style.transition = '0.3s';

        setTimeout(() => {
            toast.remove();
        }, 300);

    }, 2000);
}

</script>

</x-app-layout>