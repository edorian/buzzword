<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LeapYearController { 

    private $leapYearCalculator;

    // No global / hardcoded dependency in the 'indexAction'
    public function __construct(LeapYearCalculator $leapYearCalculator) {
        $this->leapYearCalculator = $leapYearCalculator;
    }

    public function execute(Request $request) {
        if ($this->leapYearCalculator->isLeapYear($request->attributes->get('year'))) {
            return new Response('Yep, this is a leap year!');
        }
        return new Response('Nope, this is not a leap year.');
    }

}
