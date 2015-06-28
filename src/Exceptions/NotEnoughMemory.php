<?php

namespace SebastianBerc\Configurations\Exceptions;

use Exception;

/**
 * Class NotEnoughMemory
 *
 * @author  Sebastian Berć <sebastian.berc@gmail.com>
 * @package SebastianBerc\Configurations\Exceptions
 */
class NotEnoughMemory extends Exception
{
    /**
     * Create the new NotEnoughMemory exception.
     *
     */
    public function __construct()
    {
        parent::__construct("Not enough memory to load the configuration file.");
    }
}
