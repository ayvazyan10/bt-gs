<?php

namespace App\Providers;

use App\Models\Page;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        View::share('page_menu_header', Page::where('position', 'top')->orderBy('sort_order')->get());
        View::share('page_menu_footer', Page::where('position', 'bottom')->orderBy('sort_order')->get());
    }
}
