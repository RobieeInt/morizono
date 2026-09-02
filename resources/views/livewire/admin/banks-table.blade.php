<div>
    <div class="flex items-center justify-between gap-3 mb-3">
        <input type="text" wire:model.live.debounce.300ms="search" placeholder="Search nama bank"
            class="border rounded px-3 py-2 w-full md:w-80">

        <a href="{{ route('admin.banks.create') }}" class="px-3 py-2 border rounded bg-white hover:bg-gray-50 text-sm">
            + Tambah Bank
        </a>
    </div>

    <div class="overflow-x-auto border rounded bg-white">
        <table class="min-w-full text-sm">
            <thead class="bg-gray-50">
                <tr>
                    <th class="p-2 text-left">Bank</th>
                    <th class="p-2 text-left">Min DP</th>
                    <th class="p-2 text-left">Bunga Fix</th>
                    <th class="p-2 text-left">Bunga Floating</th>
                    <th class="p-2 text-left">Biaya KPR / BPHTB</th>
                    <th class="p-2 text-left">Status</th>
                    <th class="p-2"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($banks as $b)
                    <tr class="border-t">
                        <td class="p-2">{{ $b->name }}</td>
                        <td class="p-2">{{ $b->min_dp_percent }}%</td>
                        <td class="p-2">{{ $b->fixed_rate_percent }}% / {{ $b->fixed_years }}th</td>
                        <td class="p-2">{{ $b->floating_rate_percent }}%</td>
                        <td class="p-2">{{ $b->biaya_kpr_percent }}% / {{ $b->biaya_bphtb_percent }}%</td>
                        <td class="p-2">
                            <button wire:click="toggleActive({{ $b->id }})"
                                class="{{ $b->is_active ? 'text-green-700' : 'text-gray-400' }}">
                                {{ $b->is_active ? 'Active' : 'Inactive' }}
                            </button>
                        </td>
                        <td class="p-2 whitespace-nowrap text-right">
                            <a href="{{ route('admin.banks.edit', $b) }}" class="text-blue-600 hover:underline mr-2">Edit</a>
                            <button wire:click="delete({{ $b->id }})" wire:confirm="Hapus bank ini?"
                                class="text-red-600 hover:underline">Delete</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="p-4 text-center text-gray-500">No data</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">{{ $banks->links() }}</div>
</div>
