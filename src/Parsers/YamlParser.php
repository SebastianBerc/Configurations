<?php

namespace SebastianBerc\Configurations\Parsers;

use SebastianBerc\Configurations\Contracts\Parser;
use Symfony\Component\Yaml\Yaml;

/**
 * Class YamlParser
 *
 * @author  Sebastian Berć <sebastian.berc@gmail.com>
 * @package SebastianBerc\Configurations\Parsers
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
