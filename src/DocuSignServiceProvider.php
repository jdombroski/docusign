<?php

namespace jdombroski\DocuSign;

use Illuminate\Support\ServiceProvider;

class DocuSignServiceProvider extends ServiceProvider
{
    protected $defer = true;

    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/config.php' => config_path('docusign.php'),
        ]);
    }

    public function register()
    {
        $this->app->singleton(DocuSign::class, function ($app) {
            return new DocuSign();
        });
        $this->app->alias(DocuSign::class, 'docusign');

        $this->app->singleton(ApiRequestor::class, function ($app) {
            return new ApiRequestor();
        });
        $this->app->alias(ApiRequestor::class, 'docusign-api-requestor');

    }

    public function provides()
    {
        return ['docusign'];
    }
}