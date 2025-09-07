@extends('layout.core')

@include('layout.utils.meta-tags', [
    'title' => $page->meta_title ?: $page->title,
    'description' => $page->meta_description,
    'keywords' => $page->meta_keywords,
    'image' => $page->meta_image,
])

@section('content')
    <header
        class="relative overflow-hidden bg-[#00A6D3]"
    >
        <div class="absolute inset-0"></div>
        <div class="relative py-10 md:py-15">
            <div class="mx-auto max-w-screen-2xl px-4">
                <div class="text-center">
                    <h1 class="text-white uppercase tracking-wide text-3xl md:text-5xl font-semibold">
                        {{ $page->title }}
                        <small class="block mt-2 text-white/80"> </small>
                    </h1>
                </div>
            </div>
        </div>
    </header>

    <section id="static_page" class="py-20">
        <div class="mx-auto max-w-screen-2xl px-4 lg:px-8">
            @if($page->slug == 'preise')
                <div class="aspect-[16/10] lg:aspect-[16/9] rounded-xl overflow-hidden ring-1 ring-slate-200 bg-white">
                    <iframe
                        src="https://form.typeform.com/to/vfzsFdX2"
                        class="w-full h-full"
                        frameborder="0"
                        loading="lazy"
                        allowfullscreen>
                    </iframe>
                </div>
            @else
                <div class="mt-6 ck-content">
                    {!! $page->content !!}
                </div>
            @endif
        </div>
    </section>
@endsection
