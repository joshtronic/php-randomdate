<?php

require_once './src/RandomDate.php';

if (
    !class_exists('\PHPUnit_Framework_TestCase')
    && class_exists('\PHPUnit\Framework\TestCase')
) {
    class_alias('\PHPUnit\Framework\TestCase', '\PHPUnit_Framework_TestCase');
}

class RandomDateTest extends PHPUnit_Framework_TestCase
{
    public function testDate()
    {
        $rd = new joshtronic\RandomDate();
        $this->assertRegExp('/^[0-9]{4}(-[0-9]{2}){2}$/i', $rd->date('Y-m-d'));
    }
}

