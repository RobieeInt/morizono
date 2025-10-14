<form wire:submit.prevent="submit" class="space-y-4 max-w-xl">
    @if (session('success'))
        <div class="p-3 rounded bg-green-600/20 text-green-100 text-sm">
            {{ session('success') }}
        </div>
    @endif

    <div>
        <label class="block text-sm text-white/90 mb-1">Name</label>
        <input type="text" wire:model.defer="name"
            class="w-full rounded-sm bg-white text-gray-900 p-3 focus:outline-none focus:ring-2 focus:ring-amber-300">
        @error('name')
            <div class="text-xs text-red-200 mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
            <label class="block text-sm text-white/90 mb-1">Email</label>
            <input type="email" wire:model.defer="email"
                class="w-full rounded-sm bg-white text-gray-900 p-3 focus:outline-none focus:ring-2 focus:ring-amber-300">
            @error('email')
                <div class="text-xs text-red-200 mt-1">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label class="block text-sm text-white/90 mb-1">Phone</label>
            <input type="text" wire:model.defer="phone"
                class="w-full rounded-sm bg-white text-gray-900 p-3 focus:outline-none focus:ring-2 focus:ring-amber-300">
            @error('phone')
                <div class="text-xs text-red-200 mt-1">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div>
        <label class="block text-sm text-white/90 mb-1">Message</label>
        <textarea rows="5" wire:model.defer="message"
            class="w-full rounded-sm bg-white text-gray-900 p-3 focus:outline-none focus:ring-2 focus:ring-amber-300"></textarea>
        @error('message')
            <div class="text-xs text-red-200 mt-1">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit"
        class="w-full sm:w-auto inline-flex items-center justify-center rounded bg-amber-400 hover:bg-amber-500 text-gray-900 font-semibold px-8 py-3 transition">
        <span wire:loading.remove>SUBMIT</span>
        <span wire:loading class="flex items-center gap-2">
            <svg class="animate-spin h-4 w-4" viewBox="0 0 24 24" fill="none">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                    stroke-width="4" />
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4A4 4 0 008 12H4z" />
            </svg>
            Sending...
        </span>
    </button>
</form>
