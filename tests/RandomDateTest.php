<?php
namespace joshtronic\Tests;
use joshtronic\RandomDate;
use PHPUnit\Framework\TestCase;

class RandomDateTest extends TestCase
{
    public function testDate()
    {
        if (version_compare(PHP_VERSION, '7.3.0', '>=')) {
            $assertRegExp = 'assertMatchesRegularExpression';
        } else {
            $assertRegExp = 'assertRegExp';
        }

        $rd = new RandomDate();
        $date = $rd->date('Y-m-d');

        $this->$assertRegExp('/^[0-9]{4}(-[0-9]{2}){2}$/i', $date);
    }

    public function testMin()
    {
        $rd = new RandomDate();
        $date = $rd->min('yesterday')->date('Y-m-d');

        $min = date('Y-m-d', strtotime('yesterday'));
        $max = date('Y-m-d', strtotime('today'));

        $this->assertGreaterThanOrEqual($min, $date);
        $this->assertLessThanOrEqual($max, $date);
    }

    public function testMax()
    {
        $rd = new RandomDate();
        $date = $rd->min('5 days ago')->max('4 days ago')->date('Y-m-d');

        $min = date('Y-m-d', strtotime('5 days ago'));
        $max = date('Y-m-d', strtotime('4 days ago'));

        $this->assertGreaterThanOrEqual($min, $date);
        $this->assertLessThanOrEqual($max, $date);
    }

    public function testBetween()
    {
        $rd = new RandomDate();
        $date = $rd->between('7 days ago', '6 days ago')->date('Y-m-d');

        $min = date('Y-m-d', strtotime('7 days ago'));
        $max = date('Y-m-d', strtotime('6 days ago'));

        $this->assertGreaterThanOrEqual($min, $date);
        $this->assertLessThanOrEqual($max, $date);
    }

    public function testReset()
    {
        $rd = new RandomDate();
        $date = $rd->between('+8 days', '+9 days')->date('Y-m-d');
        $date = $rd->reset()->date('Y-m-d');

        $today = date('Y-m-d', strtotime('today'));

        $this->assertLessThanOrEqual($today, $date);
    }
}

