<?php

use Symfony\Component\HttpFoundation\Request;

class LeapYearApplicationTest extends PHPUnit_Framework_TestCase {

    public function test2000IsALeapYear() {
        $this->expectOutputString('Yep, this is a leap year!');
        $application = 'leapYearApplication';
        $request = Request::create('/is_leap_year/2000');
        include __DIR__ . '/../../source/htdocs/index.php';
    }

    public function test2004IsALeapYear() {
        $this->expectOutputString('Yep, this is a leap year!');
        $application = 'leapYearApplication';
        $request = Request::create('/is_leap_year/2004');
        include __DIR__ . '/../../source/htdocs/index.php';
    }

    public function test2001IsNotALeapYear() {
        $this->expectOutputString('Nope, this is not a leap year.');
        $application = 'leapYearApplication';
        $request = Request::create('/is_leap_year/2001');
        include __DIR__ . '/../../source/htdocs/index.php';
    }

}
