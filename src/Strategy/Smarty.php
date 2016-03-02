<?php

namespace Rush\Strategy;

/**
 * Required Smarty(https://github.com/smarty-php/smarty)
 */
class Smarty implements \Rush\ViewStrategy
{
    /**
     * @param string             $path    Template file path
     * @param array|\ArrayAccess $params  Local template params
     * @param array              $globals Global template params
     * @return string Rendered string
     */
    public function render($path, $params)
    {
        $smarty = new \Smarty();
        return $smarty->fetch($path, $params);
    }
}
