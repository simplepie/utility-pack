<?php
/**
 * Copyright (c) 2010–2019 Ryan Parman <http://ryanparman.com>.
 * Copyright (c) 2016–2019 Contributors.
 *
 * http://opensource.org/licenses/Apache2.0
 */

declare(strict_types=1);

namespace SimplePie\UtilityPack\Util;

use RuntimeException;

class Bytes
{
    // Multipliers
    public const BYTE = 1;

    public const BYTES = 1;

    // Base 2 (e.g., 1024)
    public const KIB = 1024;                // 2 ** 10

    public const KIBIBYTE = 1024;                // 2 ** 10

    public const KIBIBYTES = 1024;                // 2 ** 10

    public const MIB = 1048576;             // 2 ** 20

    public const MEBIBYTE = 1048576;             // 2 ** 20

    public const MEBIBYTES = 1048576;             // 2 ** 20

    public const GIB = 1073741824;          // 2 ** 30

    public const GIBIBYTE = 1073741824;          // 2 ** 30

    public const GIBIBYTES = 1073741824;          // 2 ** 30

    public const TIB = 1099511627776;       // 2 ** 40

    public const TEBIBYTE = 1099511627776;       // 2 ** 40

    public const TEBIBYTES = 1099511627776;       // 2 ** 40

    public const PIB = 1125899906842624;    // 2 ** 50

    public const PEBIBYTE = 1125899906842624;    // 2 ** 50

    public const PEBIBYTES = 1125899906842624;    // 2 ** 50

    public const EIB = 1152921504606846976; // 2 ** 60

    public const EXBIBYTE = 1152921504606846976; // 2 ** 60

    public const EXBIBYTES = 1152921504606846976; // 2 ** 60

    // Base 10 (e.g., 1000)
    public const KB = 1000;                // 10 ** 3

    public const KILOBYTE = 1000;                // 10 ** 3

    public const KILOBYTES = 1000;                // 10 ** 3

    public const MB = 1000000;             // 10 ** 6

    public const MEGABYTE = 1000000;             // 10 ** 6

    public const MEGABYTES = 1000000;             // 10 ** 6

    public const GB = 1000000000;          // 10 ** 9

    public const GIGABYTE = 1000000000;          // 10 ** 9

    public const GIGABYTES = 1000000000;          // 10 ** 9

    public const TB = 1000000000000;       // 10 ** 12

    public const TERABYTE = 1000000000000;       // 10 ** 12

    public const TERABYTES = 1000000000000;       // 10 ** 12

    public const PB = 1000000000000000;    // 10 ** 15

    public const PETABYTE = 1000000000000000;    // 10 ** 15

    public const PETABYTES = 1000000000000000;    // 10 ** 15

    public const EB = 1000000000000000000; // 10 ** 18

    public const EXABYTE = 1000000000000000000; // 10 ** 18

    public const EXABYTES = 1000000000000000000; // 10 ** 18

    /**
     * Notations for converted values.
     *
     * @var array
     */
    protected static $notations = [
        self::BYTES     => 'b',
        self::KILOBYTES => 'kB',
        self::KIBIBYTES => 'kiB',
        self::MEGABYTES => 'MB',
        self::MEBIBYTES => 'MiB',
        self::GIGABYTES => 'GB',
        self::GIBIBYTES => 'GiB',
        self::TERABYTES => 'TB',
        self::TEBIBYTES => 'TiB',
        self::PETABYTES => 'PB',
        self::PEBIBYTES => 'PiB',
        self::EXABYTES  => 'EB',
        self::EXBIBYTES => 'EiB',
    ];

    /**
     * Groupings of values determined by their base unit.
     *
     * @var array[]
     */
    protected static $base = [
        2 => [
            self::BYTES,
            self::KIBIBYTES,
            self::MEBIBYTES,
            self::GIBIBYTES,
            self::TEBIBYTES,
            self::PEBIBYTES,
            self::EXBIBYTES,
        ],
        10 => [
            self::BYTES,
            self::KILOBYTES,
            self::MEGABYTES,
            self::GIGABYTES,
            self::TERABYTES,
            self::PETABYTES,
            self::EXABYTES,
        ],
    ];

    /**
     * Return human readable file sizes.
     *
     * @param int      $bytes     The number of bytes to format, as an integer.
     * @param bool     $useBase10 Whether or not to use `1000` for the base unit. A value of `true` means that `1000`
     *                            will be used as the stepping unit. A value of `false` means that `1024` will be
     *                            used as the stepping unit.
     * @param int|null $base      The base unit to lock to. By default, the base unit will increase as the values cross
     *                            its threshold. If a value is passed here (should be one of the constants, and the
     *                            constant must be _Base 2_ or _Base 10_ -- matching the `$useBase10` value). The
     *                            default value is `null`, which means that the base unit is _unlocked_.
     * @param string   $format    The final value is formatted using `sprintf()`. This is the format that should be
     *                            used. The default value is `%01.2f %s`.
     *
     * @throws RuntimeException
     *
     * phpcs:disable Generic.Functions.OpeningFunctionBraceBsdAllman.BraceOnSameLine
     */
    public static function format(
        int $bytes,
        $useBase10 = true,
        ?int $base = null,
        string $format = '%01.2f %s'
    ): string {
        // phpcs:enable

        $units = (int) $useBase10
            ? self::$base[10]
            : self::$base[2];

        // Do we have a base unit?
        if ($base) {
            // Make sure it's legit
            if (!\array_search($base, $units, true)) {
                throw new RuntimeException(\sprintf(
                    'A base value of %s was used, which is not understood. Please use one of the class constants as '
                    . 'a base value instead.',
                    (string) $base
                ));
            }

            return \sprintf(
                $format,
                ($bytes / (int) $base),
                (string) self::$notations[$base]
            );
        }

        // Otherwise, figure out the appropriate base unit
        while (\count($units) > 0) {
            $base = (int) \array_pop($units);

            if ($bytes >= $base) {
                return \sprintf(
                    $format,
                    ($bytes / (int) $base),
                    (string) self::$notations[(int) $base]
                );
            }
        }

        throw new RuntimeException((string) $bytes);
    }

    /**
     * Returns the Base 2 value of the stepping.
     *
     * * 0 = 0
     * * 1 = 1024 (kibi)
     * * 2 = 1048576 (mebi)
     * * 3 = 1073741824 (gibi)
     *
     * @param int $stepping The stepping to calculate the value for.
     */
    public static function base2(int $stepping): int
    {
        return 2 ** (10 * $stepping);
    }

    /**
     * Returns the Base 10 value of the stepping.
     *
     * * 0 = 0
     * * 1 = 1000 (kilo)
     * * 2 = 1000000 (mega)
     * * 3 = 1000000000 (giga)
     *
     * @param int $stepping The stepping to calculate the value for.
     */
    public static function base10(int $stepping): int
    {
        return 10 ** (3 * $stepping);
    }
}
