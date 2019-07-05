<?php
/**
 * Copyright (c) 2010–2019 Ryan Parman <http://ryanparman.com>.
 * Copyright (c) 2016–2019 Contributors.
 *
 * http://opensource.org/licenses/Apache2.0
 */

declare(strict_types=1);

namespace SimplePie\Test\UtilityPack\Unit\Parser;

use Psr\Http\Message\StreamInterface;
use SimplePie\UtilityPack\Parser\AbstractParser;

class TestParser extends AbstractParser
{
    /**
     * @var \Psr\Http\Message\StreamInterface
     */
    protected $stream;

    public function __construct(StreamInterface $stream)
    {
        $this->stream = $stream;
    }
}
