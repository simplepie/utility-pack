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
use SimplePie\UtilityPack\Util\QueryString;

/**
 * @coversNothing
 */
class QueryStringTest extends AbstractTestCase
{
    public function testBuild(): void
    {
        static::assertEquals('limit=a', QueryString::build([
            'limit' => 'a',
        ]));

        static::assertEquals('limit=a&order=b&offset=c', QueryString::build([
            'limit'  => 'a',
            'order'  => 'b',
            'offset' => 'c',
        ]));
    }
}
