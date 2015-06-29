<?php

namespace SebastianBerc\Configurations;

use SebastianBerc\Configurations\Exceptions\NotEnoughMemory;

/**
 * Class FileObject
 *
 * @author  Sebastian Berć <sebastian.berc@gmail.com>
 * @package SebastianBerc\Configurations
 */
class FileObject extends \SplFileObject
{
    /**
     * Create a new FileObject instance.
     *
     * @param string|\SplFileObject $source           The file to read or path.
     * @param string                $open_mode        The mode in which to open the file. See fopen() for a list of
     *                                                allowed modes.
     * @param bool                  $use_include_path Whether to search in the include_path for filename.
     * @param resource              $context          A valid context resource created with stream_context_create().
     */
    public function __construct()
    {
        call_user_func_array('parent::__construct', func_get_args());
    }

    /**
     * Reads entire file into a string.
     *
     * @return string The read data.
     */
    public function getContents()
    {
        if ((new Memory)->isNotEnoughMemory($this->getSize())) {
            throw new NotEnoughMemory;
        }

        while (!$this->eof()) {
            isset($contents) ? $contents .= $this->fgets() : $contents = $this->fgets();
        }

        return isset($contents) ? $contents : '';
    }
}
