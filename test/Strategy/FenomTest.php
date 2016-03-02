<?php

namespace Rush\Test\Strategy;

use Rush\View;

class FenomTest extends \Rush\Test\TestCase
{
    public function testRenderMustEmbedVariable()
    {
        $view = new View('simple.fenom');
        $rendered = $view->render(['name' => 'world']);

        $this->assertTrue(is_string($rendered));
        $this->assertEquals($rendered, 'Hello world!');
    }
}
