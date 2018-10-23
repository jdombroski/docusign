<?php 

namespace jdombroski\DocuSign\Facades;

use Illuminate\Support\Facades\Facade;

class DocuSign extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'docusign';
    }
}