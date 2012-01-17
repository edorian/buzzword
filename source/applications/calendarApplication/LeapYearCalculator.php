<?php

namespace Calendar;

class LeapYearCalculator {

    public function isLeapYear($year = null) {
        if (null === $year) {
            $year = date('Y');
        }
        return 0 == $year % 400 || (0 == $year % 4 && 0 != $year % 100);
    }
}
