<?php

namespace SebastianBerc\Configurations\Contracts;

/**
 * Interface Parser
 *
 * @author  Sebastian Berć <sebastian.berc@gmail.com>
 * @package SebastianBerc\Configurations\Contracts
 */
interface Parser
{
    /**
     * @param string $input
     *
     * @return array
     */
    public function parse($input);
}
