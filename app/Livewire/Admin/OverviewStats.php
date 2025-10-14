<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Contact;
use Illuminate\Support\Carbon;

class OverviewStats extends Component
{
    public $total, $today, $week, $unread;

    public function mount()
    {
        $this->total = Contact::count();
        $this->today = Contact::whereDate('created_at', today())->count();
        $this->week  = Contact::where('created_at','>=', now()->subDays(7))->count();
        $this->unread = Contact::whereNull('read_at')->count();
    }

    public function render()
    {
        return view('livewire.admin.overview-stats');
    }
}
