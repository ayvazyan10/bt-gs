<?php

namespace App\Providers;

use Eminiarts\Tabs\Tab;
use Eminiarts\Tabs\Tabs;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        parent::boot();

        \Outl1ne\NovaSettings\NovaSettings::addSettingsFields(function () {
            return [
                Tabs::make('MAIN', [
                    Tab::make('GENERAL', [

                    ]),
                    Tab::make('CONTACT PAGE', [
                        Heading::make('Immenstadt'),
                        Text::make('adresse', 'im_adresse'),
                        Text::make('telefon', 'im_telefon'),
                        Text::make('telefon 2', 'im_fax'),
                        Text::make('email', 'im_email'),
                        Heading::make('Mannheim'),
                        Text::make('adresse', 'man_adresse'),
                        Text::make('telefon', 'man_telefon'),
                        Text::make('fax', 'man_fax'),
                        Text::make('email', 'man_email'),
                        Heading::make('MAP'),
                        Textarea::make('map url', 'map_url'),

                        Heading::make('Schreiben Sie uns eine Nachricht BLOCK'),
                        Text::make('adresse', 'Schreiben_adresse'),
                        Text::make('telefon', 'Schreiben_telefon'),
                        Text::make('email', 'Schreiben_email'),
                    ]),
                    Tab::make('WEBSITE FOOTER', [
                        Heading::make('Social Media'),
                        Text::make('facebook', 'footer-facebook'),
                        Text::make('instagram', 'footer-instagram'),
                        Text::make('youtube', 'footer-youtube'),
                    ]),
                    Tab::make('TEMPLATE', [
                        Textarea::make('<head></head>', 'head_code')->rows(12),
                        Textarea::make('<body></body>', 'body_code')->rows(12),
                    ]),
                ]),
            ];
        });
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes(): void
    {
        Nova::routes()
                ->withAuthenticationRoutes()
                ->withPasswordResetRoutes()
                ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return in_array($user->email, [
                //
            ]);
        });
    }

    /**
     * Get the dashboards that should be listed in the Nova sidebar.
     *
     * @return array
     */
    protected function dashboards(): array
    {
        return [
            new \App\Nova\Dashboards\Main,
        ];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools(): array
    {
        return [
            \Whitecube\NovaPage\NovaPageTool::make(),
            new \Outl1ne\NovaSettings\NovaSettings
        ];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
