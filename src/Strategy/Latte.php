<?php

// https://github.com/nette/latte/blob/1f733950b9d837aed086c7a8e1127df7e0659a0c/src/Latte/Engine.php#L350

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
