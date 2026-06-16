@forelse($messages as $message)

    @if($message->sender_id == auth()->id())

        <!-- My Message -->

        <div class="flex justify-end mb-6">

            <div class="max-w-[70%]">

                <div
                    class="bg-gradient-to-r from-indigo-600 to-blue-600 text-white px-5 py-3 rounded-[22px] rounded-br-md shadow-lg">

                    <p class="text-sm leading-relaxed break-words">
                        {{ $message->message }}
                    </p>

                </div>

                <div
                    class="flex items-center justify-end gap-1 mt-2 text-xs text-slate-500">

                    <span>
                        {{ $message->created_at->format('h:i A') }}
                    </span>

                    @if($message->is_seen)

                        <span class="text-blue-600 font-medium">
                            ✓✓ Seen
                        </span>

                    @else

                        <span>
                            ✓ Sent
                        </span>

                    @endif

                </div>

            </div>

        </div>

    @else

        <!-- Receiver Message -->

        <div class="flex justify-start mb-6">

            <div class="max-w-[70%]">

                <div
                    class="bg-white border border-slate-200 text-slate-800 px-5 py-3 rounded-[22px] rounded-bl-md shadow-sm">

                    <p class="text-sm leading-relaxed break-words">
                        {{ $message->message }}
                    </p>

                </div>

                <div
                    class="mt-2 text-xs text-slate-500">

                    {{ $message->created_at->format('h:i A') }}

                </div>

            </div>

        </div>

    @endif

@empty

    <div class="h-full flex items-center justify-center">

        <div class="text-center">

            <div
                class="w-24 h-24 mx-auto rounded-3xl bg-indigo-100 flex items-center justify-center text-4xl mb-6">

                💬

            </div>

            <h3
                class="text-2xl font-bold text-slate-800">

                Start Your Conversation

            </h3>

            <p
                class="text-slate-500 mt-2 max-w-sm">

                Send your first message and begin a secure conversation.

            </p>

        </div>

    </div>

@endforelse