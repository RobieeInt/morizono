{{-- resources/views/livewire/news/index.blade.php --}}
<div>
    <section class="bg-[#EFECDC]">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 py-12 sm:py-16">
            <div class="mb-8">
                <h1 class="text-3xl sm:text-4xl font-light tracking-tight">Latest News & Updates</h1>
                <p class="mt-2 text-gray-600">Cerita terbaru dari Morizono.</p>

                <div class="mt-4 relative">
                    <input type="text" wire:model.live.debounce.400ms="q" placeholder="Search updates..."
                        class="w-full sm:w-80 border rounded px-3 py-2">
                    <div wire:loading wire:target="q"
                        class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 text-sm">
                        Searching...
                    </div>
                </div>

                {{-- <div class="mt-2 text-xs text-gray-500">q = "{{ $q }}"</div> --}}
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                @foreach ($news as $n)
                    <article class="rounded-[12px] overflow-hidden shadow bg-white">
                        <a href="{{ route('news.show', $n) }}" class="block group">
                            <div class="relative">
                                @if ($n->image)
                                    <img src="{{ $n->image }}" alt="{{ $n->title }}"
                                        class="w-full h-56 object-cover">
                                @else
                                    <div class="w-full h-56 bg-gray-200"></div>
                                @endif
                                <div class="absolute top-3 left-3 text-xs px-2 py-1 rounded bg-black/60 text-white">
                                    {{ $n->category }}
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="text-xs text-gray-500">
                                    {{ optional($n->published_at)->format('d M Y') }}
                                </div>
                                <h2 class="mt-1 text-lg font-semibold leading-snug group-hover:underline">
                                    {{ $n->title }}
                                </h2>
                                <p class="mt-2 text-sm text-gray-600 line-clamp-2">{{ $n->excerpt }}</p>
                                <span class="mt-4 inline-flex items-center gap-1 text-sm text-gray-900">
                                    Read more <span>›</span>
                                </span>
                            </div>
                        </a>
                    </article>
                @endforeach
            </div>

            <div class="mt-8">
                {{ $news->links() }}
            </div>
        </div>
    </section>
</div>
