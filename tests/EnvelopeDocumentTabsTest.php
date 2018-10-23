<?php

namespace jdombroski\DocuSign\Tests;

use DocuSign;

final class EnvelopeDocumentTabsTest extends TestCase
{
    public function testGetEndpoint()
    {
        $tabs = DocuSign::envelopes()->documentTabs()->get('cb93076b-0631-4675-bca7-5e7a0a967ab5', 6);
        
        $this->assertArrayHasKey('signHereTabs', $tabs);
    }
}