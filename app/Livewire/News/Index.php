<?php

namespace App\Livewire\News;

use App\Models\News;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;

#[Layout('layouts.site')]
class Index extends Component
{
    use WithPagination;

    public string $q = '';
    public int $perPage = 9;

    // reset halaman setiap ubah keyword
    public function updatedQ(): void
    {
        $this->resetPage();
    }

    public function render()
    {
        $news = News::query()
            ->when($this->q !== '', function ($q) {
                $q->where(function ($s) {
                    $s->where('title', 'like', '%'.$this->q.'%')
                      ->orWhere('excerpt', 'like', '%'.$this->q.'%')
                      ->orWhere('category', 'like', '%'.$this->q.'%')
                      ->orWhere('content', 'like', '%'.$this->q.'%');
                });
            })
            ->orderByDesc('published_at')
            ->orderByDesc('id')
            ->paginate($this->perPage);

        return view('livewire.news.index', [
            'news' => $news,
        ])->title('Updates | Morizono');
    }
}
