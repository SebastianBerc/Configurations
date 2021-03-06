<?php

namespace SebastianBerc\Configurations\Contracts;

use SebastianBerc\Configurations\FileObject;

/**
 * Interface ParserInterface
 *
 * @author  Sebastian Berć <sebastian.berc@gmail.com>
 * @package SebastianBerc\Configurations\Contracts
 */
interface ParserInterface
{
    /**
     * Returns contents from given file.
     *
     * @param FileObject $file
     *
     * @return string
     */
    public function getFileContent(FileObject $file);

    /**
     * Parses file into a PHP array.
     *
     * @param FileObject $file.
     *
     * @return array
     */
    public function parse(FileObject $file);
}
