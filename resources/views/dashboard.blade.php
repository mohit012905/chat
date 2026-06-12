<x-app-layout>

<x-slot name="header">

<div class="flex justify-between items-center">

    <h2 class="font-bold text-3xl text-gray-800">
        🚀 Secure Messenger
    </h2>

    <!-- Top Right Icons -->
    <div class="flex items-center gap-4">

        <a href="{{ route('find.user') }}"
           class="w-12 h-12 bg-blue-100 hover:bg-blue-200 rounded-full flex items-center justify-center text-2xl transition">
            🔍
        </a>

        <a href="{{ route('requests.index') }}"
           class="w-12 h-12 bg-orange-100 hover:bg-orange-200 rounded-full flex items-center justify-center text-2xl transition">
            📨
        </a>

        <a href="{{ route('contacts.index') }}"
           class="w-12 h-12 bg-purple-100 hover:bg-purple-200 rounded-full flex items-center justify-center text-2xl transition">
            💬
        </a>

    </div>

</div>

</x-slot>

<div class="py-8">

<div class="max-w-7xl mx-auto px-6">

    <!-- Welcome Banner -->

    <div class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white rounded-3xl shadow-xl p-8 mb-8">

        <div class="flex justify-between items-center">

            <div>

                <h1 class="text-4xl font-bold">
                    Welcome, {{ Auth::user()->name }} 👋
                </h1>

                <p class="text-blue-100 mt-2">
                    Secure end-to-end encrypted communication.
                </p>

            </div>

            @if(Auth::user()->profile_photo)

                <img
                    src="{{ asset('storage/' . Auth::user()->profile_photo) }}"
                    class="w-24 h-24 rounded-full object-cover border-4 border-white">

            @else

                <div class="w-24 h-24 rounded-full bg-white/20 flex items-center justify-center text-5xl">
                    👤
                </div>

            @endif

        </div>

    </div>

    <!-- Search User -->

    

    <!-- Unique Code -->

    <div class="bg-white rounded-3xl shadow-lg p-6">

        <div class="flex justify-between items-center">

            <div>

                <h3 class="text-gray-500 uppercase text-sm">
                    Your Unique Code
                </h3>

                <h2 class="text-5xl font-extrabold text-blue-600 mt-2">
                    {{ Auth::user()->unique_code }}
                </h2>

            </div>

            <button
                onclick="copyCode()"
                class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-xl">
                📋 Copy
            </button>

        </div>

    </div>
    <!-- Instructions Section -->

<div class="bg-white rounded-3xl shadow-lg p-8 mt-6">

    <h3 class="text-2xl font-bold text-gray-800 mb-6">
        📖 How To Use Secure Messenger
    </h3>

    <div class="grid md:grid-cols-2 gap-6">

        <div class="flex items-start gap-4">
            <div class="text-3xl">🔑</div>

            <div>
                <h4 class="font-semibold text-lg">
                    Share Your Code
                </h4>

                <p class="text-gray-500">
                    Share your unique 6-digit code with trusted users.
                </p>
            </div>
        </div>

        <div class="flex items-start gap-4">
            <div class="text-3xl">🔍</div>

            <div>
                <h4 class="font-semibold text-lg">
                    Find User
                </h4>

                <p class="text-gray-500">
                    Search users using their unique code.
                </p>
            </div>
        </div>

        <div class="flex items-start gap-4">
            <div class="text-3xl">📨</div>

            <div>
                <h4 class="font-semibold text-lg">
                    Send Request
                </h4>

                <p class="text-gray-500">
                    Send a secure connection request.
                </p>
            </div>
        </div>

        <div class="flex items-start gap-4">
            <div class="text-3xl">✅</div>

            <div>
                <h4 class="font-semibold text-lg">
                    Get Accepted
                </h4>

                <p class="text-gray-500">
                    Wait for the other user to accept your request.
                </p>
            </div>
        </div>

        <div class="flex items-start gap-4">
            <div class="text-3xl">💬</div>

            <div>
                <h4 class="font-semibold text-lg">
                    Start Chatting
                </h4>

                <p class="text-gray-500">
                    Once accepted, start secure conversations.
                </p>
            </div>
        </div>

        <div class="flex items-start gap-4">
            <div class="text-3xl">🔒</div>

            <div>
                <h4 class="font-semibold text-lg">
                    Stay Secure
                </h4>

                <p class="text-gray-500">
                    Only connect with people you trust.
                </p>
            </div>
        </div>

    </div>

</div>

<!-- Footer -->

<footer class="mt-8">

    <div class="bg-gradient-to-r from-gray-900 to-gray-800 text-white rounded-3xl shadow-xl p-8 text-center">

        <h3 class="text-3xl font-bold mb-2">
            🚀 Secure Messenger
        </h3>

        <p class="text-gray-300">
            Secure Communication Platform
        </p>

        <div class="w-24 h-1 bg-blue-500 mx-auto my-4 rounded-full"></div>

        <p class="font-semibold text-lg">
            Developed by Mohit Raval
        </p>

        <p class="text-gray-400 mt-2">
            © {{ date('Y') }} Mohit Raval. All Rights Reserved.
        </p>

        <p class="text-sm text-gray-500 mt-4">
            Privacy • Security • Reliability • Secure Communication
        </p>

    </div>

</footer>
</div>

</div>

<script>
function copyCode() {

    navigator.clipboard.writeText(
        '{{ Auth::user()->unique_code }}'
    );

    const toast = document.createElement('div');

    toast.innerHTML = '✅ Code Copied';

    toast.className =
        'fixed top-5 right-5 bg-green-500 text-white px-4 py-2 rounded-xl shadow-lg z-50';

    document.body.appendChild(toast);

    setTimeout(() => {
        toast.remove();
    }, 2000);
}
</script>

</x-app-layout>