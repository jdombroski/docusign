<?php

namespace jdombroski\DocuSign\Tests;

use jdombroski\DocuSign\DocuSign;

final class EnvelopeDocumentTabsTest extends TestCase
{
    public function testGetEndpoint()
    {
        $client = new DocuSign();
        $tabs = $client->envelopes()->documentTabs()->get('8104f7c2-f270-4a23-a5a0-ab350a406102', 4);
        $this->assertArrayHasKey('signHereTabs', $tabs);
    }
}