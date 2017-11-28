<?php

namespace WC_Order_Search_Admin\Composer\Installers\Test;

use Composer\Installers\BitrixInstaller;
use Composer\Package\PackageInterface;
use Composer\Package\Package;
use Composer\Composer;
/**
 * Tests for the BitrixInstaller Class
 *
 * @coversDefaultClass Composer\Installers\BitrixInstaller
 */
class BitrixInstallerTest extends \WC_Order_Search_Admin\Composer\Installers\Test\TestCase
{
    /** @var BitrixInstaller */
    private $installer;
    /** @var Composer */
    private $composer;
    /**
     * Sets up the fixture, for example, instantiate the class-under-test.
     *
     * This method is called before a test is executed.
     */
    final function setUp()
    {
        $this->composer = new \WC_Order_Search_Admin\Composer\Composer();
    }
    /**
     * @param string $vars
     * @param string $expectedVars
     *
     * @covers ::inflectPackageVars
     *
     * @dataProvider provideExpectedInflectionResults
     */
    public final function testInflectPackageVars($vars, $expectedVars)
    {
        $this->installer = new \WC_Order_Search_Admin\Composer\Installers\BitrixInstaller(new \WC_Order_Search_Admin\Composer\Package\Package($vars['name'], '4.2', '4.2'), $this->composer);
        $actual = $this->installer->inflectPackageVars($vars);
        $this->assertEquals($actual, $expectedVars);
    }
    /**
     * Provides various parameters for packages and the expected result after inflection
     *
     * @return array
     */
    public final function provideExpectedInflectionResults()
    {
        return array(
            //check bitrix-dir is correct
            array(array('name' => 'Nyan/Cat'), array('name' => 'Nyan/Cat', 'bitrix_dir' => 'bitrix')),
            array(array('name' => 'Nyan/Cat', 'bitrix_dir' => 'bitrix'), array('name' => 'Nyan/Cat', 'bitrix_dir' => 'bitrix')),
            array(array('name' => 'Nyan/Cat', 'bitrix_dir' => 'local'), array('name' => 'Nyan/Cat', 'bitrix_dir' => 'local')),
        );
    }
}
