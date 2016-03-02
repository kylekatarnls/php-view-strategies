<?php

namespace Rush\Strategy;

/**
 * Required Twig(https://github.com/twigphp/Twig)
 */
class Twig implements \Rush\ViewStrategy
{
    /**
     * @param string             $path    Template file path
     * @param array|\ArrayAccess $params  Local template params
     * @param array              $globals Global template params
     * @return string Rendered string
     */
    public function render($path, $params)
    {
        $info = pathinfo($path);
        $loader = new \Twig_Loader_Filesystem($info['dirname']);
        $twig = new \Twig_Environment($loader);

        return $twig->render($info['basename'], $params);
    }
}
