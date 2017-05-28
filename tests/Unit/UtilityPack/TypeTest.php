<?php
/*
 * Copyright (c) 2016-2017 McGraw-Hill Education.
 *
 * All rights reserved, unless this code has already been open-sourced elsewhere.
 */

declare(strict_types=1);

namespace Skyzyx\Test\Unit\UtilityPack;

use Skyzyx\Test\Unit\AbstractTestCase;
use Skyzyx\UtilityPack\Time;
use Skyzyx\UtilityPack\Types;

class TypeTest extends AbstractTestCase
{
    public function testTypes()
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
