<?php

namespace Buzzword;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\HttpKernel\Controller\ControllerResolverInterface;

class Framework
{
    protected $matcher;
    protected $resolver;
 
    public function __construct(UrlMatcher $matcher, ControllerResolverInterface $resolver)
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
            // Legacy support moves into htdocs/index.php
            $controller = $this->resolver->getController($request);
            $arguments = $this->resolver->getArguments($request, $controller);

            return call_user_func_array($controller, $arguments);
        } catch (ResourceNotFoundException $e) {
            return new Response('Not Found', 404);
        } catch (\Exception $e) {
            return new Response('An error occurred: ' . $e->getMessage(), 500);
        }
    }
}

