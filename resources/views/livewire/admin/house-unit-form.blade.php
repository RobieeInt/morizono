<div>
    <form wire:submit.prevent="save" class="bg-white border rounded p-6 max-w-2xl space-y-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm text-gray-700 mb-1">Cluster</label>
                <input type="text" wire:model.defer="cluster" class="w-full border rounded p-2">
                @error('cluster') <div class="text-xs text-red-600 mt-1">{{ $message }}</div> @enderror
            </div>
            <div>
                <label class="block text-sm text-gray-700 mb-1">Tipe</label>
                <input type="text" wire:model.defer="tipe" class="w-full border rounded p-2">
                @error('tipe') <div class="text-xs text-red-600 mt-1">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div>
                <label class="block text-sm text-gray-700 mb-1">Unit No (opsional)</label>
                <input type="text" wire:model.defer="unit_no" class="w-full border rounded p-2">
            </div>
            <div>
                <label class="block text-sm text-gray-700 mb-1">Luas Tanah (m²)</label>
                <input type="number" wire:model.defer="luas_tanah" class="w-full border rounded p-2">
                @error('luas_tanah') <div class="text-xs text-red-600 mt-1">{{ $message }}</div> @enderror
            </div>
            <div>
                <label class="block text-sm text-gray-700 mb-1">Luas Bangunan (m²)</label>
                <input type="number" wire:model.defer="luas_bangunan" class="w-full border rounded p-2">
                @error('luas_bangunan') <div class="text-xs text-red-600 mt-1">{{ $message }}</div> @enderror
            </div>
        </div>

        <div>
            <label class="block text-sm text-gray-700 mb-1">Harga (Rp)</label>
            <input type="number" wire:model.defer="harga" class="w-full border rounded p-2">
            @error('harga') <div class="text-xs text-red-600 mt-1">{{ $message }}</div> @enderror
        </div>

        <label class="flex items-center gap-2 text-sm text-gray-700">
            <input type="checkbox" wire:model.defer="is_active">
            Aktif (tampil di kalkulator publik)
        </label>

        <div class="flex gap-3">
            <button type="submit" class="px-4 py-2 rounded bg-gray-900 text-white">Simpan</button>
            <a href="{{ route('admin.house-units') }}" class="px-4 py-2 rounded border">Batal</a>
        </div>
    </form>
</div>
