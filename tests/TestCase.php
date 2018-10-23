<?php

namespace jdombroski\DocuSign\Tests;

use jdombroski\DocuSign\DocuSignServiceProvider;
use jdombroski\DocuSign\Facades\DocuSign as DocuSignFacade;
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
            'DocuSign' => DocuSignFacade::class,
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
        $app['config']->set('docusign.host', 'https://demo.docusign.net/restapi/');
        $app['config']->set('docusign.username', 'jdombroski@trimarkproperties.com');
        $app['config']->set('docusign.password', 'Preggy92');
        $app['config']->set('docusign.integrator_key', '7b5cd4a5-e36c-4aef-b25a-d0093b75a03d');
    }
    
    protected function setUp()
    {
        parent::setUp();
    }
}