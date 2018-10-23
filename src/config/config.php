<?php

return [

    /*
     |--------------------------------------------------------------------------
     | Docusign Host
     |--------------------------------------------------------------------------
     |
     | The host url.
     |
     */

    'host' => env('DOCUSIGN_HOST', 'https://demo.docusign.net/restapi/'),

    /*
     |--------------------------------------------------------------------------
     | Docusign Default Credentials
     |--------------------------------------------------------------------------
     |
     | These are the credentials that will be used if none are specified
     |
     */

    'username' => env('DOCUSIGN_USERNAME'),

    'password' => env('DOCUSIGN_PASSWORD'),

    'integrator_key' => env('DOCUSIGN_INTEGRATOR_KEY')


];
