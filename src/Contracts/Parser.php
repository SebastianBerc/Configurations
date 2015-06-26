<?php

namespace SebastianBerc\Configuration\Contracts;

/**
 * Interface Parser
 *
 * @author  Sebastian Berć <sebastian.berc@gmail.com>
 *
 * @package SebastianBerc\Configuration\Contracts
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
