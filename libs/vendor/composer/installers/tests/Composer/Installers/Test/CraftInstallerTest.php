<?php

namespace WC_Order_Search_Admin\Composer\Installers\Test;

use Composer\Installers\CraftInstaller;
/**
 * Tests for the CraftInstaller Class
 *
 * @coversDefaultClass Composer\Installers\CraftInstaller
 */
class CraftInstallerTest extends \WC_Order_Search_Admin\Composer\Installers\Test\TestCase
{
    /** @var CraftInstaller */
    private $installer;
    /**
     * Sets up the fixture, for example, instantiate the class-under-test.
     *
     * This method is called before a test is executed.
     */
    public final function setup()
    {
        $this->installer = new \WC_Order_Search_Admin\Composer\Installers\CraftInstaller();
    }
    /**
     * @param string $packageName
     * @param string $expectedName
     *
     * @covers ::inflectPackageVars
     *
     * @dataProvider provideExpectedInflectionResults
     */
    public final function testInflectPackageVars($packageName, $expectedName)
    {
        $installer = $this->installer;
        $vars = array('name' => $packageName);
        $expected = array('name' => $expectedName);
        $actual = $installer->inflectPackageVars($vars);
        $this->assertEquals($actual, $expected);
    }
    /**
     * Provides various names for packages and the expected result after inflection
     *
     * @return array
     */
    public final function provideExpectedInflectionResults()
    {
        return array(
            // lowercase
            array('foo', 'foo'),
            array('craftfoo', 'craftfoo'),
            array('fooplugin', 'fooplugin'),
            array('craftfooplugin', 'craftfooplugin'),
            // lowercase - dash
            array('craft-foo', 'foo'),
            array('foo-plugin', 'foo'),
            array('craft-foo-plugin', 'foo'),
            // lowercase - underscore
            array('craft_foo', 'craft_foo'),
            array('foo_plugin', 'foo_plugin'),
            array('craft_foo_plugin', 'craft_foo_plugin'),
            // CamelCase
            array('Foo', 'Foo'),
            array('CraftFoo', 'CraftFoo'),
            array('FooPlugin', 'FooPlugin'),
            array('CraftFooPlugin', 'CraftFooPlugin'),
            // CamelCase - Dash
            array('Craft-Foo', 'Foo'),
            array('Foo-Plugin', 'Foo'),
            array('Craft-Foo-Plugin', 'Foo'),
            // CamelCase - underscore
            array('Craft_Foo', 'Craft_Foo'),
            array('Foo_Plugin', 'Foo_Plugin'),
            array('Craft_Foo_Plugin', 'Craft_Foo_Plugin'),
        );
    }
}
