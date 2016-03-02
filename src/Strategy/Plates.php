<?php

namespace Rush\Strategy;

/**
 * Required Plates(https://github.com/thephpleague/plates)
 */
class Plates implements \Rush\ViewStrategy
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
        $templates = new \League\Plates\Engine($info['dirname']);

        return $templates->render($info['filename'], $params);
    }
}
