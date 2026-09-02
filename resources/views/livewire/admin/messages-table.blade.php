<div>
    <div class="flex items-center justify-between gap-3 mb-3 flex-wrap">
        <div class="flex items-center gap-2 flex-1">
            <input type="text" wire:model.live.debounce.300ms="search" placeholder="Search name/email/phone/message"
                class="border rounded px-3 py-2 w-full md:w-80">

            <select wire:model.live="source" class="border rounded px-3 py-2 text-sm">
                <option value="">Semua Sumber</option>
                <option value="contact_form">Contact Form</option>
                <option value="kpr_simulator">KPR Simulator</option>
            </select>
        </div>

        <a href="{{ route('admin.export.contacts') }}" class="px-3 py-2 border rounded bg-white hover:bg-gray-50 text-sm">
            Export CSV
        </a>
    </div>

    <div class="overflow-x-auto border rounded bg-white">
        <table class="min-w-full text-sm">
            <thead class="bg-gray-50">
                <tr>
                    <th class="p-2 text-left">Time</th>
                    <th class="p-2 text-left">Name</th>
                    <th class="p-2 text-left">Email</th>
                    <th class="p-2 text-left">Phone</th>
                    <th class="p-2 text-left">Message</th>
                    <th class="p-2 text-left">Source</th>
                    <th class="p-2 text-left">Status</th>
                    <th class="p-2"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($contacts as $c)
                    <tr class="border-t">
                        <td class="p-2 whitespace-nowrap">
                            {{ optional($c->created_at)?->format('Y-m-d H:i') }}
                        </td>
                        <td class="p-2">{{ $c->name }}</td>
                        <td class="p-2">{{ $c->email }}</td>

                        {{-- PHONE + WA --}}
                        <td class="p-2 whitespace-nowrap">
                            <div class="flex items-center gap-2">
                                <span>{{ $c->phone }}</span>
                                <button type="button" wire:click="contactViaWhatsApp({{ $c->id }})"
                                    class="inline-flex items-center justify-center rounded p-1 text-green-600 hover:text-green-800"
                                    title="Chat via WhatsApp">
                                    <img src="{{ asset('whatsapp.svg') }}" alt="WA" class="w-4 h-4">
                                </button>
                            </div>
                        </td>

                        <td class="p-2">
                            {{ \Illuminate\Support\Str::limit($c->message, $compact ? 60 : 120) }}
                        </td>

                        <td class="p-2">
                            @if ($c->source === 'kpr_simulator')
                                <span class="inline-block px-2 py-0.5 rounded text-xs font-medium bg-[#C8A767]/20 text-[#4a3c33]">KPR Simulator</span>
                            @else
                                <span class="inline-block px-2 py-0.5 rounded text-xs font-medium bg-gray-100 text-gray-600">Contact Form</span>
                            @endif
                        </td>

                        <td class="p-2">
                            @if ($c->read_at)
                                <span class="text-green-700">Read</span>
                            @else
                                <span class="text-amber-700">New</span>
                            @endif
                        </td>

                        <td class="p-2 whitespace-nowrap text-right">
                            <a href="{{ route('admin.messages.show', $c) }}"
                                class="text-blue-600 hover:underline mr-2">View</a>

                            @if (!$c->read_at)
                                <button wire:click="markRead({{ $c->id }})"
                                    class="text-gray-700 hover:underline mr-2">Mark read</button>
                            @endif

                            <button wire:click="delete({{ $c->id }})"
                                class="text-red-600 hover:underline">Delete</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="p-4 text-center text-gray-500">No data</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">{{ $contacts->links() }}</div>

    {{-- Listener untuk buka URL WA dari Livewire --}}
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('open-url', (payload) => {
                const url = payload?.url || payload;
                if (url) window.open(url, '_blank');
            });
        });
    </script>
</div>
