<x-app-layout>

<div class="py-8">
    <div class="max-w-5xl mx-auto px-6">

        <!-- Header -->
        <div class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white rounded-2xl shadow-lg p-8 mb-6">
            <h1 class="text-3xl font-bold">
                💬 Chats
            </h1>

            <p class="mt-2 text-blue-100">
                Start conversations with your connected contacts.
            </p>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg mb-4">
                {{ session('success') }}
            </div>
        @endif

        @forelse($contacts as $contact)

            <a href="{{ route('chat.index', $contact->contact_id) }}"
               class="block bg-white rounded-2xl shadow-lg p-5 mb-4 hover:shadow-xl hover:scale-[1.01] transition duration-300">

                <div class="flex items-center justify-between">

                    <div class="flex items-center">

                        <div class="w-14 h-14 rounded-full bg-blue-100 flex items-center justify-center text-2xl">
                            👤
                        </div>

                        <div class="ml-4">

                            <h3 class="text-xl font-bold text-gray-800">
                                {{ $contact->user->name }}
                            </h3>

                            <p class="text-gray-500">
                                Tap to start chatting
                            </p>

                        </div>

                    </div>

                    <div class="text-blue-500 text-2xl">
                        💬
                    </div>

                </div>

            </a>

        @empty

            <div class="bg-white rounded-2xl shadow-lg p-10 text-center">

                <div class="text-6xl mb-4">
                    👥
                </div>

                <h2 class="text-2xl font-bold text-gray-700">
                    No Contacts Yet
                </h2>

                <p class="text-gray-500 mt-2">
                    Accept chat requests to start building your contact list.
                </p>

                <a href="{{ route('find.user') }}"
                   class="inline-block mt-4 bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-semibold">
                    Find Users
                </a>

            </div>

        @endforelse

    </div>
</div>

</x-app-layout>