<x-app-layout>

<div class="py-8">
    <div class="max-w-4xl mx-auto px-6">

<!-- Back Button -->
<div class="mb-4">
    <a href="{{ route('dashboard') }}"
       class="inline-flex items-center bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-xl shadow transition">

        ← Back to Dashboard

    </a>
</div>
    <!-- Header Card -->
    <div class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white rounded-2xl shadow-lg p-8 mb-6">
        <h1 class="text-3xl font-bold">
            🔍 Find User
        </h1>

        <p class="mt-2 text-blue-100">
            Enter a 6-digit secure code to connect with another user.
        </p>
    </div>

    <!-- Alerts -->
    @if(session('error'))
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-lg mb-4">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Search Card -->
    <div class="bg-white rounded-2xl shadow-lg p-8">

        <h2 class="text-2xl font-bold text-gray-800 mb-4">
            Enter User Code
        </h2>

        <form method="POST" action="{{ route('send.request') }}">
            @csrf

            <div class="flex flex-col md:flex-row gap-4">

                <input
                    type="text"
                    name="unique_code"
                    placeholder="Enter 6 Digit Code"
                    maxlength="6"
                    pattern="[0-9]{6}"
                    inputmode="numeric"
                    required
                    oninput="this.value=this.value.replace(/[^0-9]/g,'')"
                    class="flex-1 border-2 border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-xl px-4 py-3 text-lg"
                >

                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-xl font-semibold shadow-lg transition duration-300"
                >
                    Send Request
                </button>

            </div>

            <p class="text-gray-500 mt-3 text-sm">
                Only 6 numeric digits are allowed.
            </p>

        </form>

    </div>

    <!-- Tips Section -->
    <div class="bg-white rounded-2xl shadow-lg p-6 mt-6">

        <h3 class="text-lg font-bold text-gray-800 mb-3">
            📌 How It Works
        </h3>

        <ul class="space-y-2 text-gray-600">
            <li>1️⃣ Ask your friend for their 6-digit code.</li>
            <li>2️⃣ Enter the code above.</li>
            <li>3️⃣ Send a chat request.</li>
            <li>4️⃣ Once accepted, secure messaging will be enabled.</li>
        </ul>

    </div>

</div>
```

</div>

</x-app-layout>
