<div class="max-w-3xl mx-auto px-4 py-12 md:py-20 mt-5">
    <div class="text-center mb-8">
        <div class="text-xs tracking-widest text-[#C8A767] font-semibold mb-2">MORIZONO</div>
        <h1 class="text-3xl md:text-4xl font-semibold text-[#4a3c33]" style="font-family:'Marcellus',serif;">
            Simulasi KPR
        </h1>
        <p class="text-gray-600 mt-2 text-sm">Hitung estimasi cicilan KPR dari berbagai bank rekanan.</p>
    </div>

    @if ($step === 1)
        {{-- STEP 1: LEAD GATE --}}
        <div class="bg-[#4a3c33] rounded-lg p-6 md:p-8 max-w-xl mx-auto">
            <h2 class="text-white text-lg font-semibold mb-1">Sebelum mulai, kenalan dulu yuk</h2>
            <p class="text-white/70 text-sm mb-6">Isi data berikut untuk lanjut ke kalkulator KPR.</p>

            <form wire:submit.prevent="submitLead" class="space-y-4">
                <div>
                    <label for="kpr-name" class="block text-sm text-white/90 mb-1">Nama</label>
                    <input id="kpr-name" type="text" wire:model.defer="name" autocomplete="name"
                        class="w-full rounded-sm bg-white text-gray-900 p-3 focus:outline-none focus:ring-2 focus:ring-amber-300">
                    @error('name')
                        <div class="text-xs text-red-200 mt-1" role="alert">{{ $message }}</div>
                    @enderror
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="kpr-email" class="block text-sm text-white/90 mb-1">Email</label>
                        <input id="kpr-email" type="email" wire:model.defer="email" autocomplete="email"
                            class="w-full rounded-sm bg-white text-gray-900 p-3 focus:outline-none focus:ring-2 focus:ring-amber-300">
                        @error('email')
                            <div class="text-xs text-red-200 mt-1" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="kpr-phone" class="block text-sm text-white/90 mb-1">No. HP</label>
                        <input id="kpr-phone" type="tel" wire:model.defer="phone" autocomplete="tel"
                            class="w-full rounded-sm bg-white text-gray-900 p-3 focus:outline-none focus:ring-2 focus:ring-amber-300">
                        @error('phone')
                            <div class="text-xs text-red-200 mt-1" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <button type="submit"
                    class="w-full inline-flex items-center justify-center rounded bg-amber-400 hover:bg-amber-500 text-gray-900 font-semibold px-8 py-3 transition">
                    <span wire:loading.remove wire:target="submitLead">LANJUT KE SIMULASI</span>
                    <span wire:loading wire:target="submitLead" class="flex items-center gap-2">
                        <svg class="animate-spin h-4 w-4" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" />
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4A4 4 0 008 12H4z" />
                        </svg>
                        Memproses...
                    </span>
                </button>
            </form>
        </div>
    @else
        {{-- STEP 2: CALCULATOR --}}
        <div class="bg-white border rounded-lg p-6 md:p-8 space-y-6">
            {{-- price mode --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Harga Rumah</label>

                @if (! $priceLocked)
                    <div class="flex gap-2 mb-3">
                        <button type="button" wire:click="$set('priceMode', 'unit')"
                            class="px-4 py-2 rounded text-sm border {{ $priceMode === 'unit' ? 'bg-[#4a3c33] text-white border-[#4a3c33]' : 'bg-white text-gray-700' }}">
                            Pilih Unit
                        </button>
                        <button type="button" wire:click="$set('priceMode', 'manual')"
                            class="px-4 py-2 rounded text-sm border {{ $priceMode === 'manual' ? 'bg-[#4a3c33] text-white border-[#4a3c33]' : 'bg-white text-gray-700' }}">
                            Input Manual
                        </button>
                    </div>
                @endif

                @if ($priceMode === 'unit')
                    @if ($priceLocked)
                        @php($lockedUnit = $houseUnits->firstWhere('id', $houseUnitId) ?? \App\Models\HouseUnit::find($houseUnitId))
                        <div class="p-3 rounded border bg-gray-50 text-sm">
                            <div class="font-medium">{{ $lockedUnit?->label() }}</div>
                            <div class="text-gray-600">Rp {{ number_format($lockedUnit?->harga ?? 0, 0, ',', '.') }}</div>
                        </div>
                    @else
                        <select wire:model.live="houseUnitId" class="w-full border rounded p-3">
                            <option value="">-- Pilih unit rumah --</option>
                            @foreach ($houseUnits as $u)
                                <option value="{{ $u->id }}">{{ $u->label() }} — Rp {{ number_format($u->harga, 0, ',', '.') }}</option>
                            @endforeach
                        </select>
                        @error('houseUnitId')
                            <div class="text-xs text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                    @endif
                @else
                    <input type="number" wire:model.live="manualHarga" placeholder="Contoh: 500000000"
                        class="w-full border rounded p-3">
                    @error('manualHarga')
                        <div class="text-xs text-red-600 mt-1">{{ $message }}</div>
                    @enderror
                @endif
            </div>

            {{-- bank --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Bank KPR</label>
                <select wire:model.live="bankId" class="w-full border rounded p-3">
                    @foreach ($banks as $b)
                        <option value="{{ $b->id }}">{{ $b->name }} (Fix {{ $b->fixed_rate_percent }}% / {{ $b->fixed_years }}th, lalu {{ $b->floating_rate_percent }}%)</option>
                    @endforeach
                </select>
                @error('bankId')
                    <div class="text-xs text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">DP (%)</label>
                    <input type="number" step="0.5" wire:model.live="dpPercent" class="w-full border rounded p-3">
                    @error('dpPercent')
                        <div class="text-xs text-red-600 mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tenor (tahun)</label>
                    <select wire:model.live="tenorYears" class="w-full border rounded p-3">
                        @foreach ([5, 10, 15, 20, 25, 30] as $t)
                            <option value="{{ $t }}">{{ $t }} tahun</option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- promo fields --}}
            <div>
                <button type="button" wire:click="$toggle('showPromoFields')" class="text-sm text-[#4a3c33] underline">
                    {{ $showPromoFields ? 'Sembunyikan' : 'Ada promo/subsidi developer?' }}
                </button>
                @if ($showPromoFields)
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-3">
                        <div>
                            <label class="block text-sm text-gray-600 mb-1">Subsidi DP dari Developer (%)</label>
                            <input type="number" step="0.5" wire:model.live="subsidiDpPercent" class="w-full border rounded p-3">
                        </div>
                        <div>
                            <label class="block text-sm text-gray-600 mb-1">Bantuan Finansial Lain (Rp)</label>
                            <input type="number" wire:model.live="otherSupportNominal" class="w-full border rounded p-3">
                        </div>
                    </div>
                @endif
            </div>

            <button type="button" wire:click="calculate"
                class="w-full inline-flex items-center justify-center rounded bg-amber-400 hover:bg-amber-500 text-gray-900 font-semibold px-8 py-3 transition">
                <span wire:loading.remove wire:target="calculate">HITUNG SIMULASI</span>
                <span wire:loading wire:target="calculate">Menghitung...</span>
            </button>

            @if ($result)
                <div class="border-t pt-6 space-y-4">
                    <h3 class="font-semibold text-[#4a3c33]">Hasil Simulasi</h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="p-4 rounded bg-[#4a3c33] text-white">
                            <div class="text-xs text-white/70">Cicilan (periode fixed)</div>
                            <div class="text-xl font-semibold">Rp {{ number_format($result['installment_fixed'], 0, ',', '.') }}</div>
                            <div class="text-xs text-white/60 mt-1">{{ $result['fixed_months'] }} bulan pertama</div>
                        </div>
                        <div class="p-4 rounded bg-[#C8A767] text-[#4a3c33]">
                            <div class="text-xs">Cicilan (setelah floating)</div>
                            <div class="text-xl font-semibold">Rp {{ number_format($result['installment_floating'], 0, ',', '.') }}</div>
                            <div class="text-xs mt-1">{{ $result['floating_months'] }} bulan berikutnya</div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-sm">
                        <div class="p-3 rounded border">
                            <div class="text-gray-500 text-xs">Plafond KPR</div>
                            <div class="font-medium">Rp {{ number_format($result['plafond_kpr'], 0, ',', '.') }}</div>
                        </div>
                        <div class="p-3 rounded border">
                            <div class="text-gray-500 text-xs">Total Bunga</div>
                            <div class="font-medium">Rp {{ number_format($result['total_interest'], 0, ',', '.') }}</div>
                        </div>
                        <div class="p-3 rounded border">
                            <div class="text-gray-500 text-xs">Total Pembayaran</div>
                            <div class="font-medium">Rp {{ number_format($result['total_payment'], 0, ',', '.') }}</div>
                        </div>
                    </div>

                    <div>
                        <h4 class="text-sm font-semibold text-gray-700 mb-2">Estimasi Biaya di Luar Cicilan Bank</h4>
                        <table class="w-full text-sm border rounded overflow-hidden">
                            <tbody>
                                <tr class="border-b">
                                    <td class="p-2 text-gray-600">DP Dibayar</td>
                                    <td class="p-2 text-right">Rp {{ number_format($result['costs']['dp_nominal'], 0, ',', '.') }}</td>
                                </tr>
                                <tr class="border-b bg-gray-50">
                                    <td class="p-2 text-gray-600">Reservation Fee</td>
                                    <td class="p-2 text-right">Rp {{ number_format($result['costs']['reservation_fee'], 0, ',', '.') }}</td>
                                </tr>
                                <tr class="border-b">
                                    <td class="p-2 text-gray-600">Booking Fee</td>
                                    <td class="p-2 text-right">Rp {{ number_format($result['costs']['booking_fee'], 0, ',', '.') }}</td>
                                </tr>
                                <tr class="border-b bg-gray-50">
                                    <td class="p-2 text-gray-600">Biaya KPR (Asuransi + Provisi + Admin)</td>
                                    <td class="p-2 text-right">Rp {{ number_format($result['costs']['biaya_kpr'], 0, ',', '.') }}</td>
                                </tr>
                                <tr class="border-b">
                                    <td class="p-2 text-gray-600">Biaya BPHTB</td>
                                    <td class="p-2 text-right">Rp {{ number_format($result['costs']['biaya_bphtb'], 0, ',', '.') }}</td>
                                </tr>
                                <tr class="border-b bg-gray-50">
                                    <td class="p-2 text-gray-600">Biaya AJB</td>
                                    <td class="p-2 text-right">Rp {{ number_format($result['costs']['biaya_ajb'], 0, ',', '.') }}</td>
                                </tr>
                                <tr class="font-semibold">
                                    <td class="p-2">Total Biaya di Muka</td>
                                    <td class="p-2 text-right">Rp {{ number_format($result['costs']['total_upfront_cost'], 0, ',', '.') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <p class="text-xs text-gray-500">*Simulasi ini bersifat estimasi, angka final tetap mengacu pada persetujuan bank.</p>
                </div>
            @endif
        </div>
    @endif
</div>
