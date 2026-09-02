<x-layouts.dashboard :title="isset($unit) ? 'Edit Unit Rumah' : 'Tambah Unit Rumah'" :page-title="isset($unit) ? 'Edit Unit Rumah' : 'Tambah Unit Rumah'">
    <livewire:admin.house-unit-form :unit="$unit ?? null" />
</x-layouts.dashboard>
