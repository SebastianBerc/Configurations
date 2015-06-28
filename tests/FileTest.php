<?php

namespace SebastianBerc\Configurationss\Tests;

use Mockery as m;
use SebastianBerc\Configurations\Config;

class ExampleTest extends \PHPUnit_Framework_TestCase
{
    public function testConfigFromArray()
    {
        $config = new Config(['test' => 'success']);

        $this->assertInstanceOf(Config::class, $config);
        $this->assertFalse($config->isFromFile());
        $this->assertEquals('success', $config->get('test'));
    }

    public function testConfigFromYamlFile()
    {
        $config = (new Config)->open(__DIR__ . '/stubs/config.yml');

        $this->assertInstanceOf(Config::class, $config);
        $this->assertTrue($config->isFromFile());
        $this->assertEquals('success', $config->get('test'));
    }

    public function testConfigFromJsonFile()
    {
        $config = (new Config)->open(__DIR__ . '/stubs/config.json');

        $this->assertInstanceOf(Config::class, $config);
        $this->assertTrue($config->isFromFile());
        $this->assertEquals('success', $config->get('test'));
    }

    public function testConfigFromPhpFile()
    {
        $config = (new Config)->open(__DIR__ . '/stubs/config.php');

        $this->assertInstanceOf(Config::class, $config);
        $this->assertTrue($config->isFromFile());
        $this->assertEquals('success', $config->get('test'));
    }

    public function testConfigFromSplFileObject()
    {
        $config = (new Config)->open(new \SplFileObject(__DIR__ . '/stubs/config.php'));

        $this->assertInstanceOf(Config::class, $config);
        $this->assertTrue($config->isFromFile());
        $this->assertEquals('success', $config->get('test'));
    }

    public function testConfigWithWrongFilePath()
    {
        $this->setExpectedException(\SebastianBerc\Configurations\Exceptions\InvalidFilePath::class);

        (new Config)->open('wrong/path/to/file');
    }

    public function testConfigWithInvalidFileType()
    {
        $this->setExpectedException(\SebastianBerc\Configurations\Exceptions\InvalidFileExtension::class);

        (new Config)->open(__DIR__ . '/stubs/wrong_config.txt');
    }

    public function testConfigWithInvalidFileSize()
    {
        $this->setExpectedException(\SebastianBerc\Configurations\Exceptions\NotEnoughMemory::class);

        $fileSize = defined('HHVM_VERSION') ? ini_get('memory_limit') : 1 * pow(1024, 4);

        $file = m::mock("SplFileObject", [__DIR__ . '/stubs/config.yml']);
        $file->shouldReceive('getRealPath')->andReturn(__DIR__ . '/stubs/config.yml');
        $file->shouldReceive('getFileInfo')->andReturn(new \SplFileInfo(__DIR__ . '/stubs/config.yml'));
        $file->shouldReceive('getSize')->andReturn($fileSize);

        (new Config)->open($file);
    }

    public function testConfigWithInvalidPhpFileSize()
    {
        $this->setExpectedException(\SebastianBerc\Configurations\Exceptions\NotEnoughMemory::class);

        $fileSize = defined('HHVM_VERSION') ? ini_get('memory_limit') : 1 * pow(1024, 4);

        $file = m::mock("SplFileObject", [__DIR__ . '/stubs/config.php']);
        $file->shouldReceive('getRealPath')->andReturn(__DIR__ . '/stubs/config.php');
        $file->shouldReceive('getFileInfo')->andReturn(new \SplFileInfo(__DIR__ . '/stubs/config.php'));
        $file->shouldReceive('getSize')->andReturn($fileSize);

        (new Config)->open($file);
    }
}
