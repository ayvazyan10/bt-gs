<header class="sticky top-0 z-50 bg-white">
    <div class="mx-auto max-w-screen-2xl px-4 py-5 lg:px-8">
        <div class="flex items-center justify-between h-24">
            <a href="/" class="flex items-center gap-4 shrink-0">
                <img src="{{ Vite::asset('resources/images/B&T-Logo-schwarz-2025.png') }}" alt="B&T Gebäudeservice" class="h-[83px] w-auto">
            </a>

            <nav class="hidden md:flex items-center gap-8">
                @php
                    $base = 'font-semibold uppercase tracking-wider text-[18px] hover:text-cyan-600';
                    $activeClass = 'text-cyan-600';
                @endphp

                <nav class="flex items-center gap-8">
                    @foreach ($page_menu_header as $item)
                        <a href="{{ route('page', ['slug' => $item->slug]) }}"
                            @class([
                              $base,
                              $activeClass => request()->routeIs('page') && request()->route('slug') === $item->slug,
                            ])>
                            {{ $item->title }}
                        </a>
                    @endforeach

                        <a href="{{ route('golffreunde') }}"
                            @class([$base, $activeClass => request()->routeIs('golffreunde')])>
                            Golf Freunde
                        </a>

                    <a href="{{ route('galerie') }}"
                        @class([$base, $activeClass => request()->routeIs('galerie')])>
                        Galerie
                    </a>

                    <a href="{{ route('referenzen') }}"
                        @class([$base, $activeClass => request()->routeIs('referenzen')])>
                        Referenzen
                    </a>

                    <a href="{{ route('feedback') }}"
                        @class([$base, $activeClass => request()->routeIs('feedback')])>
                        Kontakt
                    </a>
                </nav>

            </nav>

            <button class="md:hidden inline-flex items-center justify-center p-2"
                    x-data @click="$dispatch('toggle-mobile')"
                    aria-label="Open menu">
                <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-width="1.5" d="M4 7h16M4 12h16M4 17h16"/></svg>
            </button>
        </div>
    </div>

    <div class="h-2 bg-cyan-600"></div>

    <div x-data="{ open:false }"
         @toggle-mobile.window="open = !open"
         @keydown.escape.window="open = false"
    >
        <div
            x-show="open"
            x-cloak
            x-transition.opacity
            @click="open = false"
            class="fixed inset-0 bg-black/80 z-40"
            aria-hidden="true"
        ></div>

        <div
            x-show="open"
            x-cloak
            x-transition:enter="transition ease-out duration-250"
            x-transition:enter-start="opacity-0 -translate-y-2"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-2"
            class="md:hidden fixed top-0 left-0 right-0 border-b border-gray-200 bg-white z-50"
        >
            <div class="mx-auto max-w-screen-2xl px-4 py-4 flex flex-col gap-3">
                <div class="flex items-center justify-between">
                    <a href="/" class="flex items-center gap-4 shrink-0">
                        <img src="{{ Vite::asset('resources/images/B&T-Logo-schwarz-2025.png') }}" alt="B&T Gebäudeservice" class="h-[56px] w-auto">
                    </a>
                    <button @click="open = false" aria-label="Close menu" class="p-2">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none">
                            <path stroke="currentColor" stroke-width="1.5" d="M6 6l12 12M6 18L18 6"/>
                        </svg>
                    </button>
                </div>

                @foreach ($page_menu_header as $item)
                    <a href="{{ route('page', ['slug' => $item->slug]) }}"
                        @class([
                           $base,
                           $activeClass => request()->routeIs('page') && request()->route('slug') === $item->slug,
                        ])>
                        {{ $item->title }}
                    </a>
                @endforeach

                <a href="{{ route('golffreunde') }}" @class([$base, $activeClass => request()->routeIs('golffreunde')])>Golf Freunde</a>
                <a href="{{ route('galerie') }}" @class([$base, $activeClass => request()->routeIs('galerie')])>Galerie</a>
                <a href="{{ route('referenzen') }}" @class([$base, $activeClass => request()->routeIs('referenzen')])>Referenzen</a>
                <a href="{{ route('feedback') }}" @class([$base, $activeClass => request()->routeIs('feedback')])>Kontakt</a>
            </div>
        </div>
    </div>
</header>
