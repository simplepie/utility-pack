<?php
/**
 * Copyright (c) 2010–2019 Ryan Parman <http://ryanparman.com>.
 * Copyright (c) 2016–2019 Contributors.
 *
 * http://opensource.org/licenses/Apache2.0
 */

declare(strict_types=1);

namespace SimplePie\Test\UtilityPack\Unit\Mixin;

use SimplePie\Test\UtilityPack\Unit\AbstractTestCase;
use SimplePie\UtilityPack\Mixin\RawDocumentTrait;

class RawDocumentTraitTest extends AbstractTestCase
{
    use RawDocumentTrait;

    protected function setUp(): void
    {
        $this->rawDocument = 'This is my document.';
    }

    public function testGetRawDocument(): void
    {
        static::assertTrue('This is my document.' === $this->getRawDocument());
    }
}
