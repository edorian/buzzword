<?php

use Symfony\Component\HttpFoundation\Request;

class IndexTest extends PHPUnit_Framework_TestCase {

    public function testSayHello() {
        $this->expectOutputString('Hello World');
        $request = Request::create('/hello');
        include __DIR__ . '/../../source/htdocs/index.php';
    }

    public function testSayHelloToUser() {
        $this->expectOutputString('Hello Edo');
        $request = Request::create('/hello?name=Edo');
        include __DIR__ . '/../../source/htdocs/index.php';
    }

    public function testSayGoodbye() {
        $this->expectOutputString('Goodbye!');
        $request = Request::create('/bye');
        include __DIR__ . '/../../source/htdocs/index.php';
    }

}

