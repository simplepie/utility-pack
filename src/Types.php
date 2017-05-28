<?php
/*
 * Copyright (c) 2010-2016 Ryan Parman
 * Copyright (c) 2016 Lucky Rocketship Underpants, LLC.
 *
 * Licensed to McGraw-Hill Education to use for any purpose.
 */

declare(strict_types=1);

namespace FactoryApi\Util;

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
        $type = gettype($param);

        if ('object' === $type) {
            return get_class($param);
        }

        return $type;
    }
}
