<?php
/**
 * Copyright (c) 2010–2019 Ryan Parman <http://ryanparman.com>.
 * Copyright (c) 2016–2019 Contributors.
 *
 * http://opensource.org/licenses/Apache2.0
 */

declare(strict_types=1);

namespace SimplePie\Test\UtilityPack\Unit\Parser;

use GuzzleHttp\Psr7;
use InvalidArgumentException;
use SimplePie\Test\UtilityPack\Unit\AbstractTestCase;
use TypeError;

class ParserTest extends AbstractTestCase
{
    /**
     * @var \SimplePie\UtilityPack\Parser\AbstractParser
     */
    protected $parser;

    /**
     * @var \Psr\Http\Message\StreamInterface
     */
    protected $stream;

    /**
     * @throws InvalidArgumentException
     */
    protected function setUp(): void
    {
        $this->stream = Psr7\stream_for('This is my data stream content.');
        $this->parser = new TestParser($this->stream);
    }

    /**
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public function testString(): void
    {
        static::assertStringMatchesFormat(
            \sprintf('<%s: resource %%x>', TestParser::class),
            (string) $this->parser
        );
    }

    /**
     * @throws \RuntimeException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public function testStream(): void
    {
        $str = $this->parser->readStream($this->stream);
        static::assertStringContainsString($str, 'This is my data stream content.');
    }

    /**
     * @throws \RuntimeException
     */
    public function testException(): void
    {
        $this->expectException(TypeError::class);
        $this->parser->readStream('This is a string and not a stream.');
    }
}
