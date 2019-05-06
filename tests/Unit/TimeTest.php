<?php
/**
 * Copyright (c) 2010–2019 Ryan Parman <http://ryanparman.com>.
 * Copyright (c) 2016–2019 Contributors.
 *
 * http://opensource.org/licenses/Apache2.0
 */

declare(strict_types=1);

namespace SimplePie\Test\Util\Pack\Unit;

use SimplePie\Util\Pack\Time;

/**
 * @coversNothing
 */
class TimeTest extends AbstractTestCase
{
    public function testTimeCalc(): void
    {
        // Seconds
        static::assertEquals(1, 1 * Time::SECOND);
        static::assertEquals(2, 2 * Time::SECONDS);
        static::assertEquals(3, 3 * Time::SECONDS);

        // Minutes
        static::assertEquals(60, 1 * Time::MINUTE);
        static::assertEquals(120, 2 * Time::MINUTES);
        static::assertEquals(180, 3 * Time::MINUTES);

        // Hours
        static::assertEquals(3600, 1 * Time::HOUR);
        static::assertEquals(7200, 2 * Time::HOURS);
        static::assertEquals(10800, 3 * Time::HOURS);

        // Days
        static::assertEquals(86400, 1 * Time::DAY);
        static::assertEquals(172800, 2 * Time::DAYS);
        static::assertEquals(259200, 3 * Time::DAYS);

        // Weeks
        static::assertEquals(604800, 1 * Time::WEEK);
        static::assertEquals(1209600, 2 * Time::WEEKS);
        static::assertEquals(1814400, 3 * Time::WEEKS);
    }

    public function testDayCalc(): void
    {
        static::assertEquals('DateTime', \get_class(Time::now()));
    }
}
