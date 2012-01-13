<?php

class IndexTest extends PHPUnit_Framework_TestCase {

    public function testSayHello() {
        $this->expectOutputString('Hello World');
        @include __DIR__ . '/../../source/htdocs/index.php';
    }

    public function testSayHelloToUser() {
        $this->expectOutputString('Hello Edo');
        $_GET['name'] = 'Edo';
        @include __DIR__ . '/../../source/htdocs/index.php';
    }

}
