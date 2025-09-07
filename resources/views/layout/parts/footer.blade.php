<footer>
    <div class="bg-black text-white">
        <div class="mx-auto max-w-screen-2xl px-4 lg:px-8 py-12 md:py-16">
            <div class="flex items-start justify-between gap-8">
                <a href="/" class="flex items-start gap-4">
                    <img src="{{ Vite::asset('resources/images/B&T-Logo-weiss-2025.png') }}" alt="B&amp;T" class="w-[157px] h-auto">
                </a>

                <nav class="hidden md:flex items-center gap-6">
                    <a href="{{ nova_get_setting('footer-facebook') }}" aria-label="Facebook" class="hover:opacity-80 transition">
                        <svg viewBox="0 0 56.693 56.693" class="w-7 h-7" fill="currentColor"><path d="M40.43,21.739h-7.645v-5.014c0-1.883,1.248-2.322,2.127-2.322c0.877,0,5.395,0,5.395,0V6.125l-7.43-0.029  c-8.248,0-10.125,6.174-10.125,10.125v5.518h-4.77v8.53h4.77c0,10.947,0,24.137,0,24.137h10.033c0,0,0-13.32,0-24.137h6.77  L40.43,21.739z"/></svg>
                    </a>
                    <a href="{{ nova_get_setting('footer-youtube') }}" aria-label="LinkedIn" class="hover:opacity-80 transition">
                        <svg class="w-7 h-7" viewBox="0 0 512 512" width="100%" fill="currentColor"><path d="M501.303,132.765c-5.887,-22.03 -23.235,-39.377 -45.265,-45.265c-39.932,-10.7 -200.038,-10.7 -200.038,-10.7c0,0 -160.107,0 -200.039,10.7c-22.026,5.888 -39.377,23.235 -45.264,45.265c-10.697,39.928 -10.697,123.238 -10.697,123.238c0,0 0,83.308 10.697,123.232c5.887,22.03 23.238,39.382 45.264,45.269c39.932,10.696 200.039,10.696 200.039,10.696c0,0 160.106,0 200.038,-10.696c22.03,-5.887 39.378,-23.239 45.265,-45.269c10.696,-39.924 10.696,-123.232 10.696,-123.232c0,0 0,-83.31 -10.696,-123.238Zm-296.506,200.039l0,-153.603l133.019,76.802l-133.019,76.801Z" style="fill-rule:nonzero;"/></svg>
                    </a>
                    <a href="{{ nova_get_setting('footer-instagram') }}" aria-label="Instagram" class="hover:opacity-80 transition">
                        <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none">
                            <rect x="3" y="3" width="18" height="18" rx="5" stroke="currentColor" stroke-width="2"/>
                            <circle cx="12" cy="12" r="4.5" stroke="currentColor" stroke-width="2"/>
                            <circle cx="17.5" cy="6.5" r="1.2" fill="currentColor"/>
                        </svg>
                    </a>
                </nav>
            </div>

            <ul class="mt-10 space-y-3 text-xl font-semibold uppercase tracking-wide">
                @foreach($page_menu_footer as $item)
                    <li> <a href="{{ route('page', ['slug' => $item->slug]) }}" class="hover:text-cyan-400">{{ $item->title }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="bg-[#777777]">
        <div class="mx-auto max-w-screen-2xl px-4 lg:px-8 py-6 text-center text-white">
            <div class="space-x-3 underline underline-offset-4 decoration-white/60 text-sm">
                <a href="/impressum" class="hover:opacity-90">Impressum</a>
                <span>|</span>
                <a href="/datenschutz" class="hover:opacity-90">Datenschutzerklärung</a>
                <span>|</span>
                <a href="https://bt-gs.de/storage/AGB_BT_Gebaeudeservice.pdf"
                   target="_blank"
                   class="hover:opacity-90">Allgemeine Geschäftsbedingungen</a>
            </div>
            <div class="mt-2 text-sm">Copyright © 2016-{{ date('Y') }} B&amp;T. Alle Rechte vorbehalten.</div>
        </div>
    </div>
</footer>
