<?php
/**
 * Copyright (c) 2010–2019 Ryan Parman <http://ryanparman.com>.
 * Copyright (c) 2016–2019 Contributors.
 *
 * http://opensource.org/licenses/Apache2.0
 */

declare(strict_types=1);

namespace SimplePie\Util\Pack;

use Psr\Http\Message\ServerRequestInterface as Request;

class Url
{
    /**
     * Gets the complete URL that was requested.
     *
     * @return string The complete URL that was requested.
     */
    public static function getCompleteUrl(Request $request): string
    {
        $uri = $request->getUri();

        return \sprintf(
            '%s://%s%s%s%s',
            $uri->getScheme(),
            $uri->getHost(),
            $uri->getPath(),
            ($uri->getQuery() ? '?' . $uri->getQuery() : ''),
            ($uri->getFragment() ? '#' . $uri->getFragment() : '')
        );
    }
}
