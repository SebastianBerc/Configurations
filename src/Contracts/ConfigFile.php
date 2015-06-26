<?php

namespace SebastianBerc\Configuration\Contracts;

/**
 * Interface ConfigFile
 *
 * @author  Sebastian Berć <sebastian.berc@gmail.com>
 *
 * @package SebastianBerc\Contracts
 */
interface ConfigFile
{
    public function open($filePath);
}
