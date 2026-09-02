<div>
    <div class="flex items-center justify-between gap-3 mb-3">
        <input type="text" wire:model.live.debounce.300ms="search" placeholder="Search cluster/tipe/unit no"
            class="border rounded px-3 py-2 w-full md:w-80">

        <a href="{{ route('admin.house-units.create') }}" class="px-3 py-2 border rounded bg-white hover:bg-gray-50 text-sm">
            + Tambah Unit
        </a>
    </div>

    <div class="overflow-x-auto border rounded bg-white">
        <table class="min-w-full text-sm">
            <thead class="bg-gray-50">
                <tr>
                    <th class="p-2 text-left">Cluster</th>
                    <th class="p-2 text-left">Tipe</th>
                    <th class="p-2 text-left">Unit No</th>
                    <th class="p-2 text-left">LT/LB</th>
                    <th class="p-2 text-left">Harga</th>
                    <th class="p-2 text-left">Status</th>
                    <th class="p-2 text-left">Link Eksternal</th>
                    <th class="p-2"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($units as $u)
                    <tr class="border-t">
                        <td class="p-2">{{ $u->cluster }}</td>
                        <td class="p-2">{{ $u->tipe }}</td>
                        <td class="p-2">{{ $u->unit_no ?: '-' }}</td>
                        <td class="p-2">{{ $u->luas_tanah }}/{{ $u->luas_bangunan }} m²</td>
                        <td class="p-2">Rp {{ number_format($u->harga, 0, ',', '.') }}</td>
                        <td class="p-2">
                            <button wire:click="toggleActive({{ $u->id }})"
                                class="{{ $u->is_active ? 'text-green-700' : 'text-gray-400' }}">
                                {{ $u->is_active ? 'Active' : 'Inactive' }}
                            </button>
                        </td>
                        <td class="p-2">
                            <div x-data="{ copied: false, link: '{{ route('kpr.simulator', ['unit' => $u->slug]) }}' }" class="flex items-center gap-2">
                                <input type="text" readonly value="{{ route('kpr.simulator', ['unit' => $u->slug]) }}"
                                    @click="$event.target.select()"
                                    class="border rounded px-2 py-1 text-xs w-56 bg-gray-50 text-gray-600">
                                <button type="button"
                                    @click="navigator.clipboard.writeText(link); copied = true; setTimeout(() => copied = false, 1500)"
                                    class="px-2 py-1 text-xs rounded border bg-white hover:bg-gray-50 whitespace-nowrap">
                                    <span x-show="!copied">Copy</span>
                                    <span x-show="copied" class="text-green-700">Copied!</span>
                                </button>
                            </div>
                        </td>
                        <td class="p-2 whitespace-nowrap text-right">
                            <a href="{{ route('admin.house-units.edit', $u) }}" class="text-blue-600 hover:underline mr-2">Edit</a>
                            <button wire:click="delete({{ $u->id }})" wire:confirm="Hapus unit ini?"
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

    <div class="mt-3">{{ $units->links() }}</div>
</div>
