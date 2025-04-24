<?php

namespace App\Nova\Templates;

use Ayvazyan10\Imagic\Imagic;
use Eminiarts\Tabs\Tab;
use Eminiarts\Tabs\Tabs;
use Exception;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\URL;
use Laravel\Nova\Http\Requests\NovaRequest;
use Whitecube\NovaFlexibleContent\Flexible;
use Whitecube\NovaPage\Pages\Template;

class HomeTemplate extends Template {
    /**
     * The JSON attributes that should be automatically decoded
     *
     * @var array
     */
    protected $jsonAttributes = ['slider'];
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
                    Heading::make('Slider SECTION'),
                    Flexible::make('SLIDER', 'slider')->addLayout('SLIDE', 'item', [
                        Imagic::make('Image', 'image')->creationRules('required')->resize(1920),
                        Text::make('Title', 'title')->rules('required'),
                        Textarea::make('Description', 'description')->rules('required'),
                        Text::make('Button Text', 'button')->creationRules('required'),
                        URL::make('Button Link', 'link'),
                    ])->button('ADD SLIDE'),
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
