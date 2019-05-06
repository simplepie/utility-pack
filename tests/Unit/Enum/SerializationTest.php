<?php
/**
 * Copyright (c) 2010–2019 Ryan Parman <http://ryanparman.com>.
 * Copyright (c) 2016–2019 Contributors.
 *
 * http://opensource.org/licenses/Apache2.0
 */

declare(strict_types=1);

namespace SimplePie\Test\UtilityPack\Unit\Enum;

use SimplePie\Test\UtilityPack\Unit\AbstractTestCase;

class SerializationTest extends AbstractTestCase
{
    public function testIntrospect(): void
    {
        static::assertSame(SerializationEnum::introspect(), [
            'TEXT'  => 'text',
            'HTML'  => 'html',
            'XHTML' => 'xhtml',
        ]);
    }

    public function testIntrospectKeys(): void
    {
        static::assertSame(SerializationEnum::introspectKeys(), [
            'TEXT',
            'HTML',
            'XHTML',
        ]);
    }

    public function testHasValue(): void
    {
        static::assertTrue(SerializationEnum::hasValue(SerializationEnum::TEXT));
        static::assertTrue(SerializationEnum::hasValue(SerializationEnum::HTML));
        static::assertTrue(SerializationEnum::hasValue(SerializationEnum::XHTML));

        static::assertFalse(SerializationEnum::hasValue('nope'));
    }
}
