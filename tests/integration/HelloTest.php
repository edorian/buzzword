<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HelloTest extends PHPUnit_Framework_TestCase {

    public function testSayHello() {
        $request = Request::create('/index');
        $response = new Response();
        include __DIR__ . '/../../source/pages/hello.php';
        $this->assertSame(
            'Hello World',
            $response->getContent()
        );
    }

    public function testSayHelloToUser() {
        $request = Request::create('/index?name=Edo');
        $response = new Response();
        include __DIR__ . '/../../source/pages/hello.php';
        $this->assertSame(
            'Hello Edo',
            $response->getContent()
        );
    }

}
