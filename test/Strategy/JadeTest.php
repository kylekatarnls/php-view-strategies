<?php

namespace Rush\Test\Strategy;

use Rush\View;

class JadeTest extends \Rush\Test\TestCase
{
    public function testRenderMustReturnRenderedString()
    {
        $view = new View('simple.jade');
        $rendered = $view->render(['name' => 'world']);

        $this->assertTrue(is_string($rendered));
        $this->assertEquals($rendered, 'Hello world!');
    }
}
