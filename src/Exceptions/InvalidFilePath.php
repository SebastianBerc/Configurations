<?php

namespace SebastianBerc\Configurations\Exceptions;

use Exception;

/**
 * Class InvalidFilePath
 *
 * @author  Sebastian Berć <sebastian.berc@gmail.com>
 * @package SebastianBerc\Configurations\Exceptions
 */
class InvalidFilePath extends \Exception
{
    /**
     * Create the new InvalidFilePath exception.
     *
     */
    public function __construct()
    {
        parent::__construct("The path to the file is incorrect, or the file does't exist.");
    }
}
