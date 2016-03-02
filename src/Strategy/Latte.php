<?php

namespace Rush\Strategy;

/**
 * Required Latte(https://github.com/nette/latte)
 */
class Latte implements \Rush\ViewStrategy
{
    /**
     * @param string             $path    Template file path
     * @param array|\ArrayAccess $params  Local template params
     * @param array              $globals Global template params
     * @return string Rendered string
     */
    public function render($path, $params)
    {
        $latte = new \Latte\Engine;
        return $latte->renderToString($path, $params);
    }
}
