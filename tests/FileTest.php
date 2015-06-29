<?php

namespace SebastianBerc\Configurations\Tests;

use Mockery as m;
use SebastianBerc\Configurations\Config;
use SebastianBerc\Configurations\FileObject;

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
        $config = (new Config)->open(new FileObject(__DIR__ . '/stubs/config.php'));

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

        ini_set('memory_limit', 11000000);

        (new Config)->open(__DIR__ . '/stubs/config.yml');
    }

    public function testConfigWithInvalidPhpFileSize()
    {
        $this->setExpectedException(\SebastianBerc\Configurations\Exceptions\NotEnoughMemory::class);

        ini_set('memory_limit', 11000000);

        (new Config)->open(__DIR__ . '/stubs/config.php');
    }
}
