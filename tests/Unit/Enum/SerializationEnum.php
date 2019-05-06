<?php
/**
 * Copyright (c) 2010–2019 Ryan Parman <http://ryanparman.com>.
 * Copyright (c) 2016–2019 Contributors.
 *
 * http://opensource.org/licenses/Apache2.0
 */

declare(strict_types=1);

namespace SimplePie\Test\UtilityPack\Unit\Enum;

use SimplePie\UtilityPack\Enum\AbstractEnum;

class SerializationEnum extends AbstractEnum
{
    public const TEXT = 'text';

    public const HTML = 'html';

    public const XHTML = 'xhtml';
}
