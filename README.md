# php-randomdate

[![License](https://img.shields.io/packagist/l/joshtronic/php-randomdate?style=for-the-badge)](https://github.com/joshtronic/php-randomdate/blob/master/LICENSE)
![PHP Version](https://img.shields.io/packagist/php-v/joshtronic/php-randomdate?style=for-the-badge)
[![Test Status](https://img.shields.io/github/workflow/status/joshtronic/php-randomdate/Test?style=for-the-badge)](https://github.com/joshtronic/php-randomdate/actions)
[![Code Coverage](https://img.shields.io/codecov/c/github/joshtronic/php-randomdate?style=for-the-badge)](https://codecov.io/gh/joshtronic/php-randomdate)
[![Monthly Downloads](https://img.shields.io/packagist/dm/joshtronic/php-randomdate?style=for-the-badge)](https://packagist.org/packages/joshtronic/php-randomdate)

Random time/date generator fully compatible with PHP's date function.

Compatible with PHP 5.3+.

## Installation

```shell
composer require joshtronic/randomdate
```

## Usage

```php
<?php
$rd = new joshtronic\RandomDate();

// Between the Unix Epoch and now
$rd->date(/* format string, default = 'c' */);

// Between January 1st, 1900 and now
$rd->min('1900-01-01')->date('Y-m-d');

// Between the Unix Epoch and next month
$rd->max('next month')->date('r');

// Between yesterday and tomorrow (at midnight)
$rd->between('yesterday', 'midnight tomorrow')->date('r');

// Reset minimum and maximum to defaults
$rd->reset->date();
```

## Compatibility with PHP functions

By design, this library aims to keep things simple by using the familiar
format string provided by PHP's existing [`date`][php-date] as well as the
extremely powerful [`strtotime`][php-strtotime] for setting the range of dates
used for generation.

[php-date]: https://www.php.net/manual/en/function.date.php
[php-strtotime]: https://www.php.net/manual/en/function.strtotime.php
