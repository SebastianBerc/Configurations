<?php

namespace SebastianBerc\Configurations;

/**
 * Class Memory
 *
 * @author  Sebastian Berć <sebastian.berc@gmail.com>
 * @package SebastianBerc\Configurationss
 */
class Memory
{
    /**
     * Returns free memory for PHP.
     *
     * @return string
     */
    public function getFreeMemory()
    {
        $limit  = ini_get('memory_limit');
        var_dump($limit);
        $units  = ['B' => 0, 'K' => 1, 'M' => 2, 'G' => 3, 'T' => 4];
        $unit   = strtoupper(trim(substr($limit, -1)));
        $memory = trim(substr($limit, 0, strlen($limit) - 1));

        return !is_numeric($unit) ? $memory * pow(1024, $units[$unit]) : $memory;
    }

    /**
     * Checks if is enough memory.
     *
     * @param int $size
     *
     * @return bool
     */
    public function isEnoughMemory($size)
    {
        return ($size <= $this->getFreeMemory());
    }

    /**
     * Checks if is not enough memory.
     *
     * @param int $size
     *
     * @return bool
     */
    public function isNotEnoughMemory($size)
    {
        return !$this->isEnoughMemory($size);
    }
}
