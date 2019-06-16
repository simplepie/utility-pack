<?php
/**
 * Copyright (c) 2010–2019 Ryan Parman <http://ryanparman.com>.
 * Copyright (c) 2016–2019 Contributors.
 *
 * http://opensource.org/licenses/Apache2.0
 */

declare(strict_types=1);

namespace SimplePie\Test\UtilityPack\Unit\Util;

use SimplePie\Test\UtilityPack\Unit\AbstractTestCase;
use SimplePie\UtilityPack\Util\Time;
use SimplePie\UtilityPack\Util\Types;

/**
 * @coversNothing
 */
class TypeTest extends AbstractTestCase
{
    /**
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public function testTypes(): void
    {
        static::assertEquals('SimpleXMLElement', Types::getClassOrType(
            new \SimpleXMLElement('<xml/>')
        ));
        static::assertEquals('DateTime', Types::getClassOrType(Time::now()));
        static::assertEquals('string', Types::getClassOrType('string'));
        static::assertEquals('integer', Types::getClassOrType(111));
        static::assertEquals('double', Types::getClassOrType(111.0));
        static::assertEquals('boolean', Types::getClassOrType(true));
        static::assertEquals('boolean', Types::getClassOrType(false));
    }
}
