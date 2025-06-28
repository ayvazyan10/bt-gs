<?php

use App\Http\Controllers\PageController;
use App\Nova\Templates\FeedBackTemplate;
use App\Nova\Templates\GalleryTemplate;
use App\Nova\Templates\HomeTemplate;
use App\Nova\Templates\ReferenzenTemplate;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PageController::class, 'homePage'])->template(HomeTemplate::class)->name('home');
Route::get('feedback', [PageController::class, 'feedBack'])->template(FeedBackTemplate::class)->name('feedback');
Route::get('referenzen', [PageController::class, 'referenzen'])->template(ReferenzenTemplate::class)->name('referenzen');
Route::get('galerie', [PageController::class, 'galerie'])->template(GalleryTemplate::class)->name('galerie');
Route::get('node/{slug}', [PageController::class, 'show'])->name('page');
Route::get('galerie/{id}/show', [PageController::class, 'galleryShow'])->name('gallery.show');


Route::get('calc', function () {
    return view('calculator');
})->name('calculator');
