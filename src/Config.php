<?php

namespace SebastianBerc\Configurations;

use Illuminate\Config\Repository;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use SebastianBerc\Configurations\Contracts\ConfigFileInterface;
use SebastianBerc\Configurations\Parsers\ParserManager;

/**
 * Class Config
 *
 * @author  Sebastian Berć <sebastian.berc@gmail.com>
 * @package SebastianBerc\Configurations
 */
class Config extends Repository implements ConfigFileInterface, Arrayable, Jsonable
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

    /**
     * Check if configuration is empty.
     *
     * @return bool
     */
    public function isEmpty()
    {
        return empty($this->items);
    }

    /**
     * Set a given configuration value.
     *
     * @param  array|string $key
     * @param  mixed        $value
     *
     * @return void
     */
    public function set($key, $value = null)
    {
        parent::set($key, $value);
    }

    /**
     * Get the specified configuration value.
     *
     * @param  string $key
     * @param  mixed  $default
     *
     * @return mixed
     */
    public function get($key, $default = null)
    {
        $value = parent::get($key, $default);

        if (is_array($value)) {
            return new static($value);
        }

        return $value;
    }

    /**
     * Get dynamicly the specified configuration value.
     *
     * @param  string $key
     *
     * @return mixed
     */
    public function __get($key)
    {
        return $this->get($key);
    }

    /**
     * Set a given configuration value.
     *
     * @param  array|string $key
     * @param  mixed        $value
     *
     * @return void
     */
    public function __set($key, $value)
    {
        $this->set($key, array_shift($value));
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return $this->items;
    }

    /**
     * Convert the object to its JSON representation.
     *
     * @param  int $options
     *
     * @return string
     */
    public function toJson($options = 0)
    {
        return json_encode($this->toArray(), $options);
    }
}
