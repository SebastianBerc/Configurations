<?php

namespace SebastianBerc\Configuration;

use SebastianBerc\Configuration\Exceptions\InvalidFilePath;
use SplFileInfo;

/**
 * Class FilePath
 *
 * @author  Sebastian Berć <sebastian.berc@gmail.com>
 *
 * @package SebastianBerc\Configuration
 */
class FilePath extends SplFileInfo
{
    /**
     * Create the new FilePath instance.
     *
     * @param string $filePath
     *
     * @throws \SebastianBerc\Configuration\Exceptions\InvalidFilePath
     */
    public function __construct($filePath)
    {
        if (!file_exists($filePath)) {
            throw new InvalidFilePath;
        }

        parent::__construct($filePath);
    }
}
