<?php

namespace jdombroski\DocuSign\Resources\Envelopes;

use jdombroski\DocuSign\Resources\BaseResource;

class EnvelopeDocumentTabs extends BaseResource
{
    protected $map = [
        'get' => [
            'url' => 'envelopes/{envelopeId}/documents/{documentId}/tabs',
            'method' => 'GET',
            'responses' => [
                '200' => 'EnvelopeDocumentTabs',
                '400' => 'errorDetails'
            ]
        ]
    ];

    /**
     * Get the tabs information for a document on an envelope.
     * @param string $envelopeId The guid of the envelope.
     * @param int $documentId The id of the document.
     */
    public function get($envelopeId, $documentId) 
    {
        return $this->request("get", [
            "envelopeId" => $envelopeId,
            "documentId" => $documentId
        ]);
    }
}