<div>
    <form wire:submit.prevent="save" class="bg-white border rounded p-6 max-w-2xl space-y-4">
        <div>
            <label class="block text-sm text-gray-700 mb-1">Nama Bank</label>
            <input type="text" wire:model.defer="name" class="w-full border rounded p-2">
            @error('name') <div class="text-xs text-red-600 mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div>
                <label class="block text-sm text-gray-700 mb-1">Min DP (%)</label>
                <input type="number" step="0.5" wire:model.defer="min_dp_percent" class="w-full border rounded p-2">
                @error('min_dp_percent') <div class="text-xs text-red-600 mt-1">{{ $message }}</div> @enderror
            </div>
            <div>
                <label class="block text-sm text-gray-700 mb-1">Bunga Fixed (%/tahun)</label>
                <input type="number" step="0.01" wire:model.defer="fixed_rate_percent" class="w-full border rounded p-2">
                @error('fixed_rate_percent') <div class="text-xs text-red-600 mt-1">{{ $message }}</div> @enderror
            </div>
            <div>
                <label class="block text-sm text-gray-700 mb-1">Lama Fixed (tahun)</label>
                <input type="number" wire:model.defer="fixed_years" class="w-full border rounded p-2">
                @error('fixed_years') <div class="text-xs text-red-600 mt-1">{{ $message }}</div> @enderror
            </div>
        </div>

        <div>
            <label class="block text-sm text-gray-700 mb-1">Bunga Floating (%/tahun, setelah periode fixed)</label>
            <input type="number" step="0.01" wire:model.defer="floating_rate_percent" class="w-full border rounded p-2 max-w-xs">
            @error('floating_rate_percent') <div class="text-xs text-red-600 mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm text-gray-700 mb-1">Reservation Fee (Rp)</label>
                <input type="number" wire:model.defer="reservation_fee" class="w-full border rounded p-2">
            </div>
            <div>
                <label class="block text-sm text-gray-700 mb-1">Booking Fee (Rp)</label>
                <input type="number" wire:model.defer="booking_fee" class="w-full border rounded p-2">
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div>
                <label class="block text-sm text-gray-700 mb-1">Biaya KPR (%, asuransi+provisi+admin)</label>
                <input type="number" step="0.01" wire:model.defer="biaya_kpr_percent" class="w-full border rounded p-2">
            </div>
            <div>
                <label class="block text-sm text-gray-700 mb-1">Biaya BPHTB (%)</label>
                <input type="number" step="0.01" wire:model.defer="biaya_bphtb_percent" class="w-full border rounded p-2">
            </div>
            <div>
                <label class="block text-sm text-gray-700 mb-1">Biaya AJB (Rp)</label>
                <input type="number" wire:model.defer="biaya_ajb_nominal" class="w-full border rounded p-2">
            </div>
        </div>

        <label class="flex items-center gap-2 text-sm text-gray-700">
            <input type="checkbox" wire:model.defer="is_active">
            Aktif (tampil di kalkulator publik)
        </label>

        <div class="flex gap-3">
            <button type="submit" class="px-4 py-2 rounded bg-gray-900 text-white">Simpan</button>
            <a href="{{ route('admin.banks') }}" class="px-4 py-2 rounded border">Batal</a>
        </div>
    </form>
</div>
