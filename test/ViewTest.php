<?php

namespace Rush\Test;

use Rush\View;

class ViewTest extends TestCase
{
    public function setUp()
    {
        View::configure([
            'base_path' => '',
            'default_extension' => '',
            'strategies' => [],
        ]);
    }

    public function testConfigureMustSetBasePathToProperty()
    {
        $path = '/path/to/templates';
        View::configure(['base_path' => $path]);

        $ref = new \ReflectionClass('\Rush\View');
        $this->assertEquals($ref->getStaticProperties()['basePath'], $path);
    }

    public function testConfigureMustSetDefaultExtensionToProperty()
    {
        $ext = 'php';
        View::configure(['default_extension' => $ext]);

        $ref = new \ReflectionClass('\Rush\View');
        $this->assertEquals($ref->getStaticProperties()['defaultExtension'], $ext);
    }

    public function testConfigureMustSetStrategiesToInstanciatedObject()
    {
        $strategies = ['php' => '\Rush\Strategy\Plates'];
        $expected = ['php' => new \Rush\Strategy\Plates()];
        View::configure(['strategies' => $strategies]);

        $ref = new \ReflectionClass('\Rush\View');
        $this->assertEquals($ref->getStaticProperties()['strategies'], $expected);
    }

    public function testConfigureMustClearStrategiesIfSpecified()
    {
        $strategies = ['php' => '\Rush\Strategy\Plates'];
        View::configure(['strategies' => $strategies]);

        $strategies = ['twig' => '\Rush\Strategy\Twig'];
        $expected = ['twig' => new \Rush\Strategy\Twig()];
        View::configure(['strategies' => $strategies]);

        $ref = new \ReflectionClass('\Rush\View');
        $this->assertEquals($ref->getStaticProperties()['strategies'], $expected);
    }

    public function testConfigureMustNotRaiseNoticeWithoutBasePath()
    {
        View::configure([
            'default_extension' => 'php',
            'strategies' => [],
        ]);
    }

    public function testConfigureMustNotRaiseNoticeWithoutDefaultExtension()
    {
        View::configure([
            'base_path' => '/path/to/templates',
            'strategies' => [],
        ]);
    }

    public function testConfigureMustNotRaiseNoticeWithoutStrategies()
    {
        View::configure([
            'base_path' => '/path/to/templates',
            'default_extension' => 'php',
        ]);
    }

    public function testAddStrategyMustSetProperty()
    {
        $ext = 'twig';
        $strategy = new \Rush\Strategy\Twig();
        View::addStrategy($ext, $strategy);

        $ref = new \ReflectionClass('\Rush\View');
        $this->assertTrue(isset($ref->getStaticProperties()['strategies'][$ext]));
        $this->assertEquals($ref->getStaticProperties()['strategies'][$ext], $strategy);
    }

    public function testConstructor()
    {

    }

    public function testRender()
    {

    }

    public function testGetStrategy()
    {

    }

    public function testGetExtension()
    {

    }

    public function testGetAbsolutePathMustReturnRealPathIfExists()
    {
        $base = implode(DIRECTORY_SEPARATOR, [__DIR__, 'templates']);
        $name = 'simple.php';
        $expected = implode(DIRECTORY_SEPARATOR, [$base, $name]);

        View::configure([
            'base_path' => $base,
            'strategies' => ['php' => '\Rush\Strategy\Plates'],
        ]);

        $view = new View($name);
        $method = $this->getMethodReflection(get_class($view), 'getAbsolutePath');
        $this->assertEquals($method->invokeArgs($view, [$name]), $expected);
    }

    public function testGetAbsolutePathMustThrowExceptionIfPathNotExists()
    {
        $base = implode(DIRECTORY_SEPARATOR, [__DIR__, 'xxx/yyy/zzz']);
        $name = 'xxx.php';
        $expected = implode(DIRECTORY_SEPARATOR, [$base, $name]);

        View::configure([
            'base_path' => $base,
            'strategies' => ['php' => '\Rush\Strategy\Plates'],
        ]);

        $this->setExpectedException('\Exception');
        $view = new View($name);
    }
}
