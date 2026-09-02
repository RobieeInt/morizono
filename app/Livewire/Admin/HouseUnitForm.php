<?php

namespace App\Livewire\Admin;

use App\Models\HouseUnit;
use Livewire\Component;

class HouseUnitForm extends Component
{
    public ?int $id = null;
    public $cluster, $tipe, $unit_no, $luas_tanah, $luas_bangunan, $harga;
    public bool $is_active = true;

    protected $rules = [
        'cluster' => 'required|string|max:255',
        'tipe' => 'required|string|max:255',
        'unit_no' => 'nullable|string|max:255',
        'luas_tanah' => 'required|integer|min:1',
        'luas_bangunan' => 'required|integer|min:1',
        'harga' => 'required|numeric|min:1',
        'is_active' => 'boolean',
    ];

    public function mount($unit = null): void
    {
        $unit = $unit ? (HouseUnit::find($unit) ?? HouseUnit::where('slug', $unit)->first()) : null;

        if ($unit) {
            $this->id = $unit->id;
            $this->cluster = $unit->cluster;
            $this->tipe = $unit->tipe;
            $this->unit_no = $unit->unit_no;
            $this->luas_tanah = $unit->luas_tanah;
            $this->luas_bangunan = $unit->luas_bangunan;
            $this->harga = $unit->harga;
            $this->is_active = $unit->is_active;
        }
    }

    public function save()
    {
        $this->validate();

        HouseUnit::updateOrCreate(['id' => $this->id], [
            'cluster' => $this->cluster,
            'tipe' => $this->tipe,
            'unit_no' => $this->unit_no,
            'luas_tanah' => $this->luas_tanah,
            'luas_bangunan' => $this->luas_bangunan,
            'harga' => $this->harga,
            'is_active' => $this->is_active,
        ]);

        session()->flash('success', 'Unit rumah tersimpan.');

        return redirect()->route('admin.house-units');
    }

    public function render()
    {
        return view('livewire.admin.house-unit-form');
    }
}
