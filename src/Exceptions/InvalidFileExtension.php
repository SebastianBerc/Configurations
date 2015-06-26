<?php

namespace SebastianBerc\Configuration\Exceptions;

use Exception;

/**
 * Class InvalidFileExtension
 *
 * @author  Sebastian Berć <sebastian.berc@gmail.com>
 *
 * @package SebastianBerc\Configuration\Exceptions
 */
class InvalidFileExtension extends Exception
{
    /**
     * Create the new InvalidFileExtension exception.
     *
     */
    public function __construct()
    {
        parent::__construct("The path to the file is incorrect, or the file does't exist.");
    }
}
