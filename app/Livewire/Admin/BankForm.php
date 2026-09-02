<?php

namespace App\Livewire\Admin;

use App\Models\Bank;
use Livewire\Component;

class BankForm extends Component
{
    public ?int $id = null;
    public $name;
    public $min_dp_percent = 10;
    public $fixed_rate_percent;
    public $fixed_years;
    public $floating_rate_percent;
    public $reservation_fee = 5000000;
    public $booking_fee = 5000000;
    public $biaya_kpr_percent = 2;
    public $biaya_bphtb_percent = 5;
    public $biaya_ajb_nominal = 15000000;
    public bool $is_active = true;

    protected $rules = [
        'name' => 'required|string|max:255',
        'min_dp_percent' => 'required|numeric|min:0|max:100',
        'fixed_rate_percent' => 'required|numeric|min:0|max:100',
        'fixed_years' => 'required|integer|min:0|max:35',
        'floating_rate_percent' => 'required|numeric|min:0|max:100',
        'reservation_fee' => 'required|numeric|min:0',
        'booking_fee' => 'required|numeric|min:0',
        'biaya_kpr_percent' => 'required|numeric|min:0|max:100',
        'biaya_bphtb_percent' => 'required|numeric|min:0|max:100',
        'biaya_ajb_nominal' => 'required|numeric|min:0',
        'is_active' => 'boolean',
    ];

    public function mount($bank = null): void
    {
        $bank = $bank ? Bank::find($bank) : null;

        if ($bank) {
            $this->id = $bank->id;
            $this->name = $bank->name;
            $this->min_dp_percent = $bank->min_dp_percent;
            $this->fixed_rate_percent = $bank->fixed_rate_percent;
            $this->fixed_years = $bank->fixed_years;
            $this->floating_rate_percent = $bank->floating_rate_percent;
            $this->reservation_fee = $bank->reservation_fee;
            $this->booking_fee = $bank->booking_fee;
            $this->biaya_kpr_percent = $bank->biaya_kpr_percent;
            $this->biaya_bphtb_percent = $bank->biaya_bphtb_percent;
            $this->biaya_ajb_nominal = $bank->biaya_ajb_nominal;
            $this->is_active = $bank->is_active;
        }
    }

    public function save()
    {
        $this->validate();

        Bank::updateOrCreate(['id' => $this->id], [
            'name' => $this->name,
            'min_dp_percent' => $this->min_dp_percent,
            'fixed_rate_percent' => $this->fixed_rate_percent,
            'fixed_years' => $this->fixed_years,
            'floating_rate_percent' => $this->floating_rate_percent,
            'reservation_fee' => $this->reservation_fee,
            'booking_fee' => $this->booking_fee,
            'biaya_kpr_percent' => $this->biaya_kpr_percent,
            'biaya_bphtb_percent' => $this->biaya_bphtb_percent,
            'biaya_ajb_nominal' => $this->biaya_ajb_nominal,
            'is_active' => $this->is_active,
        ]);

        session()->flash('success', 'Data bank tersimpan.');

        return redirect()->route('admin.banks');
    }

    public function render()
    {
        return view('livewire.admin.bank-form');
    }
}
