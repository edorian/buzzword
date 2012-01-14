<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class IndexTest extends PHPUnit_Framework_TestCase {

    public function testSayHello() {
        $request = Request::create('/index');
        $response = new Response();
        include __DIR__ . '/../../source/pages/index.php';
        $this->assertSame(
            'Hello World',
            $response->getContent()
        );
    }

    public function testSayHelloToUser() {
        $request = Request::create('/index?name=Edo');
        $response = new Response();
        include __DIR__ . '/../../source/pages/index.php';
        $this->assertSame(
            'Hello Edo',
            $response->getContent()
        );
    }

}
