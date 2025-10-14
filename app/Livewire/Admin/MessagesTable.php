<?php

namespace App\Livewire\Admin;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;

class MessagesTable extends Component
{
    use WithPagination;

    #[Url(history: true, keep: true)]
    public string $search = '';

    #[Url(history: true, keep: true)]
    public int $perPage = 20;

    public bool $compact = false;

    // Livewire v3: hook saat properti 'search' di-update
    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function markRead(int $id): void
    {
        Contact::whereKey($id)->whereNull('read_at')->update(['read_at' => now()]);
        $this->dispatch('toast', message: 'Marked as read');
    }

    public function delete(int $id): void
    {
        Contact::whereKey($id)->delete();
        $this->dispatch('toast', message: 'Deleted');
        $this->resetPage();
    }

    public function contactViaWhatsApp(int $id): void
    {
        $c = Contact::findOrFail($id);

        // Normalisasi nomor
        $raw = preg_replace('/\D+/', '', (string) $c->phone);
        if ($raw && str_starts_with($raw, '0')) {
            $raw = '62' . substr($raw, 1);
        }
        if (!$raw) {
            $this->dispatch('toast', message: 'Nomor WhatsApp tidak valid');
            return;
        }

        // Update read_at
        if (is_null($c->read_at)) {
            $c->forceFill(['read_at' => now()])->save();
        }

        $msg = urlencode('Halo saya admin Morizono, saya ingin menindaklanjuti pesan Anda di website Morizono.');
        $url = "https://wa.me/{$raw}?text={$msg}";

        $this->dispatch('open-url', url: $url);
    }

    public function render()
    {
        $s = trim($this->search);

        $contacts = Contact::query()
            ->when($s !== '', function ($q) use ($s) {
                $like = "%{$s}%";
                $q->where(function ($q) use ($like) {
                    $q->where('name', 'like', $like)
                      ->orWhere('email', 'like', $like)
                      ->orWhere('phone', 'like', $like)
                      ->orWhere('message', 'like', $like);
                });
            })
            ->latest('created_at')
            ->paginate($this->perPage);

        return view('livewire.admin.messages-table', compact('contacts'));
    }
}
