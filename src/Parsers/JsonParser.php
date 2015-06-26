<?php

namespace SebastianBerc\Configuration\Parsers;

use SebastianBerc\Configuration\Contracts\Parser;

/**
 * Class JsonParser
 *
 * @author  Sebastian Berć <sebastian.berc@gmail.com>
 *
 * @package SebastianBerc\Configuration\Parsers
 */
class JsonParser implements Parser
{
    public function parse($input)
    {
        return json_decode($input);
    }
}
