<?php

namespace SebastianBerc\Configurations\Parsers;

use SebastianBerc\Configurations\Exceptions\InvalidFileExtension;
use SebastianBerc\Configurations\FileObject;

/**
 * Class ParserManager
 *
 * @author  Sebastian Berć <sebastian.berc@gmail.com>
 * @package SebastianBerc\Configurations\Parsers
 */
class ParserManager
{
    /**
     * Contains possible file extensions.
     *
     * @var array
     */
    protected $extensions = [
        'yaml' => ['yml', 'yaml'],
        'json' => ['json', 'js'],
        'php'  => ['php', 'php3', 'php4', 'php5', 'phtml']
    ];

    /**
     * Parse different files to php array.
     *
     * @param FileObject $file
     *
     * @return array
     */
    public function parse(FileObject $file)
    {
        $parser = $this->getParserFor($file->getFileInfo()->getExtension());

        return $parser->parse($file);
    }

    /**
     * Returns parser for given configuration file extension.
     *
     * @param string $extension
     *
     * @return \SebastianBerc\Configurations\Contracts\ParserInterface
     * @throws \SebastianBerc\Configurations\Exceptions\InvalidFileExtension
     */
    public function getParserFor($extension)
    {
        switch (true) {
            case in_array($extension, $this->extensions['yaml']):
                return new YamlParser();
            case in_array($extension, $this->extensions['json']):
                return new JsonParser();
            case in_array($extension, $this->extensions['php']):
                return new PhpParser();
            default:
                throw new InvalidFileExtension;
        }
    }
}
