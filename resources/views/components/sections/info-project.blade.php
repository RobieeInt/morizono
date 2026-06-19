@props([
    'titleSmall' => 'The Essence of Morizono ',
    'titlee' => 'Premium cluster residence in Sawangan, Depok, where minimalist elegance meets spacious, open living.',
    'desc' => 'Morizono is inspired by the Japanese philosophy of Teioku Ichinyo (庭屋一如), the harmony between home and nature.
Every space is carefully designed to bring balance and a sense of peace, the ideal home for those who value thoughtful and comfortable living.
',
    'imgLeft' => asset('images/about/about1.webp'),
    'imgRight' => asset('images/about/about2.webp'),
])

<section id="about" class="bg-[#EFECDC]">
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 py-16 sm:py-20">
        <div class="grid grid-cols-1 md:grid-cols-3 items-center gap-8">

            {{-- left image --}}
            <div
                class="about-left opacity-0
                translate-x-0 md:-translate-x-[120px]
                rotate-0 md:rotate-[-6deg]
                transition-all duration-[1300ms] ease-out">
                <div class="rounded-[22px] overflow-hidden shadow-sm md:h-96 lg:h-[500px]">
                    <img src="{{ $imgLeft }}" alt="Morizono Gate" class="w-full h-full object-cover" loading="lazy">
                </div>
            </div>

            {{-- center copy --}}
            <div
                class="about-copy opacity-0 translate-y-[40px]
                transition-all duration-[1300ms] ease-out delay-[200ms] text-center md:px-6">
                <h2 class="text-3xl sm:text-2xl leading-snug font-light text-[#C8A767] font-heading">
                    {{ $titleSmall }}
                </h2>
                <p class="mt-4 text-sm sm:text-base text-gray-700/90 leading-relaxed font-sans">
                    {{ $titlee }}
                </p>
                <p class="mt-4 text-sm sm:text-base text-gray-700/90 leading-relaxed font-sans">
                    {{ $desc }}
                </p>
            </div>

            {{-- right image --}}
            <div
                class="about-right opacity-0
                translate-x-0 md:translate-x-[120px]
                rotate-0 md:rotate-[6deg]
                transition-all duration-[1300ms] ease-out delay-[120ms]">
                <div class="rounded-[22px] overflow-hidden shadow-sm md:h-96 lg:h-[500px]">
                    <img src="{{ $imgRight }}" alt="Morizono Facilities" class="w-full h-full object-cover" loading="lazy">
                </div>
            </div>

        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        function revealAbout() {
            const sec = document.querySelector('#about');
            if (!sec) return;

            const r = sec.getBoundingClientRect().top;
            if (r < window.innerHeight * 0.9) {
                document.querySelector('.about-left')?.classList.remove('opacity-0', 'md:-translate-x-[120px]');
                document.querySelector('.about-right')?.classList.remove('opacity-0', 'md:translate-x-[120px]');
                document.querySelector('.about-copy')?.classList.remove('opacity-0', 'translate-y-[40px]');
                window.removeEventListener('scroll', revealAbout);
            }
        }
        window.addEventListener('scroll', revealAbout);
        revealAbout();
    });
</script>
