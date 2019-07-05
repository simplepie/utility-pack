<?php
/**
 * Copyright (c) 2010–2019 Ryan Parman <http://ryanparman.com>.
 * Copyright (c) 2016–2019 Contributors.
 *
 * http://opensource.org/licenses/Apache2.0
 */

declare(strict_types=1);

namespace SimplePie\Test\UtilityPack\Unit\Mixin;

use Monolog\Handler\TestHandler;
use Monolog\Logger;
use SimplePie\Test\UtilityPack\Unit\AbstractTestCase;
use SimplePie\UtilityPack\Mixin\LibxmlTrait;
use SimplePie\UtilityPack\Mixin\LoggerTrait;

class LibxmlTraitTest extends AbstractTestCase
{
    use LibxmlTrait;
    use LoggerTrait;

    /**
     * @var \Monolog\Handler\TestHandler
     */
    protected $handler;

    protected function setUp(): void
    {
        $logger = new Logger('Testing');
        $logger->pushHandler(new TestHandler());

        $this->libxml = 0;
        $this->setLogger($logger);
    }

    /**
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public function testLibxmlDefault(): void
    {
        // Default value
        static::assertSame($this->libxml, 0);

        // Set default configuration
        $this->setLibxml(
            static::getDefaultLibxmlConfig()
        );

        // New value
        static::assertSame($this->getLibxml(), 4792582);

        // Test bitwise contains
        static::assertGreaterThan(0, $this->getLibxml() & \LIBXML_HTML_NOIMPLIED);
        static::assertGreaterThan(0, $this->getLibxml() & \LIBXML_BIGLINES);
        static::assertGreaterThan(0, $this->getLibxml() & \LIBXML_COMPACT);
        static::assertGreaterThan(0, $this->getLibxml() & \LIBXML_HTML_NODEFDTD);
        static::assertGreaterThan(0, $this->getLibxml() & \LIBXML_NOBLANKS);
        static::assertGreaterThan(0, $this->getLibxml() & \LIBXML_NOENT);
        static::assertGreaterThan(0, $this->getLibxml() & \LIBXML_NOXMLDECL);
        static::assertGreaterThan(0, $this->getLibxml() & \LIBXML_NSCLEAN);
        static::assertGreaterThan(0, $this->getLibxml() & \LIBXML_PARSEHUGE);

        // Test the automatic logging
        $message = 'Libxml configuration has a bitwise value of `4792582`. (This is the default configuration.)';
        static::assertTrue($this->getLogger()->getHandlers()[0]->hasDebugThatContains($message));
    }
}
