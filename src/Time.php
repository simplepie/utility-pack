<?php
/*
 * Copyright (c) 2010-2016 Ryan Parman
 * Copyright (c) 2016 Lucky Rocketship Underpants, LLC.
 *
 * Licensed to McGraw-Hill Education to use for any purpose.
 */

declare(strict_types=1);

namespace Skyzyx\UtilityPack;

use DateTime;
use DateTimeZone;

class Time
{
    // Multipliers
    public const SECOND  = 1;
    public const SECONDS = 1;
    public const MINUTE  = 60;
    public const MINUTES = 60;
    public const HOUR    = 3600;
    public const HOURS   = 3600;
    public const DAY     = 86400;
    public const DAYS    = 86400;
    public const WEEK    = 604800;
    public const WEEKS   = 604800;
    public const YEAR    = 31557600;
    public const YEARS   = 31557600;

    public const FORMAT_ISO8601_ZULU = 'Y-m-d\TH:i:s\Z';

    /**
     * Returns the current time as a DateTime object.
     *
     * @return DateTime The current time.
     */
    public static function now(): DateTime
    {
        /* @var \DateTime */
        return new DateTime('now', new DateTimeZone('UTC'));
    }
}
