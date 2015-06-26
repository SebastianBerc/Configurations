<?php

namespace SebastianBerc\Configuration\Parsers;

use SebastianBerc\Configuration\Contracts\Parser;
use Symfony\Component\Yaml\Yaml;

/**
 * Class YamlParser
 *
 * @author  Sebastian Berć <sebastian.berc@gmail.com>
 *
 * @package SebastianBerc\Configuration\Parsers
 */
class YamlParser implements Parser
{
    /**
     * @param $input
     *
     * @return array
     */
    public function parse($input)
    {
        return (new Yaml())->parse($input);
    }
}
