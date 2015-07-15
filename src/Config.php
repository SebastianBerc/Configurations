<?php

namespace SebastianBerc\Configurations;

use Illuminate\Config\Repository;
use SebastianBerc\Configurations\Contracts\ConfigFileInterface;
use SebastianBerc\Configurations\Parsers\ParserManager;

/**
 * Class Config
 *
 * @author  Sebastian Berć <sebastian.berc@gmail.com>
 * @package SebastianBerc\Configurations
 */
class Config extends Repository implements ConfigFileInterface
{
    /**
     * @var \SebastianBerc\Configurations\FilePath
     */
    protected $filePath;

    /**
     * Create the new Config instance.
     *
     * @param array|string|FileObject $source
     */
    public function __construct($source = null)
    {
        if (is_scalar($source)) {
            $this->setPath($source);
            $source = new FileObject($source);
        }

        if ($source instanceof FileObject) {
            $this->setPath($source->getRealPath());
            parent::__construct((new ParserManager)->parse($source));
        }

        if (is_array($source)) {
            parent::__construct($source);
        }
    }

    /**
     * Create the new Config instance.
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
     * @return \SebastianBerc\Configurations\FilePath
     */
    protected function setPath($filePath)
    {
        return $this->filePath = new FilePath($filePath);
    }
}
