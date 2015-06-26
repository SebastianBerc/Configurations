<?php

namespace SebastianBerc\Configuration\Parsers;

use SebastianBerc\Configuration\Contracts\Parser;

/**
 * Class PhpParser
 *
 * @author  Sebastian Berć <sebastian.berc@gmail.com>
 *
 * @package SebastianBerc\Configuration\Parsers
 */
class PhpParser implements Parser
{
    public function parse($input)
    {
        return $input;
    }
}
