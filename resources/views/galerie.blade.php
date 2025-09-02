@extends('layout.core')

@include('layout.utils.meta-tags', [
    'title' => 'GALERIE',
])

@section('content')
    <section id="clients_page" class="py-20">
        <div class="mx-auto max-w-screen-2xl px-4 lg:px-8">
            @if($galleries->isEmpty())
                <div class="py-16 text-center text-slate-500">Keine Einträge.</div>
            @else
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach($galleries as $gallery)
                        <article class="min-h-[300px]">
                            <a href="{{ route('gallery.show', ['id' => $gallery->id]) }}" class="group block h-full">
                                <div class="rounded-xl overflow-hidden ring-1 ring-slate-200 bg-white">
                                    {{-- превью как background, как и было; 200px размер, центр, без повторов --}}
                                    <div class="h-[200px] w-full bg-white bg-center bg-no-repeat bg-[length:200px]
                              grayscale group-hover:grayscale-0 transition duration-300"
                                         style="background-image:url('{{ $gallery->image }}')">
                                    </div>

                                    <div class="p-3 bg-slate-100">
                                        <h5 class="font-semibold leading-tight">
                                            {{ $gallery->title }}
                                        </h5>
                                        <small class="block text-slate-600">{{ $gallery->content }}</small>
                                    </div>
                                </div>
                            </a>
                        </article>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endsection
