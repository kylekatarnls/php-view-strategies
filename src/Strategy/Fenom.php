<?php

namespace Rush\Strategy;

/**
 * Required Fenom(https://github.com/fenom-template/fenom)
 */
class Fenom implements \Rush\ViewStrategy
{
    /**
     * @param string             $path    Template file path
     * @param array|\ArrayAccess $params  Local template params
     * @param array              $globals Global template params
     * @return string Rendered string
     */
    public function render($path, $params)
    {
        $info = pathinfO($path);
        $fenom = new \Fenom(new \Fenom\Provider($info['dirname']));

        return $fenom->fetch($info['basename'], $params);
    }
}
