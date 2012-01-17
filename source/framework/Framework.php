<?php

namespace Buzzword;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;

class Framework
{
    protected $matcher;
    protected $resolver;
 
    public function __construct(UrlMatcher $matcher, ControllerResolver $resolver)
    {
        $this->matcher = $matcher;
        $this->resolver = $resolver;
    }
 
    public function handle(Request $request)
    {
        try {
            // Extract stuff from the request object in matcher and put it back in the request object :)
            $request->attributes->add(
                $this->matcher->match(
                    $request->getPathInfo()
                )
            );
            // The new controllerResolver magic breaks the old functionality
            // So lets modify the framework with application specific code again just to keep things running.
            if($application != 'demoApplication') {
                // Implicit knowleague
                $controller = $resolver->getController($request);
                $arguments = $resolver->getArguments($request, $controller);
            } else {
                $controller = $request->attributes->get('_controller');
                $arguments = array($request);
            }

            return call_user_func_array($controller, $arguments);
        } catch (ResourceNotFoundException $e) {
            return new Response('Not Found', 404);
        } catch (\Exception $e) {
            return new Response('An error occurred: ' . $e->getMessage(), 500);
        }
    }
}

