<?php

namespace SebastianBerc\Configurations\Parsers;

use SebastianBerc\Configurations\Contracts\ParserInterface;
use SebastianBerc\Configurations\FileObject;

/**
 * Class JsonParser
 *
 * @author  Sebastian Berć <sebastian.berc@gmail.com>
 * @package SebastianBerc\Configurations\Parsers
 */
class JsonParser implements ParserInterface
{
    /**git
     * Returns contents from given JSON file.
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
     * Parses JSON file into a PHP array.
     *
     * @param FileObject $file .
     *
     * @return array
     */
    public function parse(FileObject $file)
    {
        return json_decode($this->getFileContent($file), true);
    }
}
