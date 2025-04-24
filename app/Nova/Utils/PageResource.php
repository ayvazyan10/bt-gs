<?php

namespace App\Nova\Utils;

use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Panel;
use Whitecube\NovaPage\Pages\StaticResource;

class PageResource extends StaticResource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'nova-page';

    /**
     * Indicates whether Nova should check for modifications between viewing and updating a resource.
     *
     * @var bool
     */
    public static $trafficCop = false;

    /**
     * Get the URI key for the resource.
     *
     * @return string
     */
    public static function uriKey()
    {
        return 'nova-page';
    }

    /**
     * Get the displayable label of the resource.
     *
     * @return string
     */
    public static function label()
    {
        return config('novapage.labels.pages');
    }

    /**
     * Get the displayable singular label of the resource.
     *
     * @return string
     */
    public static function singularLabel()
    {
        return config('novapage.labels.page');
    }

    /**
     * Get the base fields displayed at the top of the resource's form.
     *
     * @return array
     */
    protected function getFormIntroductionFields()
    {
        return [
            (new Panel(__('Base page attributes'), $this->getBaseAttributeFields()))->withToolbar(),
        ];
    }

    /**
     * Get the base common attributes
     *
     * @return array
     */
    protected function getBaseAttributeFields(): array
    {
        return [
            Text::make(__('Page title'), 'title')
                ->rules(['required', 'max:255']),

            DateTime::make(__('Page creation date'), 'nova_page_created_at')
                // ->format('DD-MM-YYYY HH:mm:ss')
                ->rules(['required', 'string', 'max:255']),
        ];
    }

    /**
     * Get the base attributes Nova Panel
     *
     * @return array
     */
    protected function getIndexTableFields(): array
    {
        return [
            Text::make(__('Name'), 'title', function () {

                return $this->getAttribute('title');
                //return $this->getName();
            })->sortable(),

            DateTime::make(__('Last updated on'), 'last_updated_on', function () {
                $updated_at = $this->getDate('updated_at');
                return $updated_at ? $updated_at : null;
            })->sortable(),
        ];
    }

}
