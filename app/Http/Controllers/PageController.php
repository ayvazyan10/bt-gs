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

        $page->content = $this->embed_oembed_to_iframe($page->content);

        return view('page', compact('page'));
    }

    public function golffreunde(Template $template, Manager $novapage)
    {
        $novapage->load('golffreunde', 'route', false);

        return view('golf', [
            'page' => $template,
        ]);
    }


    public function embed_oembed_to_iframe(string $html): string {
        return preg_replace_callback(
            '/<oembed\s+url="([^"]+)"\s*><\/oembed>/i',
            function($m) {
                $url = $m[1];

                if (preg_match('%(?:youtu\.be/|youtube(?:-nocookie)?\.com/(?:watch\?v=|embed/|v/|shorts/))([A-Za-z0-9_-]{4,})%i', $url, $mm)) {
                    $id = $mm[1];
                    return '<div class="media"><iframe src="https://www.youtube.com/embed/' . htmlspecialchars($id, ENT_QUOTES, 'UTF-8')
                        . '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="width:100%;height:400px;"></iframe></div>';
                }

                if (preg_match('%vimeo\.com/(?:video/)?(\d+)%i', $url, $mm)) {
                    $id = $mm[1];
                    return '<div class="media"><iframe src="https://player.vimeo.com/video/' . htmlspecialchars($id, ENT_QUOTES, 'UTF-8')
                        . '" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen style="width:100%;height:400px;"></iframe></div>';
                }

                return $m[0];
            },
            $html
        );
    }
}
