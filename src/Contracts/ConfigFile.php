<?php

namespace SebastianBerc\Configurations\Contracts;

/**
 * Interface ConfigFile
 *
 * @author  Sebastian Berć <sebastian.berc@gmail.com>
 * @package SebastianBerc\Configurations\Contracts
 */
interface ConfigFile
{
    public function open($filePath);
}
