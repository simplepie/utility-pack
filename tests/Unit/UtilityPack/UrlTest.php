<?php
/**
 * Copyright (c) 2010-2017 Ryan Parman
 * Copyright (c) 2016-2017 Lucky Rocketship Underpants, LLC.
 */

declare(strict_types=1);

namespace Skyzyx\Test\Unit\UtilityPack;

use Skyzyx\Test\Unit\AbstractTestCase;
use Skyzyx\UtilityPack\Url;
use Slim\Http\Environment;
use Slim\Http\Request;

/**
 * @coversNothing
 */
class UrlTest extends AbstractTestCase
{
    public function testUrlWith80(): void
    {
        $request = Request::createFromEnvironment(Environment::mock([
            'HTTPS'        => false,
            'HTTP_HOST'    => 'example.org',
            'SERVER_PORT'  => 80,
            'REQUEST_URI'  => '/testing',
            'QUERY_STRING' => 'qsa=asq',
        ]));

        $this->assertEquals('http://example.org/testing?qsa=asq', Url::getCompleteUrl($request));
    }

    public function testUrlWith443(): void
    {
        $request = Request::createFromEnvironment(Environment::mock([
            'HTTPS'        => true,
            'HTTP_HOST'    => 'example.org',
            'SERVER_PORT'  => 443,
            'REQUEST_URI'  => '/testing',
            'QUERY_STRING' => 'qsa=asq',
        ]));

        $this->assertEquals('https://example.org/testing?qsa=asq', Url::getCompleteUrl($request));
    }

    public function testUrlWith22(): void
    {
        $request = Request::createFromEnvironment(Environment::mock([
            'HTTPS'        => false,
            'HTTP_HOST'    => 'example.com',
            'SERVER_PORT'  => 22,
            'REQUEST_URI'  => '/testing',
            'QUERY_STRING' => 'qsa=asq',
        ]));

        $this->assertEquals('http://example.com/testing?qsa=asq', Url::getCompleteUrl($request));
    }

    public function testUrlWith22NoQsa(): void
    {
        $request = Request::createFromEnvironment(Environment::mock([
            'HTTPS'       => false,
            'HTTP_HOST'   => 'example.com',
            'SERVER_PORT' => 22,
            'REQUEST_URI' => '/testing',
        ]));

        $this->assertEquals('http://example.com/testing', Url::getCompleteUrl($request));
    }

    public function testUrlWith22NoQsaNoPath(): void
    {
        $request = Request::createFromEnvironment(Environment::mock([
            'HTTPS'       => false,
            'HTTP_HOST'   => 'example.com',
            'SERVER_PORT' => 22,
        ]));

        $this->assertEquals('http://example.com/', Url::getCompleteUrl($request));
    }

    public function testUrlWith80NoQsaNoPath(): void
    {
        $request = Request::createFromEnvironment(Environment::mock([
            'HTTPS'       => false,
            'HTTP_HOST'   => 'example.com',
            'SERVER_PORT' => 80,
        ]));

        $this->assertEquals('http://example.com/', Url::getCompleteUrl($request));
    }

    public function testUrlWith80NoQsaNoPathNoPort(): void
    {
        $request = Request::createFromEnvironment(Environment::mock([
            'HTTPS'     => false,
            'HTTP_HOST' => 'example.com',
        ]));

        $this->assertEquals('http://example.com/', Url::getCompleteUrl($request));
    }
}
