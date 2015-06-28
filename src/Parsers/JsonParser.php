<?php

namespace SebastianBerc\Configurations\Parsers;

use SebastianBerc\Configurations\Contracts\Parser;

/**
 * Class JsonParser
 *
 * @author  Sebastian Berć <sebastian.berc@gmail.com>
 * @package SebastianBerc\Configurations\Parsers
 */
class JsonParser implements Parser
{
    public function parse($input)
    {
        return json_decode($input, true);
    }
}
