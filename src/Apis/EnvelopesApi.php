<?php

namespace jdombroski\DocuSign\Apis;

use jdombroski\DocuSign\Resources\Envelopes\EnvelopeDocumentTabs;

/**
 * @method  EnvelopeDocumentTabs documentTabs()
 */
class EnvelopesApi extends BaseApi 
{
    protected $resources = [
        'documentTabs' => EnvelopeDocumentTabs::class
    ];

    public function __construct()
    {
        //
    }
}