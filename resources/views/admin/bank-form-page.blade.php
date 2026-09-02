<x-layouts.dashboard :title="isset($bank) ? 'Edit Bank' : 'Tambah Bank'" :page-title="isset($bank) ? 'Edit Bank' : 'Tambah Bank'">
    <livewire:admin.bank-form :bank="$bank ?? null" />
</x-layouts.dashboard>
