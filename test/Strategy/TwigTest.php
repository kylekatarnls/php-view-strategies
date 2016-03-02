<?php

namespace Rush\Test\Strategy;

use Rush\View;

class TwigTest extends \Rush\Test\TestCase
{
    public function testRenderMustReturnRenderedString()
    {
        $view = new View('simple.twig');
        $this->assertTrue(is_string($view->render()));
    }

    public function testRenderMustEmbedVariable()
    {
        $view = new View('simple.twig');
        $rendered = $view->render(['name' => 'world']);
        $this->assertEquals($rendered, 'Hello world!');
    }
}
