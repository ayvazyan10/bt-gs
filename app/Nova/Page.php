<?php

namespace App\Nova;

use Ayvazyan10\Imagic\Imagic;
use Eminiarts\Tabs\Tab;
use Eminiarts\Tabs\Tabs;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Manogi\Tiptap\Tiptap;
use Outl1ne\NovaSortable\Traits\HasSortableRows;

class Page extends Resource
{
    use HasSortableRows;
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Page>
     */
    public static $model = \App\Models\Page::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'title'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param NovaRequest $request
     * @return array
     */
    public function fields(NovaRequest $request): array
    {
        return [
            Tabs::make('GENERAL', [
                Tab::make('GENERAL', [
                    ID::make()->sortable(),
                    Text::make('Title', 'title')->rules('required'),
                    Tiptap::make('Content', 'content')
                        ->nullable()
                        ->buttons([
                            'heading',
                            '|',
                            'italic',
                            'bold',
                            '|',
                            'link',
                            'code',
                            'strike',
                            'underline',
                            'highlight',
                            '|',
                            'bulletList',
                            'orderedList',
                            'br',
                            'codeBlock',
                            'blockquote',
                            '|',
                            'horizontalRule',
                            'hardBreak',
                            '|',
                            'table',
                            '|',
                            'image',
                            '|',
                            'textAlign',
                            '|',
                            'rtl',
                            '|',
                            'history',
                            '|',
                            'editHtml',
                        ])
                        ->headingLevels([2, 3, 4])
                        ->htmlTheme('night')
                        ->hideFromIndex(),
                    Select::make('Position in menu', 'position')->options([
                        'top' => 'Website Header',
                        'bottom' => 'Website Footer',
                    ])->hideFromIndex(),
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

    /**
     * Get the filters available for the resource.
     *
     * @param NovaRequest $request
     * @return array
     */
    public function filters(NovaRequest $request): array
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param NovaRequest $request
     * @return array
     */
    public function lenses(NovaRequest $request): array
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param NovaRequest $request
     * @return array
     */
    public function actions(NovaRequest $request): array
    {
        return [];
    }
}
