<?php

namespace App\Nova\Templates;

use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;
use Mostafaznv\NovaCkEditor\CkEditor;
use Whitecube\NovaFlexibleContent\Flexible;
use Whitecube\NovaFlexibleContent\Layouts\Layout;
use Whitecube\NovaPage\Pages\Template;

class GolfTemplate extends Template
{
    public function fields(NovaRequest $request): array
    {
        return [

            Panel::make('Meta', [
                Text::make('Meta Title', 'meta_title')->nullable(),
                Text::make('Meta Description', 'meta_description')->nullable(),
                Text::make('Meta Keywords', 'meta_keywords')->nullable(),
                Image::make('Meta Image', 'meta_image')
                    ->disk('public')->path('pages/golf/meta')->nullable(),
            ]),

            Panel::make('Hero Banner', [
                Image::make('Hero Background', 'hero_bg')
                    ->disk('public')->path('pages/golf/hero')->nullable(),
                Image::make('Hero Avatar', 'hero_avatar')
                    ->disk('public')->path('pages/golf/hero')->nullable(),
                Text::make('Hero Headline', 'hero_headline'),
            ]),

            Panel::make('Offer Section', [
                Text::make('Offer Heading Top', 'offer_heading_top')
                    ->help('ALS MITGLIED IM GOLFPARK LENZFRIED'),
                Text::make('Offer Heading Accent', 'offer_heading_accent')
                    ->help('BIETE ICH MEINEN CLUBKOLLEGEN EIN EXKLUSIVES EXTRA!'),
                CkEditor::make('Offer Content', 'offer_richtext')->required()
                    ->height(400)
                    ->fullWidth()
                    ->hideFromIndex()
                    ->stacked(),

                Text::make('Form Title', 'form_title')
                    ->help('Напр.: 1x Gratis Fensterreinigung'),
                Text::make('Contact Phone', 'contact_phone'),
                Text::make('Contact Email', 'contact_email'),
            ]),

            Panel::make('Two Images + Bullets (Flexible)', [
                Flexible::make('Features', 'features')
                    ->addLayout('Feature', 'feature', [
                            Image::make('Image', 'image')->disk('public')->path('pages/golf/features')->nullable(),
                            Flexible::make('Bullets', 'bullets')
                                ->addLayout('Bullet', 'bullet', [
                                    Text::make('Text', 'text')->rules('required'),
                                ])
                                ->button('Bullet hinzufügen')
                        ])
                    ->button('Feature hinzufügen')
            ]),

            Panel::make('Slogan Card + Benefits (Flexible)', [
                Image::make('Card Logo', 'card_logo')->disk('public')->path('pages/golf/card')->nullable(),
                Text::make('Slogan Line 1', 'slogan_line1')->help('IMMER'),
                Text::make('Slogan Line 2', 'slogan_line2')->help('SAUBER'),
                Text::make('Slogan Line 3', 'slogan_line3')->help('BLEIBEN'),
                Text::make('Slogan Color (hex)', 'slogan_color')->help('z. B. #00A6D3'),

                Flexible::make('Benefits', 'benefits')
                    ->addLayout(
                        'Benefit', 'benefit', [
                            Text::make('Title', 'title'),
                            CkEditor::make('Text', 'text')->required()
                                ->height(400)
                                ->fullWidth()
                                ->hideFromIndex()
                                ->alwaysShow()
                                ->stacked(),
                        ])
                    ->button('Benefit hinzufügen')
            ]),

            Panel::make('Photo Duo + Message', [
                Image::make('Left Photo', 'duo_left')->disk('public')->path('pages/golf/duo')->nullable(),
                Image::make('Right Photo', 'duo_right')->disk('public')->path('pages/golf/duo')->nullable(),
                Text::make('Season Headline', 'season_headline'),
                Text::make('Season Accent', 'season_accent'),
                Text::make('Signature Name', 'signature_name'),
            ]),
        ];
    }

    public function cards(NovaRequest $request): array
    {
        return [];
    }
}
