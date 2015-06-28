<?php

namespace SebastianBerc\Configurations\Parsers;

use SebastianBerc\Configurations\Contracts\Parser;
use SebastianBerc\Configurations\Exceptions\NotEnoughMemory;
use SebastianBerc\Configurations\Memory;
use SplFileObject;

/**
 * Class PhpParser
 *
 * @author  Sebastian Berć <sebastian.berc@gmail.com>
 * @package SebastianBerc\Configurations\Parsers
 */
class PhpParser implements Parser
{
    /**
     * Returns contents from give PHP file.
     *
     * @param \SplFileObject $file
     *
     * @return string
     * @throws \SebastianBerc\Configurations\Exceptions\NotEnoughMemory
     */
    public function getFileContent(SplFileObject $file)
    {
        if ((new Memory)->isNotEnoughMemory($file->getSize())) {
            throw new NotEnoughMemory;
        }

        return include $file->getRealPath();
    }

    /**
     * @param string $input
     *
     * @return string
     */
    public function parse($input)
    {
        return $input;
    }
}
