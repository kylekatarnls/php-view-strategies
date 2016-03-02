<?php

namespace Rush\Strategy;

/**
 * Required FOIL(https://github.com/FoilPHP/Foil)
 */
class FOIL implements \Rush\ViewStrategy
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
        $engine = \Foil\engine([
            'folders' => [$info['dirname']],
        ]);

        return $engine->render($info['basename'], $params);
    }
}
