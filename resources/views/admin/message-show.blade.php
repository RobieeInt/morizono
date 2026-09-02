<x-layouts.dashboard :title="'Message from ' . $contact->name" :page-title="'Message detail'">
    <div class="bg-white border rounded p-6 space-y-4 max-w-3xl">
        <div class="flex items-center justify-between">
            <div class="text-sm text-gray-600">Received {{ $contact->created_at->format('Y-m-d H:i') }}</div>
            @if ($contact->source === 'kpr_simulator')
                <span class="inline-block px-2 py-0.5 rounded text-xs font-medium bg-[#C8A767]/20 text-[#4a3c33]">KPR Simulator</span>
            @else
                <span class="inline-block px-2 py-0.5 rounded text-xs font-medium bg-gray-100 text-gray-600">Contact Form</span>
            @endif
        </div>
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

        @if ($contact->source === 'kpr_simulator' && $contact->kpr_meta)
            @php($meta = $contact->kpr_meta)
            <div class="border rounded p-4 bg-gray-50 space-y-3">
                <div class="text-sm font-semibold text-[#4a3c33]">Simulasi KPR</div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                    <div>
                        <div class="text-xs text-gray-500">Harga Rumah</div>
                        <div class="font-medium">Rp {{ number_format($meta['harga'] ?? 0, 0, ',', '.') }}</div>
                    </div>
                    <div>
                        <div class="text-xs text-gray-500">Bank</div>
                        <div class="font-medium">{{ $meta['bank_name'] ?? '-' }}</div>
                    </div>
                    <div>
                        <div class="text-xs text-gray-500">DP</div>
                        <div class="font-medium">{{ $meta['dp_percent'] ?? 0 }}%</div>
                    </div>
                    <div>
                        <div class="text-xs text-gray-500">Tenor</div>
                        <div class="font-medium">{{ $meta['tenor_years'] ?? '-' }} tahun</div>
                    </div>
                </div>

                @if (!empty($meta['result']))
                    @php($result = $meta['result'])
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                        <div class="p-3 rounded bg-[#4a3c33] text-white">
                            <div class="text-xs text-white/70">Cicilan (fixed)</div>
                            <div class="font-semibold">Rp {{ number_format($result['installment_fixed'], 0, ',', '.') }}</div>
                        </div>
                        <div class="p-3 rounded bg-[#C8A767] text-[#4a3c33]">
                            <div class="text-xs">Cicilan (floating)</div>
                            <div class="font-semibold">Rp {{ number_format($result['installment_floating'], 0, ',', '.') }}</div>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 text-sm">
                        <div>
                            <div class="text-xs text-gray-500">Plafond KPR</div>
                            <div class="font-medium">Rp {{ number_format($result['plafond_kpr'], 0, ',', '.') }}</div>
                        </div>
                        <div>
                            <div class="text-xs text-gray-500">Total Bunga</div>
                            <div class="font-medium">Rp {{ number_format($result['total_interest'], 0, ',', '.') }}</div>
                        </div>
                        <div>
                            <div class="text-xs text-gray-500">Total Pembayaran</div>
                            <div class="font-medium">Rp {{ number_format($result['total_payment'], 0, ',', '.') }}</div>
                        </div>
                    </div>
                    <div>
                        <div class="text-xs text-gray-500 mb-1">Total Biaya di Muka</div>
                        <div class="font-medium">Rp {{ number_format($result['costs']['total_upfront_cost'], 0, ',', '.') }}</div>
                    </div>
                @endif
            </div>
        @else
            <div>
                <div class="text-xs text-gray-500 mb-1">Message</div>
                <div class="whitespace-pre-line">{{ $contact->message }}</div>
            </div>
        @endif

        <a href="{{ route('admin.messages') }}" class="px-3 py-2 border rounded bg-white hover:bg-gray-50">Back</a>
    </div>
</x-layouts.dashboard>
