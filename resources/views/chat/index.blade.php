<x-app-layout>

<div class="max-w-7xl mx-auto px-6 py-6">

    <div class="bg-white border border-slate-200 rounded-[32px] shadow-xl overflow-hidden h-[80vh] flex flex-col">

        <!-- HEADER -->
        <div class="px-8 py-5 border-b border-slate-200 bg-white">

            <div class="flex items-center justify-between">

                <div class="flex items-center gap-4">

                    <a href="{{ route('contacts.index') }}"
                       class="w-10 h-10 rounded-xl border border-slate-200 flex items-center justify-center hover:bg-slate-50 transition">
                        ←
                    </a>

                    @if($receiver->profile_photo)

                        <img
                            src="{{ asset('storage/' . $receiver->profile_photo) }}"
                            class="w-14 h-14 rounded-2xl object-cover">

                    @else

                        <div class="w-14 h-14 rounded-2xl bg-slate-100 flex items-center justify-center text-xl">
                            👤
                        </div>

                    @endif

                    <div>

                        <h2 class="text-xl font-bold text-slate-900">
                            {{ $receiver->name }}
                        </h2>

                        @if($receiver->last_seen)

                            @if($receiver->last_seen->gt(now()->subMinutes(2)))

                                <p class="text-green-600 text-sm font-medium">
                                    ● Online
                                </p>

                            @else

                                <p class="text-slate-500 text-sm">
                                    Last seen {{ $receiver->last_seen->diffForHumans() }}
                                </p>

                            @endif

                        @endif

                    </div>

                </div>

            </div>

        </div>

        <!-- MESSAGES -->

        <div
            id="chat-box"
            class="flex-1 overflow-y-auto bg-slate-50 p-8">

            <div id="messages-container">

                @include('chat.partials.messages')

            </div>

        </div>

        <!-- COMPOSER -->

        <div class="border-t border-slate-200 bg-white p-5">

            <form
    id="chat-form"
    method="POST"
    action="{{ route('chat.send') }}"
                class="flex items-center gap-4">

                @csrf

                <input
                    type="hidden"
                    name="receiver_id"
                    value="{{ $receiver->id }}">

               <input
    id="message-input"
    type="text"
    name="message"
    autocomplete="off"
    spellcheck="false"
    placeholder="Type your message..."
    class="flex-1 h-14 px-5 rounded-2xl border border-slate-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500"
    required>

                <button
                    type="submit"
                    class="h-14 px-8 rounded-2xl bg-indigo-600 hover:bg-indigo-700 text-white font-semibold transition">

                    Send

                </button>

            </form>

        </div>

    </div>

</div>

<script>

document.addEventListener("DOMContentLoaded", function () {

    const chatBox = document.getElementById("chat-box");
    const input = document.getElementById("message-input");
    const form = document.getElementById("chat-form");

    // Scroll to latest message on first load
    chatBox.scrollTop = chatBox.scrollHeight;

    // Restore draft
    input.value = localStorage.getItem("chat_draft") || "";

    // Save draft while typing
    input.addEventListener("input", function () {

        localStorage.setItem(
            "chat_draft",
            this.value
        );

    });

    // Clear draft + input after sending
    form.addEventListener("submit", function () {

        localStorage.removeItem("chat_draft");

        setTimeout(() => {

            input.value = "";

        }, 50);

    });

    function refreshMessages() {

        fetch("{{ route('chat.fetch', $receiver->id) }}", {
            headers: {
                "X-Requested-With": "XMLHttpRequest"
            }
        })
        .then(response => {

            if (!response.ok) {
                throw new Error("Failed to load messages");
            }

            return response.text();

        })
        .then(html => {

            const nearBottom =
                chatBox.scrollHeight -
                chatBox.scrollTop -
                chatBox.clientHeight < 150;

            document.getElementById(
                "messages-container"
            ).innerHTML = html;

            // Auto-scroll only if user is already near bottom
            if (nearBottom) {

                chatBox.scrollTop =
                    chatBox.scrollHeight;

            }

        })
        .catch(error => {

            console.error(
                "Message refresh failed:",
                error
            );

        });

    }

    // Refresh every 3 seconds
    setInterval(refreshMessages, 3000);

});

</script>

</x-app-layout>