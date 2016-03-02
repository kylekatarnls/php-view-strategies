<?php

namespace Rush\Test\Strategy;

use Rush\View;

class LatteTest extends \Rush\Test\TestCase
{
    public function testRenderMustReturnRenderedString()
    {
        $view = new View('simple.latte');
        $rendered = $view->render(['name' => 'world']);

        $this->assertTrue(is_string($rendered));
        $this->assertEquals($rendered, 'Hello world!');
    }
}
