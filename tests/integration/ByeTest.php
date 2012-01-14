<?php

use Symfony\Component\HttpFoundation\Request;

class ByeTest extends PHPUnit_Framework_TestCase {

    public function testSayGoodbye() {
        $this->expectOutputString('Goodbye!');
        $request = Request::create('/bye');
        include __DIR__ . '/../../source/htdocs-init.php';
    }

}

