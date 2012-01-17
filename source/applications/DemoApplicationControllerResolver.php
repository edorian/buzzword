<?php

use Symfony\Component\HttpFoundation\Request; 

class DemoApplicationControllerResolver implements \Symfony\Component\HttpKernel\Controller\ControllerResolverInterface {

    function getController(Request $request) {
        return $request->attributes->get('_controller');
    }
 
    function getArguments(Request $request, $controller) {
        return array($request);
    }

}
