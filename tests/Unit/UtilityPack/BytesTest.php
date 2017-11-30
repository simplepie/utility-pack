<?php
/**
 * Copyright (c) 2010-2017 Ryan Parman
 * Copyright (c) 2016-2017 Lucky Rocketship Underpants, LLC.
 */

declare(strict_types=1);

namespace Skyzyx\Test\Unit\UtilityPack;

use Skyzyx\Test\Unit\AbstractTestCase;
use Skyzyx\UtilityPack\Bytes;

/**
 * @coversNothing
 */
class BytesTest extends AbstractTestCase
{
    public function testByteValues(): void
    {
        $this->assertEquals(Bytes::BYTE, 1);

        // Base 10
        $this->assertEquals(Bytes::KB, 1000);
        $this->assertEquals(Bytes::KILOBYTE, 1000);
        $this->assertEquals(Bytes::KILOBYTES, 1000);
        $this->assertEquals(Bytes::MB, 1000000);
        $this->assertEquals(Bytes::MEGABYTE, 1000000);
        $this->assertEquals(Bytes::MEGABYTES, 1000000);
        $this->assertEquals(Bytes::GB, 1000000000);
        $this->assertEquals(Bytes::GIGABYTE, 1000000000);
        $this->assertEquals(Bytes::GIGABYTES, 1000000000);
        $this->assertEquals(Bytes::TB, 1000000000000);
        $this->assertEquals(Bytes::TERABYTE, 1000000000000);
        $this->assertEquals(Bytes::TERABYTES, 1000000000000);
        $this->assertEquals(Bytes::PB, 1000000000000000);
        $this->assertEquals(Bytes::PETABYTE, 1000000000000000);
        $this->assertEquals(Bytes::PETABYTES, 1000000000000000);
        $this->assertEquals(Bytes::EB, 1000000000000000000);
        $this->assertEquals(Bytes::EXABYTE, 1000000000000000000);
        $this->assertEquals(Bytes::EXABYTES, 1000000000000000000);

        // Base 2
        $this->assertEquals(Bytes::KIB, 1024);
        $this->assertEquals(Bytes::KIBIBYTE, 1024);
        $this->assertEquals(Bytes::KIBIBYTES, 1024);
        $this->assertEquals(Bytes::MIB, 1048576);
        $this->assertEquals(Bytes::MEBIBYTE, 1048576);
        $this->assertEquals(Bytes::MEBIBYTES, 1048576);
        $this->assertEquals(Bytes::GIB, 1073741824);
        $this->assertEquals(Bytes::GIBIBYTE, 1073741824);
        $this->assertEquals(Bytes::GIBIBYTES, 1073741824);
        $this->assertEquals(Bytes::TIB, 1099511627776);
        $this->assertEquals(Bytes::TEBIBYTE, 1099511627776);
        $this->assertEquals(Bytes::TEBIBYTES, 1099511627776);
        $this->assertEquals(Bytes::PIB, 1125899906842624);
        $this->assertEquals(Bytes::PEBIBYTE, 1125899906842624);
        $this->assertEquals(Bytes::PEBIBYTES, 1125899906842624);
        $this->assertEquals(Bytes::EIB, 1152921504606846976);
        $this->assertEquals(Bytes::EXBIBYTE, 1152921504606846976);
        $this->assertEquals(Bytes::EXBIBYTES, 1152921504606846976);
    }

    public function testOtherByteValues(): void
    {
        $this->assertEquals(0.99 * Bytes::EXABYTES, 990000000000000000);
    }

    public function testBase2(): void
    {
        $this->assertEquals(Bytes::base2(0), Bytes::BYTES);
        $this->assertEquals(Bytes::base2(1), Bytes::KIBIBYTES);
        $this->assertEquals(Bytes::base2(2), Bytes::MEBIBYTES);
        $this->assertEquals(Bytes::base2(3), Bytes::GIBIBYTES);
        $this->assertEquals(Bytes::base2(4), Bytes::TEBIBYTES);
        $this->assertEquals(Bytes::base2(5), Bytes::PEBIBYTES);
        $this->assertEquals(Bytes::base2(6), Bytes::EXBIBYTES);
    }

    public function testBase10(): void
    {
        $this->assertEquals(Bytes::base10(0), Bytes::BYTES);
        $this->assertEquals(Bytes::base10(1), Bytes::KILOBYTES);
        $this->assertEquals(Bytes::base10(2), Bytes::MEGABYTES);
        $this->assertEquals(Bytes::base10(3), Bytes::GIGABYTES);
        $this->assertEquals(Bytes::base10(4), Bytes::TERABYTES);
        $this->assertEquals(Bytes::base10(5), Bytes::PETABYTES);
        $this->assertEquals(Bytes::base10(6), Bytes::EXABYTES);
    }

    public function testFormatBase2Auto(): void
    {
        $this->assertEquals(Bytes::format(2 * Bytes::EXBIBYTES, false), '2.00 EiB');
        $this->assertEquals(Bytes::format(1 * Bytes::EXBIBYTE, false), '1.00 EiB');

        $this->assertEquals(Bytes::format(999 * Bytes::PEBIBYTES, false), '999.00 PiB');
        $this->assertEquals(Bytes::format(2 * Bytes::PEBIBYTES, false), '2.00 PiB');
        $this->assertEquals(Bytes::format(1 * Bytes::PEBIBYTE, false), '1.00 PiB');

        $this->assertEquals(Bytes::format(999 * Bytes::TEBIBYTES, false), '999.00 TiB');
        $this->assertEquals(Bytes::format(2 * Bytes::TEBIBYTES, false), '2.00 TiB');
        $this->assertEquals(Bytes::format(1 * Bytes::TEBIBYTE, false), '1.00 TiB');
    }

    public function testFormatBase10Auto(): void
    {
        $this->assertEquals(Bytes::format(2 * Bytes::EXABYTES), '2.00 EB');
        $this->assertEquals(Bytes::format(1 * Bytes::EXABYTE), '1.00 EB');
        $this->assertEquals(Bytes::format(990000000000000000), '990.00 PB');

        $this->assertEquals(Bytes::format(999 * Bytes::PETABYTES), '999.00 PB');
        $this->assertEquals(Bytes::format(2 * Bytes::PETABYTES), '2.00 PB');
        $this->assertEquals(Bytes::format(1 * Bytes::PETABYTE), '1.00 PB');
        $this->assertEquals(Bytes::format(990000000000000), '990.00 TB');

        $this->assertEquals(Bytes::format(999 * Bytes::TERABYTES), '999.00 TB');
        $this->assertEquals(Bytes::format(2 * Bytes::TERABYTES), '2.00 TB');
        $this->assertEquals(Bytes::format(1 * Bytes::TERABYTE), '1.00 TB');
        $this->assertEquals(Bytes::format(990000000000), '990.00 GB');
    }

    public function testFormatBaseLock(): void
    {
        $this->assertEquals(Bytes::format(1 * Bytes::EXABYTE), '1.00 EB');
        $this->assertEquals(Bytes::format(1 * Bytes::EXABYTE, true, Bytes::EXABYTE), '1.00 EB');
        $this->assertEquals(Bytes::format(1 * Bytes::EXABYTE, true, Bytes::PETABYTE), '1000.00 PB');
        $this->assertEquals(Bytes::format(1 * Bytes::EXABYTE, true, Bytes::TERABYTE), '1000000.00 TB');
        $this->assertEquals(Bytes::format(1 * Bytes::EXABYTE, true, Bytes::GIGABYTE), '1000000000.00 GB');
        $this->assertEquals(Bytes::format(1 * Bytes::EXABYTE, true, Bytes::MEGABYTE), '1000000000000.00 MB');
        $this->assertEquals(Bytes::format(1 * Bytes::EXABYTE, true, Bytes::KILOBYTE), '1000000000000000.00 kB');

        $this->assertEquals(Bytes::format(1 * Bytes::EXBIBYTE), '1.15 EB');
        $this->assertEquals(Bytes::format(1 * Bytes::EXBIBYTE, false), '1.00 EiB');

        $this->assertEquals(Bytes::format(1 * Bytes::EXBIBYTE, true, Bytes::EXABYTE), '1.15 EB');
        $this->assertEquals(Bytes::format(1 * Bytes::EXBIBYTE, true, Bytes::PETABYTE), '1152.92 PB');
        $this->assertEquals(Bytes::format(1 * Bytes::EXBIBYTE, true, Bytes::TERABYTE), '1152921.50 TB');
        $this->assertEquals(Bytes::format(1 * Bytes::EXBIBYTE, true, Bytes::GIGABYTE), '1152921504.61 GB');
        $this->assertEquals(Bytes::format(1 * Bytes::EXBIBYTE, true, Bytes::MEGABYTE), '1152921504606.85 MB');
        $this->assertEquals(Bytes::format(1 * Bytes::EXBIBYTE, true, Bytes::KILOBYTE), '1152921504606847.00 kB');
    }
}
