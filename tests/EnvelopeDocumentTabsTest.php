<?php

namespace jdombroski\DocuSign\Tests;

use DocuSign;

final class EnvelopeDocumentTabsTest extends TestCase
{
    public function testGetEndpoint()
    {
        $tabs = DocuSign::envelopes()->documentTabs()->get('8104f7c2-f270-4a23-a5a0-ab350a406102', 4);
        $this->assertArrayHasKey('signHereTabs', $tabs);
    }
}