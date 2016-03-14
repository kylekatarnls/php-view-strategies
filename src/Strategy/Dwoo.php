<?php

// https://github.com/dwoo-project/dwoo/blob/dc2a1c84be4cb70194e318038077835591ab473b/lib/Dwoo/Core.php#L255

namespace Rush\Strategy;

/**
 * Required Dwoo(https://github.com/dwoo-project/dwoo)
 */
class Dwoo implements \Rush\ViewStrategy
{
    /**
     * @param string             $path    Template file path
     * @param array|\ArrayAccess $params  Local template params
     * @param array              $globals Global template params
     * @return string Rendered string
     */
    public function render($path, $params)
    {
        $dwoo = new \Dwoo\Core();
        $dwoo->setCompileDir(__DIR__.'/../../cache');
        $tpl = new \Dwoo\Template\File($path);

        return $dwoo->get($tpl, $params);
    }
}
