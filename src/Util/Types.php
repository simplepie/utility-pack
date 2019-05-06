<?php
/**
 * Copyright (c) 2010–2019 Ryan Parman <http://ryanparman.com>.
 * Copyright (c) 2016–2019 Contributors.
 *
 * http://opensource.org/licenses/Apache2.0
 */

declare(strict_types=1);

namespace SimplePie\UtilityPack\Util;

class Types
{
    /**
     * Gets the most useful description of the value's type.
     *
     * @param mixed $param The value to check.
     *
     * @return string The description of the type of the value.
     */
    public static function getClassOrType($param): string
    {
        $type = \gettype($param);

        if ('object' === $type) {
            return \get_class($param);
        }

        return $type;
    }
}
