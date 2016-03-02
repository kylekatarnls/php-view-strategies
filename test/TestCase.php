<?php

namespace Rush\Test;

use Rush\View;

abstract class TestCase extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        View::configure([
            'base_path' => __DIR__.'/templates',
            'strategies' => [
                'dwoo'  => '\\Rush\\Strategy\\Dwoo',
                'foil'  => '\\Rush\\Strategy\\FOIL',
                'fenom' => '\\Rush\\Strategy\\Fenom',
                'jade'  => '\\Rush\\Strategy\\Jade',
                'latte' => '\\Rush\\Strategy\\Latte',
                'php'   => '\\Rush\\Strategy\\Plates',
                'tpl'   => '\\Rush\\Strategy\\Smarty',
                'twig'  => '\\Rush\\Strategy\\Twig',
            ],
        ]);
    }

    protected function getMethodReflection($class_name, $method_name)
    {
        $ref = new \ReflectionClass($class_name);
        $method = $ref->getMethod($method_name);
        $method->setAccessible(true);

        return $method;
    }
}
