<?php

use Symfony\Component\HttpFoundation\Request;

class DemoApplicationTest extends PHPUnit_Framework_TestCase {

    public function testSayHello() {
        $this->expectOutputString('Hello World');
        $request = Request::create('/hello');
        include __DIR__ . '/../../source/htdocs/index.php';
    }

    public function testSayHelloToUser() {
        $this->expectOutputString('Hello Edo');
        $request = Request::create('/hello/Edo');
        include __DIR__ . '/../../source/htdocs/index.php';
    }

    public function testSayGoodbye() {
        $this->expectOutputString("Goodbye!\n\n");
        $request = Request::create('/bye');
        include __DIR__ . '/../../source/htdocs/index.php';
    }

}

