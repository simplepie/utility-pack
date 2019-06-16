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
use SimplePie\UtilityPack\Util\Url;
use Slim\Http\Environment;
use Slim\Http\Request;

/**
 * @coversNothing
 */
class UrlTest extends AbstractTestCase
{
    /**
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public function testUrlWith80(): void
    {
        $request = Request::createFromEnvironment(Environment::mock([
            'HTTPS'        => false,
            'HTTP_HOST'    => 'example.org',
            'SERVER_PORT'  => 80,
            'REQUEST_URI'  => '/testing',
            'QUERY_STRING' => 'qsa=asq',
        ]));

        static::assertEquals('http://example.org/testing?qsa=asq', Url::getCompleteUrl($request));
    }

    /**
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public function testUrlWith443(): void
    {
        $request = Request::createFromEnvironment(Environment::mock([
            'HTTPS'        => true,
            'HTTP_HOST'    => 'example.org',
            'SERVER_PORT'  => 443,
            'REQUEST_URI'  => '/testing',
            'QUERY_STRING' => 'qsa=asq',
        ]));

        static::assertEquals('https://example.org/testing?qsa=asq', Url::getCompleteUrl($request));
    }

    /**
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public function testUrlWith22(): void
    {
        $request = Request::createFromEnvironment(Environment::mock([
            'HTTPS'        => false,
            'HTTP_HOST'    => 'example.com',
            'SERVER_PORT'  => 22,
            'REQUEST_URI'  => '/testing',
            'QUERY_STRING' => 'qsa=asq',
        ]));

        static::assertEquals('http://example.com/testing?qsa=asq', Url::getCompleteUrl($request));
    }

    /**
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public function testUrlWith22NoQsa(): void
    {
        $request = Request::createFromEnvironment(Environment::mock([
            'HTTPS'       => false,
            'HTTP_HOST'   => 'example.com',
            'SERVER_PORT' => 22,
            'REQUEST_URI' => '/testing',
        ]));

        static::assertEquals('http://example.com/testing', Url::getCompleteUrl($request));
    }

    /**
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public function testUrlWith22NoQsaNoPath(): void
    {
        $request = Request::createFromEnvironment(Environment::mock([
            'HTTPS'       => false,
            'HTTP_HOST'   => 'example.com',
            'SERVER_PORT' => 22,
        ]));

        static::assertEquals('http://example.com/', Url::getCompleteUrl($request));
    }

    /**
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public function testUrlWith80NoQsaNoPath(): void
    {
        $request = Request::createFromEnvironment(Environment::mock([
            'HTTPS'       => false,
            'HTTP_HOST'   => 'example.com',
            'SERVER_PORT' => 80,
        ]));

        static::assertEquals('http://example.com/', Url::getCompleteUrl($request));
    }

    /**
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public function testUrlWith80NoQsaNoPathNoPort(): void
    {
        $request = Request::createFromEnvironment(Environment::mock([
            'HTTPS'     => false,
            'HTTP_HOST' => 'example.com',
        ]));

        static::assertEquals('http://example.com/', Url::getCompleteUrl($request));
    }
}
