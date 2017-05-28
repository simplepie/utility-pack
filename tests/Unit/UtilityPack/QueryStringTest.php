<?php
/*
 * Copyright (c) 2016-2017 McGraw-Hill Education.
 *
 * All rights reserved, unless this code has already been open-sourced elsewhere.
 */

declare(strict_types=1);

namespace Skyzyx\Test\Unit\UtilityPack;

use Skyzyx\Test\Unit\AbstractTestCase;
use Skyzyx\UtilityPack\QueryString;

class QueryStringTest extends AbstractTestCase
{
    public function testBuild()
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
