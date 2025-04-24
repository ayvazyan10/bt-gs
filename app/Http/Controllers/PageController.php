<?php

namespace App\Http\Controllers;

use Whitecube\NovaPage\Pages\Manager;
use Whitecube\NovaPage\Pages\Template;

class PageController extends Controller
{
    public function homePage(Template $template, Manager $novapage)
    {
        $novapage->load('home', 'route', false);

        return view('index', [
            'page' => $template,
        ]);
    }

    public function feedBack(Template $template, Manager $novapage)
    {
        $novapage->load('feedback', 'route', false);

        return view('feedback', [
            'page' => $template,
        ]);
    }

    public function referenzen(Template $template, Manager $novapage)
    {
        $novapage->load('referenzen', 'route', false);

        return view('referenzen', [
            'page' => $template,
        ]);
    }

    public function galerie(Template $template, Manager $novapage)
    {
        $galleries = \App\Models\Gallery::orderBy('sort_order')->get();

        return view('galerie', [
            'galleries' => $galleries,
        ]);
    }

    public function galleryShow($id)
    {
        $gallery = \App\Models\Gallery::findOrFail($id);

        return view('gallery.single', [
            'gallery' => $gallery,
        ]);
    }

    public function show($slug)
    {
        $page = \App\Models\Page::where('slug', $slug)->firstOrFail();

        return view('page', compact('page'));
    }
}
