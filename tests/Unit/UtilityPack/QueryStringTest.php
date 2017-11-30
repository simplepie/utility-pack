<?php
/**
 * Copyright (c) 2010-2017 Ryan Parman
 * Copyright (c) 2016-2017 Lucky Rocketship Underpants, LLC.
 */

declare(strict_types=1);

namespace Skyzyx\Test\Unit\UtilityPack;

use Skyzyx\Test\Unit\AbstractTestCase;
use Skyzyx\UtilityPack\QueryString;

/**
 * @coversNothing
 */
class QueryStringTest extends AbstractTestCase
{
    public function testBuild(): void
    {
        $this->assertEquals('limit=a', QueryString::build([
            'limit' => 'a',
        ]));

        $this->assertEquals('limit=a&order=b&offset=c', QueryString::build([
            'limit'  => 'a',
            'order'  => 'b',
            'offset' => 'c',
        ]));
    }
}
