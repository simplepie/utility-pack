<div align="center"><img src="https://raw.githubusercontent.com/simplepie/.github/master/logo.png" width="500"><br></div>

----

# Utility Pack

A set of small utilities for PHP 7.2+.

## Badges

### Health

[![Open Issues](http://img.shields.io/github/issues/simplepie/utility-pack.svg?style=for-the-badge)](https://github.com/simplepie/utility-pack/issues)
[![Pull Requests](https://img.shields.io/github/issues-pr/simplepie/utility-pack.svg?style=for-the-badge)](https://github.com/simplepie/utility-pack/pulls)
[![Contributors](https://img.shields.io/github/contributors/simplepie/utility-pack.svg?style=for-the-badge)](https://github.com/simplepie/utility-pack/graphs/contributors)
[![Repo Size](https://img.shields.io/github/repo-size/simplepie/utility-pack.svg?style=for-the-badge)](https://github.com/simplepie/utility-pack/pulse/monthly)
[![GitHub Commit Activity](https://img.shields.io/github/commit-activity/y/simplepie/utility-pack.svg?style=for-the-badge)](https://github.com/simplepie/utility-pack/commits/master)
[![GitHub Last Commit](https://img.shields.io/github/last-commit/simplepie/utility-pack.svg?style=for-the-badge)](https://github.com/simplepie/utility-pack/commits)

### Quality

[![Travis branch](https://img.shields.io/travis/simplepie/utility-pack/master.svg?style=for-the-badge&label=Travis%20CI)](https://travis-ci.org/simplepie/utility-pack)
[![Coveralls](https://img.shields.io/coveralls/github/simplepie/utility-pack/master.svg?style=for-the-badge)](https://coveralls.io/github/simplepie/utility-pack)
[![Code Quality](http://img.shields.io/scrutinizer/g/simplepie/utility-pack.svg?style=for-the-badge&label=Scrutinizer)](https://scrutinizer-ci.com/g/simplepie/utility-pack)
[![Symfony Insight](https://img.shields.io/sensiolabs/i/ea218481-dce7-434a-8a3c-bd9cd9818cca.svg?style=for-the-badge&label=Symfony%20Insight)](https://insight.symfony.com/projects/ea218481-dce7-434a-8a3c-bd9cd9818cca)

### Social

[![Author](http://img.shields.io/badge/author-@skyzyx-blue.svg?style=for-the-badge)](https://twitter.com/skyzyx)
[![Follow](https://img.shields.io/twitter/follow/simplepie_ng.svg?style=for-the-badge&label=Follow%20@simplepie_ng)](https://twitter.com/intent/follow?screen_name=simplepie_ng)
[![Blog](https://img.shields.io/badge/medium-simplepie--ng-blue.svg?style=for-the-badge)](https://medium.com/simplepie-ng)
[![Stars](https://img.shields.io/github/stars/simplepie/utility-pack.svg?style=for-the-badge&label=GitHub%20Stars)](https://github.com/simplepie/utility-pack/stargazers)

### Compliance

[![License](https://img.shields.io/github/license/simplepie/utility-pack.svg?style=for-the-badge)](https://github.com/simplepie/utility-pack/blob/master/LICENSE.md)

## Usage

### QueryString

Believe it or not, different PHP installations can have different default values for generating query strings. This class uses explicit rules so that query strings are always generated exactly the same way. Leverages [`http_build_query()`](http://php.net/manual/en/function.http-build-query.php) under the hood.

```php
<?php
use SimplePie\UtilityPack\Util\QueryString;

echo QueryString::build([
    'limit'  => 'a',
    'order'  => 'b',
    'offset' => 'c',
]);

#=> limit=a&order=b&offset=c
```

### Time

Simple constants for time. Makes time calculations easier to read and understand.

```php
<?php
use SimplePie\UtilityPack\Util\Time;

echo sprintf('%s, %s, %s', 1 * Time::SECOND, 2 * Time::SECONDS, 10 * Time::SECONDS);
#=> 1, 2, 10

echo sprintf('%s, %s, %s', 1 * Time::MINUTE, 2 * Time::MINUTES, 10 * Time::MINUTES);
#=> 60, 120, 600

echo sprintf('%s, %s, %s', 1 * Time::HOUR, 2 * Time::HOURS, 10 * Time::HOURS);
#=> 3600, 7200, 36000

echo sprintf('%s, %s, %s', 1 * Time::DAY, 2 * Time::DAYS, 10 * Time::DAYS);
#=> 86400, 172800, 864000

echo sprintf('%s, %s, %s', 1 * Time::WEEK, 2 * Time::WEEKS, 10 * Time::WEEKS);
#=> 604800, 1209600, 6048000

echo 0.5 * Time::YEAR;
#=> 15778800
```

You can also use the standard ISO-8601 format, with _second_ granularity, and set to UTC _“Zulu”_ time (using the _Z_ annotation).

```php
<?php
use SimplePie\UtilityPack\Util\Time;

echo gmdate(Time::FORMAT_ISO8601_ZULU);
#=> 2017-05-28T01:46:06Z
```

### Type

You can easily get the scalar type or classname of any object.

```php
<?php
use SimplePie\UtilityPack\Util\Types;

echo Types::getClassOrType(
    new \SimpleXMLElement('<xml/>')
);
#=> SimpleXMLElement

echo Types::getClassOrType(
    new DateTime(
        'now',
        new DateTimeZone('UTC')
    )
);
#=> DateTime

echo Types::getClassOrType('string'));
#=> string

echo Types::getClassOrType(111));
#=> integer

echo Types::getClassOrType(111.0));
#=> double

echo Types::getClassOrType(true));
#=> boolean

echo Types::getClassOrType(false));
#=> boolean
```

## Coding Standards

PSR-1/2/5/12/19 are a solid foundation, but are not an entire coding style by themselves. We automate a large part of our style requirements using [PHP CS Fixer](http://cs.sensiolabs.org) and [PHP CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer). (The things that we cannot yet automate are documented here: <https://github.com/simplepie/simplepie-ng-coding-standards>.)

These can be applied/fixed automatically by running the (lightweight) linter:

```bash
make lint
```

Additionally, in our quest to write excellent code, we use a variety of tools to help us catch issues with what we've written, including:

| Type | Description |
| ---- | ----------- |
| Linting Tools | [PHP CS Fixer](http://cs.sensiolabs.org), [PHP CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer) |
| QA Tools | [PDepend](https://github.com/pdepend/pdepend), [PHPLOC](https://github.com/sebastianbergmann/phploc), [PHP Copy/Paste Detector](https://github.com/sebastianbergmann/phpcpd), [PHP Code Analyzer](https://github.com/wapmorgan/PhpCodeAnalyzer) |
| Static Analysis | [Phan](https://github.com/phan/phan), [PHPStan](https://github.com/phpstan/phpstan), [Psalm](https://github.com/vimeo/psalm), [PHP Dependency Analysis](https://github.com/mamuz/PhpDependencyAnalysis) |

These reports can be generated by running the (heavyweight) analyzer:

```bash
make analyze
```

## Please Support or Sponsor Development

The SimplePie project is a labor of love. Development of the next-generation of SimplePie was started in June 2017 as because it's a project I love, and I believe our community would benefit from this tool.

If you use SimplePie — especially to make money — it would be swell if you could kick down a few bucks. As the project grows, and we start leveraging more services and architecture, it would be great if it didn't all need to come out of my pocket.

You can also sponsor the development of a particular feature. If there's a feature that you want to see implemented, and I believe it's the right fit for the SimplePie project, you can sponsor the development of the feature to get it prioritized.

Your contributions are greatly and sincerely appreciated. See the **Sponsor** button along the top of the page for more information.

