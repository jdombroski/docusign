<?php

namespace jdombroski\DocuSign\Tests;

use jdombroski\DocuSign\DocuSignServiceProvider;
use jdombroski\DocuSign\Facades\ApiRequestor as ApiRequestorFacade;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [DocuSignServiceProvider::class];
    }

    /**
     * Load package alias
     * @param  \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageAliases($app)
    {
        return [
            'ApiRequestor' => ApiRequestorFacade::class,
        ];
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('docusign.host', 'x');
        $app['config']->set('docusign.username', 'x');
        $app['config']->set('docusign.password', 'x');
        $app['config']->set('docusign.integrator_key', 'x');
    }
    
    protected function setUp()
    {
        parent::setUp();
    }
}