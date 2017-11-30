<?php
/**
 * Copyright (c) 2010-2017 Ryan Parman
 * Copyright (c) 2016-2017 Lucky Rocketship Underpants, LLC.
 */

declare(strict_types=1);

namespace Skyzyx\UtilityPack;

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
