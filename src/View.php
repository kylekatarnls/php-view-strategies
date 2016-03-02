<?php

namespace Rush;

class View
{
    /**
     * @var string
     */
    private static $basePath = '';

    /**
     * @var string
     */
    private static $defaultExtension = '';

    /**
     * @var array
     */
    private static $strategies = [];

    /**
     * @var string
     */
    private $name;

    /**
     * @var ViewStrategy
     */
    private $strategy;

    /**
     *
     * Available key list
     *
     * - `base_path`:
     * - `default_extension`:
     * - `strategies`: See addStrategy method
     *
     * @see addStrategy
     * @param array $config
     */
    public static function configure(array $config)
    {
        if (isset($config['base_path'])) {
            self::$basePath = $config['base_path'];
        }

        if (isset($config['default_extension'])) {
            self::$defaultExtension = $config['default_extension'];
        }

        if (isset($config['strategies'])) {
            if (!is_array($config['strategies'])) {
                $config['strategies'] = [];
            }

            self::$strategies = [];
            foreach ($config['strategies'] as $extension => $strategy_class) {
                self::addStrategy($extension, new $strategy_class);
            }
        }
    }

    /**
     * @param string $extension
     * @param ViewStrategy $strategy
     */
    public static function addStrategy($extension, ViewStrategy $strategy)
    {
        self::$strategies[$extension] = $strategy;
    }

    /**
     * @param string $name
     */
    public function __construct($name)
    {
        $extension = $this->getExtension($name);
        $this->strategy = $this->getStrategy($extension);
        $this->name = $name;
    }

    /**
     * @param array|\ArrayAccess $params
     * @return string Rendered string
     */
    public function render($params = [])
    {
        $path = $this->getAbsolutePath($this->name);
        return $this->strategy->render($path, $params);
    }

    /**
     * @param string $extension Extension of template file
     * @return ViewStrategy One of strategy
     */
    private function getStrategy($extension)
    {
        $strategies = self::$strategies;
        if (!isset($strategies[$extension])) {
            throw new \Exception("Unsupported extension {$extension}");
        }

        return $strategies[$extension];
    }

    /**
     * @param string $name Template file name
     * @return string Extension of template file
     */
    private function getExtension($name)
    {
        $path = $this->getAbsolutePath($name);
        return pathinfo($path, PATHINFO_EXTENSION);
    }

    /**
     * @param string $name Template file name
     * @return string Absolute
     */
    private function getAbsolutePath($name)
    {
        if (strpos($name, '.') === false) {
            $name .= self::$defaultExtension;
        }

        $path = implode(DIRECTORY_SEPARATOR, [self::$basePath, $name]);
        $realpath = realpath($path);
        if ($realpath === false) {
            throw new \Exception('File not found: '.$path);
        }

        return $realpath;
    }
}
