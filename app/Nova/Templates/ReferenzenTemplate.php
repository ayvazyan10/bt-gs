<?php

namespace App\Nova\Templates;

use Ayvazyan10\Imagic\Imagic;
use Eminiarts\Tabs\Tab;
use Eminiarts\Tabs\Tabs;
use Exception;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Whitecube\NovaFlexibleContent\Flexible;
use Whitecube\NovaPage\Pages\Template;

class ReferenzenTemplate extends Template {

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
                    Imagic::make('Cover Image', 'image')->creationRules('required')->resize(1920),
                    Heading::make('Partners list'),
                    Flexible::make('Partners')
                        ->addLayout('List', 'list', [
                            Text::make('Name', 'name'),
                            Imagic::make('Logo', 'logo')->creationRules('required')->resize(200),
                            Text::make('Link To Website', 'link'),
                        ])->button('ADD PARTNER'),
                ]),
                Tab::make('SEO FIELDS', [
                    Text::make('Meta Title', 'meta_title')->nullable()->hideFromIndex(),
                    Text::make('Meta Keywords', 'meta_keywords')->nullable()->hideFromIndex(),
                    Text::make('Meta Description', 'meta_description')->nullable()->hideFromIndex(),
                    Imagic::make('Meta Image', 'meta_image')->nullable()->resize(600, 400)->hideFromIndex(),
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
