<?php

namespace Rush\Strategy;

/**
 * Required Jade(https://github.com/kylekatarnls/jade-php)
 */
class Jade implements \Rush\ViewStrategy
{
    /**
     * @param string             $path    Template file path
     * @param array|\ArrayAccess $params  Local template params
     * @param array              $globals Global template params
     * @return string Rendered string
     */
    public function render($path, $params)
    {
        $jade = new \Jade\Jade();
        return $jade->render($path, $params);
    }
}
