<?php
/**
 * Copyright (c) 2010–2019 Ryan Parman <http://ryanparman.com>.
 * Copyright (c) 2016–2019 Contributors.
 *
 * http://opensource.org/licenses/Apache2.0
 */

declare(strict_types=1);

namespace SimplePie\Test\UtilityPack\Unit\Mixin;

use DOMDocument;
use SimplePie\Test\UtilityPack\Unit\AbstractTestCase;
use SimplePie\UtilityPack\Mixin\DomDocumentTrait;
use SimplePie\UtilityPack\Util\Types;

class DomDocumentTraitTest extends AbstractTestCase
{
    use DomDocumentTrait;

    protected function setUp(): void
    {
        $this->domDocument = new DOMDocument('1.0', 'utf-8');
        $this->getDefaultDomConfig($this->domDocument);
    }

    /**
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public function testValidateDomDocument(): void
    {
        static::assertSame(DOMDocument::class, Types::getClassOrType($this->domDocument));
        static::assertSame(DOMDocument::class, Types::getClassOrType($this->getDomDocument()));

        static::assertTrue($this->getDomDocument()->recover);
        static::assertTrue($this->getDomDocument()->resolveExternals);
        static::assertTrue($this->getDomDocument()->substituteEntities);

        static::assertFalse($this->getDomDocument()->formatOutput);
        static::assertFalse($this->getDomDocument()->preserveWhiteSpace);
        static::assertFalse($this->getDomDocument()->strictErrorChecking);
        static::assertFalse($this->getDomDocument()->validateOnParse);
    }
}
