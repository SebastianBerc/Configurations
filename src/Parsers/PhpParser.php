<?php

namespace SebastianBerc\Configurations\Parsers;

use SebastianBerc\Configurations\Contracts\Parser;
use SebastianBerc\Configurations\Exceptions\NotEnoughMemory;
use SebastianBerc\Configurations\FileObject;
use SebastianBerc\Configurations\Memory;

/**
 * Class PhpParser
 *
 * @author  Sebastian Berć <sebastian.berc@gmail.com>
 * @package SebastianBerc\Configurations\Parsers
 */
class PhpParser implements Parser
{
    /**
     * Returns contents from given PHP file.
     *
     * @param FileObject $file
     *
     * @return string
     * @throws \SebastianBerc\Configurations\Exceptions\NotEnoughMemory
     */
    public function getFileContent(FileObject $file)
    {
        if ((new Memory)->isNotEnoughMemory($file->getSize())) {
            throw new NotEnoughMemory;
        }

        return include $file->getRealPath();
    }

    /**
     * Parses PHP File into a PHP array.
     *
     * @param FileObject $file .
     *
     * @return array
     */
    public function parse(FileObject $file)
    {
        return $this->getFileContent($file);
    }
}
