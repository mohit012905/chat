<x-app-layout>

<div class="py-8">
    <div class="max-w-5xl mx-auto px-6">

```
    <!-- Header -->
    <div class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white rounded-2xl shadow-lg p-8 mb-6">
        <h1 class="text-3xl font-bold">
            📨 Chat Requests
        </h1>

        <p class="mt-2 text-blue-100">
            Manage incoming connection requests.
        </p>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-lg mb-4">
            {{ session('error') }}
        </div>
    @endif

    @forelse($requests as $request)

        <div class="bg-white rounded-2xl shadow-lg p-6 mb-4 hover:shadow-xl transition duration-300">

            <div class="flex items-center justify-between">

                <div class="flex items-center">

                    <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center text-2xl">
                        👤
                    </div>

                    <div class="ml-4">

                        <h3 class="text-xl font-bold text-gray-800">
                            {{ $request->sender->name }}
                        </h3>

                        <p class="text-gray-500">
                            wants to connect with you.
                        </p>

                    </div>

                </div>

            </div>

            <div class="mt-6 flex gap-3">

                <form
                    method="POST"
                    action="{{ route('requests.accept', $request->id) }}">
                    @csrf

                    <button
                        type="submit"
                        class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded-xl font-semibold shadow">
                        ✅ Accept
                    </button>
                </form>

                <form
                    method="POST"
                    action="{{ route('requests.reject', $request->id) }}">
                    @csrf

                    <button
                        type="submit"
                        class="bg-red-500 hover:bg-red-600 text-white px-6 py-2 rounded-xl font-semibold shadow">
                        ❌ Reject
                    </button>
                </form>

            </div>

        </div>

    @empty

        <div class="bg-white rounded-2xl shadow-lg p-10 text-center">

            <div class="text-6xl mb-4">
                📭
            </div>

            <h2 class="text-2xl font-bold text-gray-700">
                No Pending Requests
            </h2>

            <p class="text-gray-500 mt-2">
                You don't have any connection requests at the moment.
            </p>

        </div>

    @endforelse

</div>
```

</div>

</x-app-layout>
