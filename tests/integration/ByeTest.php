<?php

use Symfony\Component\HttpFoundation\Response;

class ByeTest extends PHPUnit_Framework_TestCase {

    public function testSayGoodbye() {
        $response = new Response();
        include __DIR__ . '/../../source/pages/bye.php';
        $this->assertSame(
            'Goodbye!',
            $response->getContent()
        );
    }

}

