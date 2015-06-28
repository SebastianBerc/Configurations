<?php

namespace SebastianBerc\Configuration\Parsers;

use SebastianBerc\Configuration\Exceptions\InvalidFileExtension;
use SebastianBerc\Configuration\Exceptions\NotEnoughMemory;
use SplFileObject;

/**
 * Class ParserManager
 *
 * @author  Sebastian Berć <sebastian.berc@gmail.com>
 *
 * @package SebastianBerc\Configuration\Parsers
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
     * @return \SebastianBerc\Configuration\Contracts\Parser
     * @throws \SebastianBerc\Configuration\Exceptions\InvalidFileExtension
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
        }

        throw new InvalidFileExtension;
    }

    /**
     * Returns contents from give file.
     *
     * @param \SplFileObject $file
     *
     * @return string
     * @throws \SebastianBerc\Configuration\Exceptions\NotEnoughMemory
     */
    public function getFileContent(SplFileObject $file)
    {
        if ($file->getSize() > $this->freeMemory()) {
            throw new NotEnoughMemory;
        }

        while ($content = $file->fgets()) {
            isset($contents) ? $contents .= $content : $contents = $content;
        }

        return isset($contents) ? $contents : '';
    }

    /**
     * Returns free memory for php.
     *
     * @return string
     */
    public function freeMemory()
    {
        $limit  = ini_get('memory_limit');
        $units  = ['B' => 0, 'K' => 1, 'M' => 2, 'G' => 3, 'T' => 4];
        $unit   = strtoupper(trim(substr($limit, -1)));
        $memory = trim(substr($limit, 0, strlen($limit) - 1));

        return $memory * pow(1024, $units[$unit]);
    }
}
