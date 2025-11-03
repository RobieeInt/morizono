{{-- resources/views/livewire/news/show.blade.php --}}
<div>
    {{-- Hero --}}
    <section class="relative min-h-[44vh] w-full overflow-hidden">
        <div class="absolute inset-0 bg-center bg-cover" style="background-image:url('{{ $news->image }}')"></div>
        <div class="absolute inset-0 bg-black/40"></div>

        <div class="relative z-10 h-full max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 flex items-end">
            <div class="pb-10 text-white">
                <div class="text-xs opacity-90">
                    {{ $news->category }} · {{ optional($news->published_at)->format('d M Y') }}
                </div>
                <h1 class="mt-2 text-3xl sm:text-5xl font-light tracking-tight">
                    {{ $news->title }}
                </h1>
            </div>
        </div>
    </section>

    {{-- Body --}}
    <section class="bg-[#EFECDC]">
        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8 py-10 sm:py-14">
            <a href="{{ route('news.index') }}" class="text-sm underline text-gray-700">← Back to Updates</a>

            @if ($news->excerpt)
                <p class="mt-4 text-lg text-gray-800">{{ $news->excerpt }}</p>
            @endif

            <article class="mt-6 prose prose-neutral max-w-none">
                {!! $news->content !!}
            </article>

            @if ($related->isNotEmpty())
                <div class="mt-12">
                    <h3 class="text-xl font-semibold">Related</h3>
                    <div class="mt-4 grid sm:grid-cols-2 gap-6">
                        @foreach ($related as $r)
                            <a href="{{ route('news.show', $r) }}" class="rounded-lg overflow-hidden shadow bg-white">
                                @if ($r->image)
                                    <img src="{{ $r->image }}" class="w-full h-40 object-cover"
                                        alt="{{ $r->title }}">
                                @endif
                                <div class="p-4">
                                    <div class="text-xs text-gray-500">
                                        {{ optional($r->published_at)->format('d M Y') }} · {{ $r->category }}
                                    </div>
                                    <div class="font-semibold mt-1">{{ $r->title }}</div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>
</div>
