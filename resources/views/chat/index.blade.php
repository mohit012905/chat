<meta http-equiv="refresh" content="5">

<x-app-layout>

<div class="max-w-6xl mx-auto px-4 py-4 h-[90vh]">

<div class="bg-white rounded-3xl shadow-xl overflow-hidden h-full flex flex-col">

    <!-- Chat Header -->
    <div class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white p-5 flex items-center">

        @if($receiver->profile_photo)

    <img src="{{ asset('storage/' . $receiver->profile_photo) }}"
         class="w-14 h-14 rounded-full object-cover border-2 border-white">

@else

    <div class="w-14 h-14 bg-white/20 rounded-full flex items-center justify-center text-2xl">
        👤
    </div>

@endif
        <div class="ml-4">

            <h2 class="text-xl font-bold">
                {{ $receiver->name }}
            </h2>

            <p class="text-blue-100 text-sm">

    @if($receiver->last_seen)

        @if($receiver->last_seen->gt(now()->subMinutes(2)))

            🟢 Online

        @else

            🕒 Last seen {{ $receiver->last_seen->diffForHumans() }}

        @endif

    @else

        ⚪ Never seen

    @endif

</p>

        </div>

    </div>

    <!-- Messages Section -->
    <div id="chat-box"
         class="flex-1 overflow-y-auto p-6 bg-gray-100">

        @forelse($messages as $message)

            @if($message->sender_id == auth()->id())

                <!-- My Message -->
                <div class="flex justify-end mb-4">

                    <div class="max-w-md">

                        <div class="bg-blue-600 text-white px-4 py-3 rounded-2xl rounded-br-sm shadow">

                            {{ $message->message }}

                        </div>

                        <div class="text-right text-xs text-gray-500 mt-1">

                            {{ $message->created_at->format('h:i A') }}

                            @if($message->is_seen)
                                ✓✓ Seen
                            @else
                                ✓ Sent
                            @endif

                        </div>

                    </div>

                </div>

            @else

                <!-- Receiver Message -->
                <div class="flex justify-start mb-4">

                    <div class="max-w-md">

                        <div class="bg-white text-gray-800 px-4 py-3 rounded-2xl rounded-bl-sm shadow">

                            {{ $message->message }}

                        </div>

                        <div class="text-xs text-gray-500 mt-1">

                            {{ $message->created_at->format('h:i A') }}

                        </div>

                    </div>

                </div>

            @endif

        @empty

            <div class="flex items-center justify-center h-full">

                <div class="text-center">

                    <div class="text-6xl mb-4">
                        💬
                    </div>

                    <h3 class="text-xl font-bold text-gray-700">
                        No Messages Yet
                    </h3>

                    <p class="text-gray-500">
                        Start your secure conversation.
                    </p>

                </div>

            </div>

        @endforelse

    </div>

    <!-- Fixed Message Input -->
    <form method="POST"
          action="{{ route('chat.send') }}"
          class="border-t bg-white p-4">
        @csrf

        <input type="hidden"
               name="receiver_id"
               value="{{ $receiver->id }}">

        <div class="flex items-center gap-3">

            <input type="text"
                   name="message"
                   placeholder="Type your message..."
                   class="flex-1 border border-gray-300 rounded-full px-5 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                   required>

            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-full font-semibold shadow-lg">

                🚀 Send

            </button>

        </div>

    </form>

</div>

</div>

<script>
document.addEventListener("DOMContentLoaded", function () {

    let chatBox = document.getElementById("chat-box");

    chatBox.scrollTop = chatBox.scrollHeight;

});
</script>

</x-app-layout>
