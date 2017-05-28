<?php
/*
 * Copyright (c) 2010-2016 Ryan Parman
 * Copyright (c) 2016 Lucky Rocketship Underpants, LLC.
 *
 * Licensed to McGraw-Hill Education to use for any purpose.
 */

declare(strict_types=1);

namespace Skyzyx\UtilityPack;

use Psr\Http\Message\ServerRequestInterface as Request;

class Url
{
    /**
     * Gets the complete URL that was requested.
     *
     * @param Response $response The PSR-7 response object.
     *
     * @return string The complete URL that was requested.
     */
    public static function getCompleteUrl(Request $request): string
    {
        $uri = $request->getUri();

        return sprintf('%s://%s%s%s%s',
            $uri->getScheme(),
            $uri->getHost(),
            $uri->getPath(),
            ($uri->getQuery() ? '?' . $uri->getQuery() : ''),
            ($uri->getFragment() ? '#' . $uri->getFragment() : '')
        );
    }
}
