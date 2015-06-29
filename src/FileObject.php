<?php

namespace SebastianBerc\Configurations;

use SebastianBerc\Configurations\Exceptions\NotEnoughMemory;

/**
 * Class FileObject
 *
 * @author  Sebastian Berć <sebastian.berc@gmail.com>
 * @package SebastianBerc\Configurations
 */
class FileObject extends \SplFileObject
{
    /**
     * Reads entire file into a string.
     *
     * @return string The read data.
     */
    public function getContents()
    {
        if ((new Memory)->isNotEnoughMemory($this->getSize())) {
            throw new NotEnoughMemory;
        }

        while (!$this->eof()) {
            isset($contents) ? $contents .= $this->fgets() : $contents = $this->fgets();
        }

        return isset($contents) ? $contents : '';
    }
}
