<?php
/**
 * Copyright (c) 2010-2017 Ryan Parman
 * Copyright (c) 2016-2017 Lucky Rocketship Underpants, LLC.
 */

declare(strict_types=1);

namespace Skyzyx\UtilityPack;

/**
 * A standardized builder for URI query strings.
 *
 * @see <https://tools.ietf.org/html/rfc1738>
 */
class QueryString
{
    /**
     * Build a query string from a given set of key-value pairs.
     *
     * @param array $qsa A set of key-value pairs to convert into a query string.
     *
     * @return string A query string.
     */
    public static function build(array $qsa): string
    {
        return \http_build_query($qsa, '', '&', PHP_QUERY_RFC1738);
    }
}
