<?php

namespace SebastianBerc\Configurations\Parsers;

use SebastianBerc\Configurations\Contracts\Parser;
use SebastianBerc\Configurations\FileObject;
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
     * Returns contents from given YAML file.
     *
     * @param FileObject $file
     *
     * @return string
     * @throws \SebastianBerc\Configurations\Exceptions\NotEnoughMemory
     */
    public function getFileContent(FileObject $file)
    {
        return $file->getContents();
    }

    /**
     * Parses YAML file into a PHP array.
     *
     * @param FileObject $file .
     *
     * @return array
     */
    public function parse(FileObject $file)
    {
        return (new Yaml())->parse($this->getFileContent($file));
    }
}
