<?php

namespace SebastianBerc\Configurations\Parsers;

use SebastianBerc\Configurations\Exceptions\InvalidFileExtension;
use SebastianBerc\Configurations\Exceptions\NotEnoughMemory;
use SebastianBerc\Configurations\Memory;
use SplFileObject;

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
     * @param \SplFileObject $file
     *
     * @return array
     */
    public function parse(SplFileObject $file)
    {
        $parser = $this->getParserFor($file->getFileInfo()->getExtension());

        $content = method_exists($parser, 'getFileContent')
            ? $parser->getFileContent($file)
            : $this->getFileContent($file);

        return $parser->parse($content);
    }

    /**
     * Returns parser for given configuration file extension.
     *
     * @param string $extension
     *
     * @return \SebastianBerc\Configurations\Contracts\Parser
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

    /**
     * Returns contents from give file.
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

        while ($content = $file->fgets()) {
            isset($contents) ? $contents .= $content : $contents = $content;
        }

        return isset($contents) ? $contents : '';
    }
}
