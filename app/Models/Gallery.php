<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Gallery extends Model implements Sortable
{
    use SortableTrait, Sluggable;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'meta_image',
        'images',
        'sort_order',
    ];

    /**
     * @var string[]
     */
    protected $appends = [
        'image',
        'gallery_images',
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public array $sortable = [
        'order_column_name' => 'sort_order',
        'sort_when_creating' => true,
    ];

    /**
     * @return array
     */
    public function getImageAttribute(): mixed
    {
        if (request()->is('nova*')) {
            return '';
        }

        $image = json_decode($this->images);

        return empty($image[0]) ? 'https://via.placeholder.com/540x640.png/005500?text=NO+-+IMAGE' : $image[0];
    }

    /**
     * @return array|string
     */
    public function getGalleryImagesAttribute(): array|string
    {
        if (request()->is('nova*')) {
            return '';
        }

        return json_decode($this->images, true);
    }
}
