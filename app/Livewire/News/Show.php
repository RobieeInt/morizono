<?php
// app/Livewire/News/Show.php
namespace App\Livewire\News;

use App\Models\News;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.site')] // <-- Pindahin layout ke sini
class Show extends Component
{
    public News $news;

    public function mount(News $news): void
    {
        $this->news = $news;
    }

    public function render()
    {
        $related = News::whereKeyNot($this->news->id)
            ->latest('published_at')->take(3)->get();

        // title() tetap jalan di v3
        return view('livewire.news.show', [
            'news'    => $this->news,
            'related' => $related,
        ])->title($this->news->title.' | Morizono');
    }
}
