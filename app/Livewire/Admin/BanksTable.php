<?php

namespace App\Livewire\Admin;

use App\Models\Bank;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class BanksTable extends Component
{
    use WithPagination;

    #[Url(history: true, keep: true)]
    public string $search = '';

    #[Url(history: true, keep: true)]
    public int $perPage = 20;

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function toggleActive(int $id): void
    {
        $bank = Bank::findOrFail($id);
        $bank->update(['is_active' => ! $bank->is_active]);
        $this->dispatch('toast', message: 'Status diperbarui');
    }

    public function delete(int $id): void
    {
        Bank::whereKey($id)->delete();
        $this->dispatch('toast', message: 'Deleted');
        $this->resetPage();
    }

    public function render()
    {
        $s = trim($this->search);

        $banks = Bank::query()
            ->when($s !== '', fn ($q) => $q->where('name', 'like', "%{$s}%"))
            ->orderBy('name')
            ->paginate($this->perPage);

        return view('livewire.admin.banks-table', compact('banks'));
    }
}
