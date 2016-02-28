<?php

namespace Rush\Test;

use Rush\View;

abstract class TestCase extends \PHPUnit_Framework_TestCase
{
    public static function setUpBeforeClass()
    {
        View::configure([
            'base_path' => '',
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
}
