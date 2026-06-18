<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Decrypt Message | E2EE Admin</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-slate-100">

<!-- ================= NAVBAR ================= -->

<nav class="sticky top-0 z-50 bg-white border-b border-slate-200 shadow-sm">

    <div class="max-w-7xl mx-auto px-8">

        <div class="h-20 flex items-center justify-between">

            <div class="flex items-center gap-4">

                <div class="w-14 h-14 rounded-2xl bg-gradient-to-r from-indigo-600 to-blue-600 flex items-center justify-center shadow-lg">

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

                    <h1 class="text-2xl font-bold text-slate-800">

                        E2EE Admin

                    </h1>

                    <p class="text-slate-500">

                        Secure Message Decryption

                    </p>

                </div>

            </div>

            <div class="flex items-center gap-4">

                <a href="{{ route('admin.dashboard') }}"
                   class="px-5 py-3 rounded-xl hover:bg-slate-100 font-medium">

                    Dashboard

                </a>

                <a href="{{ route('admin.messages') }}"
                   class="px-5 py-3 rounded-xl bg-indigo-600 text-white font-semibold">

                    Messages

                </a>

                <form method="POST"
                      action="{{ route('logout') }}">

                    @csrf

                    <button
                        class="px-5 py-3 rounded-xl bg-red-500 hover:bg-red-600 text-white font-semibold">

                        Logout

                    </button>

                </form>

            </div>

        </div>

    </div>

</nav>

<!-- ================= CONTENT ================= -->

<div class="max-w-7xl mx-auto px-8 py-10">

    <div class="flex items-center justify-between mb-8">

        <div>

            <h2 class="text-4xl font-bold text-slate-800">

                Message Decryption

            </h2>

            <p class="text-slate-500 mt-2">

                Review encrypted data and decrypted message.

            </p>

        </div>

        <a href="{{ route('admin.messages') }}"
           class="px-6 py-3 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white font-semibold">

            ← Back

        </a>

    </div>

    <!-- Summary Cards -->

    <div class="grid md:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">

        <div class="bg-white rounded-3xl shadow-sm border border-slate-200 p-6">

            <p class="text-slate-500">

                Message ID

            </p>

            <h2 class="text-4xl font-bold text-indigo-600 mt-3">

                #{{ $message->id }}

            </h2>

        </div>

        <div class="bg-white rounded-3xl shadow-sm border border-slate-200 p-6">

            <p class="text-slate-500">

                Sender

            </p>

            <h3 class="font-bold mt-3">

                {{ optional($message->sender)->name }}

            </h3>

            <p class="text-sm text-slate-500">

                {{ optional($message->sender)->email }}

            </p>

        </div>

        <div class="bg-white rounded-3xl shadow-sm border border-slate-200 p-6">

            <p class="text-slate-500">

                Receiver

            </p>

            <h3 class="font-bold mt-3">

                {{ optional($message->receiver)->name }}

            </h3>

            <p class="text-sm text-slate-500">

                {{ optional($message->receiver)->email }}

            </p>

        </div>

        <div class="bg-white rounded-3xl shadow-sm border border-slate-200 p-6">

            <p class="text-slate-500">

                Status

            </p>

            @if($message->is_seen)

                <span class="inline-flex mt-3 px-4 py-2 rounded-full bg-green-100 text-green-700 font-semibold">

                    ✓ Seen

                </span>

            @else

                <span class="inline-flex mt-3 px-4 py-2 rounded-full bg-orange-100 text-orange-700 font-semibold">

                    Pending

                </span>

            @endif

        </div>

    </div>

    <!-- Messages -->

    <div class="grid lg:grid-cols-2 gap-8">

        <!-- Encrypted -->

        <div class="bg-white rounded-3xl shadow-sm border border-slate-200 overflow-hidden">

            <div class="bg-slate-50 border-b px-6 py-5 flex justify-between">

                <h3 class="font-bold text-lg">

                    Encrypted Message

                </h3>

                <span class="text-xs bg-slate-900 text-green-400 px-3 py-1 rounded-full">

                    AES-256

                </span>

            </div>

            <div class="bg-slate-950 p-6">

                <code class="text-green-400 text-sm break-all leading-7 font-mono">

                    {{ $message->getRawOriginal('message') }}

                </code>

            </div>

        </div>

        <!-- Decrypted -->

        <div class="bg-white rounded-3xl shadow-sm border border-slate-200 overflow-hidden">

            <div class="bg-slate-50 border-b px-6 py-5">

                <h3 class="font-bold text-lg">

                    Decrypted Message

                </h3>

            </div>

            <div class="p-6">

                <div class="rounded-2xl bg-indigo-50 border border-indigo-200 p-6">

                    <p class="text-lg text-slate-700 whitespace-pre-wrap leading-8">

                        {{ $text }}

                    </p>

                </div>

            </div>

        </div>

    </div>

    <!-- Footer Info -->

    <div class="bg-white rounded-3xl shadow-sm border border-slate-200 mt-8">

        <div class="grid md:grid-cols-4 gap-6 p-8">

            <div>

                <p class="text-slate-500 text-sm">

                    Created

                </p>

                <h4 class="font-semibold mt-2">

                    {{ $message->created_at->format('d M Y') }}

                </h4>

            </div>

            <div>

                <p class="text-slate-500 text-sm">

                    Time

                </p>

                <h4 class="font-semibold mt-2">

                    {{ $message->created_at->format('h:i A') }}

                </h4>

            </div>

            <div>

                <p class="text-slate-500 text-sm">

                    Relative Time

                </p>

                <h4 class="font-semibold mt-2">

                    {{ $message->created_at->diffForHumans() }}

                </h4>

            </div>

            <div>

                <p class="text-slate-500 text-sm">

                    Encryption

                </p>

                <span class="inline-flex mt-2 px-3 py-2 rounded-xl bg-green-100 text-green-700 font-semibold">

                    AES-256 Enabled

                </span>

            </div>

        </div>

    </div>

</div>

</body>

</html>