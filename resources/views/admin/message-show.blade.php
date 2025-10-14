<x-layouts.dashboard :title="'Message from ' . $contact->name" :page-title="'Message detail'">
    <div class="bg-white border rounded p-6 space-y-4 max-w-3xl">
        <div class="text-sm text-gray-600">Received {{ $contact->created_at->format('Y-m-d H:i') }}</div>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <div class="text-xs text-gray-500">Name</div>
                <div class="font-medium">{{ $contact->name }}</div>
            </div>
            <div>
                <div class="text-xs text-gray-500">Email</div>
                <div>{{ $contact->email }}</div>
            </div>
            <div>
                <div class="text-xs text-gray-500">Phone</div>
                <div>{{ $contact->phone }}</div>
            </div>
        </div>
        <div>
            <div class="text-xs text-gray-500 mb-1">Message</div>
            <div class="whitespace-pre-line">{{ $contact->message }}</div>
        </div>
        <a href="{{ route('admin.messages') }}" class="px-3 py-2 border rounded bg-white hover:bg-gray-50">Back</a>
    </div>
</x-layouts.dashboard>
