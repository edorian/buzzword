<?php

class ByeTest extends PHPUnit_Framework_TestCase {

    public function testSayGoodbye() {
        $this->expectOutputString('Goodbye!');
        @include __DIR__ . '/../../source/htdocs/bye.php';
    }

}

