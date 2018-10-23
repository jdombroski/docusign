<?php 

namespace jdombroski\DocuSign\Facades;

use Illuminate\Support\Facades\Facade;

class ApiRequestor extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'docusign-api-requestor';
    }
}