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

class TimeTest extends AbstractTestCase
{
    public function testTimeCalc()
    {
        // Seconds
        $this->assertEquals(1, 1 * Time::SECOND);
        $this->assertEquals(2, 2 * Time::SECONDS);
        $this->assertEquals(3, 3 * Time::SECONDS);

        // Minutes
        $this->assertEquals(60, 1 * Time::MINUTE);
        $this->assertEquals(120, 2 * Time::MINUTES);
        $this->assertEquals(180, 3 * Time::MINUTES);

        // Hours
        $this->assertEquals(3600, 1 * Time::HOUR);
        $this->assertEquals(7200, 2 * Time::HOURS);
        $this->assertEquals(10800, 3 * Time::HOURS);

        // Days
        $this->assertEquals(86400, 1 * Time::DAY);
        $this->assertEquals(172800, 2 * Time::DAYS);
        $this->assertEquals(259200, 3 * Time::DAYS);

        // Weeks
        $this->assertEquals(604800, 1 * Time::WEEK);
        $this->assertEquals(1209600, 2 * Time::WEEKS);
        $this->assertEquals(1814400, 3 * Time::WEEKS);
    }

    public function testDayCalc()
    {
        $this->assertEquals('DateTime', get_class(Time::now()));
    }
}
