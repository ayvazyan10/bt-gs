<?php

namespace App\Nova\Utils;

use Illuminate\Database\Eloquent\Model;

class StaticPage extends Model
{
    protected $table = 'static_pages';

    protected $fillable = [
        'type',
        'name',
        'title',
        'attributes',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'meta_image'
    ];
}
