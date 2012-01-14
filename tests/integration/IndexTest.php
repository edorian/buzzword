<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class IndexTest extends PHPUnit_Framework_TestCase {

    public function testSayHello() {
        $this->expectOutputString('Hello World');
        $request = Request::create('/index');
        include __DIR__ . '/../../source/htdocs-init.php';
    }

    public function testSayHelloToUser() {
        $this->expectOutputString('Hello Edo');
        $request = Request::create('/index?name=Edo');
        include __DIR__ . '/../../source/htdocs-init.php';
    }

}
