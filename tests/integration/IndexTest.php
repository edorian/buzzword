<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class IndexTest extends PHPUnit_Framework_TestCase {

    public function testSayHello() {
        $this->expectOutputString('Hello World');
        $request = new Request();
        $response = new Response();
        include __DIR__ . '/../../source/htdocs/index.php';
    }

    public function testSayHelloToUser() {
        $this->expectOutputString('Hello Edo');
        $request = new Request(array('name', 'Edo'));
        $response = new Response();
        $_GET['name'] = 'Edo';
        include __DIR__ . '/../../source/htdocs/index.php';
    }

}
