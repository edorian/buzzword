<?php

use Symfony\Component\Routing;
use Symfony\Component\HttpFoundation\Response;

// Manual loaind for now
require_once __DIR__ . '/leapYearApplication/LeapYearController.php';

$routes = new Routing\RouteCollection();
$routes->add(
    'leap_year', 
    new Routing\Route(
        '/is_leap_year/{year}', 
        array(
            'year' => null,
            '_controller' => array(new LeapYearController(), 'execute')
        )
    )
);

// Testing hack until he have the stuff refactored away
if(!function_exists('is_leap_year')) {
    function is_leap_year($year = null) {
        if (null === $year) {
          $year = date('Y');
        }
        return 0 == $year % 400 || (0 == $year % 4 && 0 != $year % 100);
    }
}

return $routes;
