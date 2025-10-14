<x-layouts.dashboard :title="'Overview'" :page-title="'Overview'">
    <livewire:admin.overview-stats />
    <div class="mt-6 bg-white border rounded p-4">
        <div class="text-sm text-gray-600 mb-2">Recent messages</div>
        <livewire:admin.messages-table :perPage="10" :compact="true" />
    </div>
</x-layouts.dashboard>
