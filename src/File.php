<?php

namespace SebastianBerc\Configuration;

use Illuminate\Config\Repository;
use SebastianBerc\Configuration\Contracts\ConfigFile;
use SebastianBerc\Configuration\Parsers\ParserManager;

/**
 * Class File
 *
 * @author  Sebastian Berć <sebastian.berc@gmail.com>
 *
 * @package SebastianBerc\Configuration
 */
class File extends Repository implements ConfigFile
{
    /**
     * @var \SebastianBerc\Configuration\FilePath
     */
    protected $filePath;

    /**
     * Create the new File instance.
     *
     * @param array|string $source
     */
    public function __construct($source = null)
    {
        if (is_scalar($source)) {
            $this->setPath($source);
            parent::__construct((new ParserManager())->parse(new \SplFileObject($source)));
        }

        if (is_array($source)) {
            parent::__construct($source);
        }
    }

    /**
     * Create the new File instance.
     *
     * @param string $filePath
     *
     * @return static
     */
    public function open($filePath)
    {
        return new static($filePath);
    }

    /**
     * Checks if configuration comes from file.
     *
     * @return bool
     */
    public function isFromFile()
    {
        return isset($this->filePath);
    }

    /**
     * Sets the path to the file from which configuration comes.
     *
     * @param string $filePath
     *
     * @return \SebastianBerc\Configuration\FilePath
     */
    protected function setPath($filePath)
    {
        return $this->filePath = new FilePath($filePath);
    }
}
