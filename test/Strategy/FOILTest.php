<?php

namespace Rush\Test\Strategy;

use Rush\View;

class FOILTest extends \Rush\Test\TestCase
{
    public function testRenderMustReturnRenderedString()
    {
        $view = new View('simple.foil');
        $this->assertTrue(is_string($view->render()));
    }
}
