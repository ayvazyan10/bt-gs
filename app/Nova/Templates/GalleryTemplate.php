<?php

namespace App\Nova\Templates;

use Ayvazyan10\Imagic\Imagic;
use Eminiarts\Tabs\Tab;
use Eminiarts\Tabs\Tabs;
use Exception;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Whitecube\NovaPage\Pages\Template;

class GalleryTemplate extends Template {

    /**
     * Get the fields displayed by the resource.
     *
     * @param NovaRequest $request
     * @return array
     * @throws Exception
     */
    public function fields(NovaRequest $request): array
    {
        return [
            Tabs::make('GENERAL', [
                Tab::make('GENERAL', [
                    Imagic::make('Main Image', 'image')->creationRules('required')->resize(600),
                    Heading::make('Images'),
                    Imagic::make('Images', 'images')
                        ->creationRules('required')
                        ->multiple()
                        ->resize(1250),
                ]),
                Tab::make('SEO FIELDS', [
                    Text::make('Title', 'meta_title')->nullable()->hideFromIndex(),
                    Text::make('Keywords', 'meta_keywords')->nullable()->hideFromIndex(),
                    Text::make('Description', 'meta_description')->nullable()->hideFromIndex(),
                    Imagic::make('Image', 'meta_image')->nullable()->resize(600, 400)->hideFromIndex(),
                ]),
            ]),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param NovaRequest $request
     * @return array
     */
    public function cards(NovaRequest $request): array
    {
        return [];
    }
}
