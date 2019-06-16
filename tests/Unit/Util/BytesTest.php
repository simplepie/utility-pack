<?php
/**
 * Copyright (c) 2010–2019 Ryan Parman <http://ryanparman.com>.
 * Copyright (c) 2016–2019 Contributors.
 *
 * http://opensource.org/licenses/Apache2.0
 */

declare(strict_types=1);

namespace SimplePie\Test\UtilityPack\Unit\Util;

use SimplePie\Test\UtilityPack\Unit\AbstractTestCase;
use SimplePie\UtilityPack\Util\Bytes;

/**
 * @coversNothing
 */
class BytesTest extends AbstractTestCase
{
    /**
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public function testByteValues(): void
    {
        static::assertEquals(Bytes::BYTE, 1);

        // Base 10
        static::assertEquals(Bytes::KB, 1000);
        static::assertEquals(Bytes::KILOBYTE, 1000);
        static::assertEquals(Bytes::KILOBYTES, 1000);
        static::assertEquals(Bytes::MB, 1000000);
        static::assertEquals(Bytes::MEGABYTE, 1000000);
        static::assertEquals(Bytes::MEGABYTES, 1000000);
        static::assertEquals(Bytes::GB, 1000000000);
        static::assertEquals(Bytes::GIGABYTE, 1000000000);
        static::assertEquals(Bytes::GIGABYTES, 1000000000);
        static::assertEquals(Bytes::TB, 1000000000000);
        static::assertEquals(Bytes::TERABYTE, 1000000000000);
        static::assertEquals(Bytes::TERABYTES, 1000000000000);
        static::assertEquals(Bytes::PB, 1000000000000000);
        static::assertEquals(Bytes::PETABYTE, 1000000000000000);
        static::assertEquals(Bytes::PETABYTES, 1000000000000000);
        static::assertEquals(Bytes::EB, 1000000000000000000);
        static::assertEquals(Bytes::EXABYTE, 1000000000000000000);
        static::assertEquals(Bytes::EXABYTES, 1000000000000000000);

        // Base 2
        static::assertEquals(Bytes::KIB, 1024);
        static::assertEquals(Bytes::KIBIBYTE, 1024);
        static::assertEquals(Bytes::KIBIBYTES, 1024);
        static::assertEquals(Bytes::MIB, 1048576);
        static::assertEquals(Bytes::MEBIBYTE, 1048576);
        static::assertEquals(Bytes::MEBIBYTES, 1048576);
        static::assertEquals(Bytes::GIB, 1073741824);
        static::assertEquals(Bytes::GIBIBYTE, 1073741824);
        static::assertEquals(Bytes::GIBIBYTES, 1073741824);
        static::assertEquals(Bytes::TIB, 1099511627776);
        static::assertEquals(Bytes::TEBIBYTE, 1099511627776);
        static::assertEquals(Bytes::TEBIBYTES, 1099511627776);
        static::assertEquals(Bytes::PIB, 1125899906842624);
        static::assertEquals(Bytes::PEBIBYTE, 1125899906842624);
        static::assertEquals(Bytes::PEBIBYTES, 1125899906842624);
        static::assertEquals(Bytes::EIB, 1152921504606846976);
        static::assertEquals(Bytes::EXBIBYTE, 1152921504606846976);
        static::assertEquals(Bytes::EXBIBYTES, 1152921504606846976);
    }

    /**
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public function testOtherByteValues(): void
    {
        static::assertEquals(0.99 * Bytes::EXABYTES, 990000000000000000);
    }

    /**
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public function testBase2(): void
    {
        static::assertEquals(Bytes::base2(0), Bytes::BYTES);
        static::assertEquals(Bytes::base2(1), Bytes::KIBIBYTES);
        static::assertEquals(Bytes::base2(2), Bytes::MEBIBYTES);
        static::assertEquals(Bytes::base2(3), Bytes::GIBIBYTES);
        static::assertEquals(Bytes::base2(4), Bytes::TEBIBYTES);
        static::assertEquals(Bytes::base2(5), Bytes::PEBIBYTES);
        static::assertEquals(Bytes::base2(6), Bytes::EXBIBYTES);
    }

    /**
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public function testBase10(): void
    {
        static::assertEquals(Bytes::base10(0), Bytes::BYTES);
        static::assertEquals(Bytes::base10(1), Bytes::KILOBYTES);
        static::assertEquals(Bytes::base10(2), Bytes::MEGABYTES);
        static::assertEquals(Bytes::base10(3), Bytes::GIGABYTES);
        static::assertEquals(Bytes::base10(4), Bytes::TERABYTES);
        static::assertEquals(Bytes::base10(5), Bytes::PETABYTES);
        static::assertEquals(Bytes::base10(6), Bytes::EXABYTES);
    }

    /**
     * @throws \ArithmeticError
     * @throws \RuntimeException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public function testFormatBase2Auto(): void
    {
        static::assertEquals(Bytes::format(2 * Bytes::EXBIBYTES, false), '2.00 EiB');
        static::assertEquals(Bytes::format(1 * Bytes::EXBIBYTE, false), '1.00 EiB');

        static::assertEquals(Bytes::format(999 * Bytes::PEBIBYTES, false), '999.00 PiB');
        static::assertEquals(Bytes::format(2 * Bytes::PEBIBYTES, false), '2.00 PiB');
        static::assertEquals(Bytes::format(1 * Bytes::PEBIBYTE, false), '1.00 PiB');

        static::assertEquals(Bytes::format(999 * Bytes::TEBIBYTES, false), '999.00 TiB');
        static::assertEquals(Bytes::format(2 * Bytes::TEBIBYTES, false), '2.00 TiB');
        static::assertEquals(Bytes::format(1 * Bytes::TEBIBYTE, false), '1.00 TiB');
    }

    /**
     * @throws \ArithmeticError
     * @throws \RuntimeException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public function testFormatBase10Auto(): void
    {
        static::assertEquals(Bytes::format(2 * Bytes::EXABYTES), '2.00 EB');
        static::assertEquals(Bytes::format(1 * Bytes::EXABYTE), '1.00 EB');
        static::assertEquals(Bytes::format(990000000000000000), '990.00 PB');

        static::assertEquals(Bytes::format(999 * Bytes::PETABYTES), '999.00 PB');
        static::assertEquals(Bytes::format(2 * Bytes::PETABYTES), '2.00 PB');
        static::assertEquals(Bytes::format(1 * Bytes::PETABYTE), '1.00 PB');
        static::assertEquals(Bytes::format(990000000000000), '990.00 TB');

        static::assertEquals(Bytes::format(999 * Bytes::TERABYTES), '999.00 TB');
        static::assertEquals(Bytes::format(2 * Bytes::TERABYTES), '2.00 TB');
        static::assertEquals(Bytes::format(1 * Bytes::TERABYTE), '1.00 TB');
        static::assertEquals(Bytes::format(990000000000), '990.00 GB');
    }

    /**
     * @throws \ArithmeticError
     * @throws \RuntimeException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public function testFormatBaseLock(): void
    {
        static::assertEquals(Bytes::format(1 * Bytes::EXABYTE), '1.00 EB');
        static::assertEquals(Bytes::format(1 * Bytes::EXABYTE, true, Bytes::EXABYTE), '1.00 EB');
        static::assertEquals(Bytes::format(1 * Bytes::EXABYTE, true, Bytes::PETABYTE), '1000.00 PB');
        static::assertEquals(Bytes::format(1 * Bytes::EXABYTE, true, Bytes::TERABYTE), '1000000.00 TB');
        static::assertEquals(Bytes::format(1 * Bytes::EXABYTE, true, Bytes::GIGABYTE), '1000000000.00 GB');
        static::assertEquals(Bytes::format(1 * Bytes::EXABYTE, true, Bytes::MEGABYTE), '1000000000000.00 MB');
        static::assertEquals(Bytes::format(1 * Bytes::EXABYTE, true, Bytes::KILOBYTE), '1000000000000000.00 kB');

        static::assertEquals(Bytes::format(1 * Bytes::EXBIBYTE), '1.15 EB');
        static::assertEquals(Bytes::format(1 * Bytes::EXBIBYTE, false), '1.00 EiB');

        static::assertEquals(Bytes::format(1 * Bytes::EXBIBYTE, true, Bytes::EXABYTE), '1.15 EB');
        static::assertEquals(Bytes::format(1 * Bytes::EXBIBYTE, true, Bytes::PETABYTE), '1152.92 PB');
        static::assertEquals(Bytes::format(1 * Bytes::EXBIBYTE, true, Bytes::TERABYTE), '1152921.50 TB');
        static::assertEquals(Bytes::format(1 * Bytes::EXBIBYTE, true, Bytes::GIGABYTE), '1152921504.61 GB');
        static::assertEquals(Bytes::format(1 * Bytes::EXBIBYTE, true, Bytes::MEGABYTE), '1152921504606.85 MB');
        static::assertEquals(Bytes::format(1 * Bytes::EXBIBYTE, true, Bytes::KILOBYTE), '1152921504606847.00 kB');
    }
}
