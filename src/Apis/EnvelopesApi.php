<?php

namespace jdombroski\DocuSign\Apis;

use jdombroski\DocuSign\Resources\Envelopes\EnvelopeDocumentTabs;

/**
 * @property EnvelopeDocumentTabs DocumentTabs
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