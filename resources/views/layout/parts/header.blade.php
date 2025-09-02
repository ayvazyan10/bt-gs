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
         @toggle-mobile.window="open=!open"
         x-show="open"
         class="md:hidden border-b border-gray-200 bg-white">
        <div class="mx-auto max-w-screen-2xl px-4 py-3 flex flex-col gap-3">
            @foreach($page_menu_header as $item)
                @if($loop->last)
                    <a href="{{ route('galerie') }}" class="uppercase font-bold">Galerie</a>
                    <a href="{{ route('referenzen') }}" class="uppercase font-bold">Referenzen</a>
                @endif
                <a href="{{ route('page', ['slug' => $item->slug]) }}" class="uppercase font-bold">{{ $item->title }}</a>
                @if($loop->last)
                    <a href="{{ route('feedback') }}" class="uppercase font-bold">Kontakt</a>
                @endif
            @endforeach
        </div>
    </div>
</header>
