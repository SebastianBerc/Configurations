<?php

namespace SebastianBerc\Configurations\Contracts;

/**
 * Interface ConfigFileInterface
 *
 * @author  Sebastian Berć <sebastian.berc@gmail.com>
 * @package SebastianBerc\Configurations\Contracts
 */
interface ConfigFileInterface
{
    public function open($filePath);
}
