<?php

namespace App\Livewire\Admin;

use App\Models\HouseUnit;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class HouseUnitsTable extends Component
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
        $unit = HouseUnit::findOrFail($id);
        $unit->update(['is_active' => ! $unit->is_active]);
        $this->dispatch('toast', message: 'Status diperbarui');
    }

    public function delete(int $id): void
    {
        HouseUnit::whereKey($id)->delete();
        $this->dispatch('toast', message: 'Deleted');
        $this->resetPage();
    }

    public function render()
    {
        $s = trim($this->search);

        $units = HouseUnit::query()
            ->when($s !== '', function ($q) use ($s) {
                $like = "%{$s}%";
                $q->where(function ($q) use ($like) {
                    $q->where('cluster', 'like', $like)
                      ->orWhere('tipe', 'like', $like)
                      ->orWhere('unit_no', 'like', $like);
                });
            })
            ->orderBy('cluster')
            ->orderBy('tipe')
            ->paginate($this->perPage);

        return view('livewire.admin.house-units-table', compact('units'));
    }
}
