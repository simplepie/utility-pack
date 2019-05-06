# Utility Pack

A set of small utilities for PHP 7.2+.

## QueryString

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

## Time

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

## Type

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
