<?php

namespace Rush\Test\Strategy;

use Rush\View;

class PlatesTest extends \Rush\Test\TestCase
{
    public function testRenderMustReturnRenderedString()
    {
        $view = new View('simple.php');
        $rendered = $view->render(['name' => 'world']);

        $this->assertTrue(is_string($rendered));
        $this->assertEquals($rendered, 'Hello world!');
    }
}
