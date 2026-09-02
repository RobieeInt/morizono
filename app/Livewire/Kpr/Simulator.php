<?php

namespace App\Livewire\Kpr;

use App\Models\Bank;
use App\Models\Contact;
use App\Models\HouseUnit;
use App\Services\KprCalculator;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.site')]
class Simulator extends Component
{
    public int $step = 1;

    // step 1 - lead gate
    public $name, $email, $phone;
    public ?int $contactId = null;

    // step 2 - calculator inputs
    public string $priceMode = 'unit'; // 'unit' | 'manual'
    public bool $priceLocked = false;
    public ?int $houseUnitId = null;
    public ?float $manualHarga = null;
    public ?int $bankId = null;
    public float $dpPercent = 0;
    public int $tenorYears = 10;
    public bool $showPromoFields = false;
    public float $subsidiDpPercent = 0;
    public float $otherSupportNominal = 0;

    public ?array $result = null;

    // $unit is a slug from the route path, e.g. /simulasi-kpr/ayame-hook-f0731
    public function mount($unit = null): void
    {
        if (session()->has('kpr_contact_id')) {
            $this->contactId = session('kpr_contact_id');
            $this->step = 2;
        }

        if (session()->has('kpr_locked_unit_id')) {
            $this->applyLockedUnit(session('kpr_locked_unit_id'));
        } elseif ($unit) {
            $lockedUnit = HouseUnit::active()->where('slug', $unit)->first();
            if ($lockedUnit) {
                $this->applyLockedUnit($lockedUnit->id);
                session(['kpr_locked_unit_id' => $lockedUnit->id]);
            }
        }

        if ($bank = Bank::active()->first()) {
            $this->bankId = $bank->id;
            $this->dpPercent = $bank->min_dp_percent;
        }
    }

    protected function applyLockedUnit(int $houseUnitId): void
    {
        $this->priceMode = 'unit';
        $this->houseUnitId = $houseUnitId;
        $this->priceLocked = true;
    }

    protected function rules(): array
    {
        if ($this->step === 1) {
            return [
                'name' => 'required|string|min:3',
                'email' => 'required|email',
                'phone' => 'required|string|max:30',
            ];
        }

        return [
            'priceMode' => 'required|in:unit,manual',
            'houseUnitId' => 'required_if:priceMode,unit|nullable|exists:house_units,id',
            'manualHarga' => 'required_if:priceMode,manual|nullable|numeric|min:1',
            'bankId' => 'required|exists:banks,id',
            'dpPercent' => 'required|numeric|min:0|max:100',
            'tenorYears' => 'required|integer|min:1|max:35',
            'subsidiDpPercent' => 'nullable|numeric|min:0|max:100',
            'otherSupportNominal' => 'nullable|numeric|min:0',
        ];
    }

    public function submitLead(): void
    {
        $this->validate([
            'name' => 'required|string|min:3',
            'email' => 'required|email',
            'phone' => 'required|string|max:30',
        ]);

        $contact = Contact::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'message' => 'Lead dari simulasi KPR',
            'source' => 'kpr_simulator',
        ]);

        $this->contactId = $contact->id;
        session(['kpr_contact_id' => $contact->id]);
        $this->step = 2;
    }

    public function updatedBankId($value): void
    {
        $bank = Bank::find($value);
        if ($bank) {
            $this->dpPercent = $bank->min_dp_percent;
        }
    }

    public function calculate(): void
    {
        $this->validate();

        $bank = Bank::findOrFail($this->bankId);
        $harga = $this->priceMode === 'unit'
            ? HouseUnit::findOrFail($this->houseUnitId)->harga
            : $this->manualHarga;

        $calculator = new KprCalculator();
        $this->result = $calculator->calculate([
            'harga' => $harga,
            'dp_percent' => $this->dpPercent / 100,
            'subsidi_dp_percent' => $this->subsidiDpPercent / 100,
            'other_support_nominal' => $this->otherSupportNominal,
            'reservation_fee' => $bank->reservation_fee,
            'booking_fee' => $bank->booking_fee,
            'fixed_rate_percent' => $bank->fixed_rate_percent / 100,
            'fixed_years' => $bank->fixed_years,
            'floating_rate_percent' => $bank->floating_rate_percent / 100,
            'tenor_years' => $this->tenorYears,
            'biaya_kpr_percent' => $bank->biaya_kpr_percent / 100,
            'biaya_bphtb_percent' => $bank->biaya_bphtb_percent / 100,
            'biaya_ajb_nominal' => $bank->biaya_ajb_nominal,
        ]);

        Contact::whereKey($this->contactId)->update([
            'kpr_meta' => [
                'price_mode' => $this->priceMode,
                'house_unit_id' => $this->houseUnitId,
                'manual_harga' => $this->manualHarga,
                'harga' => $harga,
                'bank_id' => $bank->id,
                'bank_name' => $bank->name,
                'dp_percent' => $this->dpPercent,
                'tenor_years' => $this->tenorYears,
                'subsidi_dp_percent' => $this->subsidiDpPercent,
                'other_support_nominal' => $this->otherSupportNominal,
                'result' => $this->result,
                'calculated_at' => now()->toDateTimeString(),
            ],
        ]);
    }

    public function render()
    {
        return view('livewire.kpr.simulator', [
            'houseUnits' => HouseUnit::active()->orderBy('cluster')->orderBy('tipe')->get(),
            'banks' => Bank::active()->get(),
        ])->title('Simulasi KPR | Morizono');
    }
}
