<?php
/**
 * Copyright (c) 2010-2017 Ryan Parman
 * Copyright (c) 2016-2017 Lucky Rocketship Underpants, LLC.
 */

declare(strict_types=1);

namespace Skyzyx\Test\Unit\UtilityPack;

use Skyzyx\Test\Unit\AbstractTestCase;
use Skyzyx\UtilityPack\Time;
use Skyzyx\UtilityPack\Types;

/**
 * @coversNothing
 */
class TypeTest extends AbstractTestCase
{
    public function testTypes(): void
    {
        $this->assertEquals('SimpleXMLElement', Types::getClassOrType(
            new \SimpleXMLElement('<xml/>')
        ));
        $this->assertEquals('DateTime', Types::getClassOrType(Time::now()));
        $this->assertEquals('string', Types::getClassOrType('string'));
        $this->assertEquals('integer', Types::getClassOrType(111));
        $this->assertEquals('double', Types::getClassOrType(111.0));
        $this->assertEquals('boolean', Types::getClassOrType(true));
        $this->assertEquals('boolean', Types::getClassOrType(false));
    }
}
