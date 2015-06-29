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
     * @return int
     */
    public function getFreeMemory()
    {
        $limit  = ini_get('memory_limit');
        $units  = ['B' => 0, 'K' => 1, 'M' => 2, 'G' => 3, 'T' => 4];
        $unit   = strtoupper(trim(substr($limit, -1)));
        $memory = trim(substr($limit, 0, strlen($limit) - 1));
        $memory = !is_numeric($unit) ? $memory * pow(1024, $units[$unit]) : $memory;

        return $memory - $this->getUsageMemory();
    }

    /**
     * Returns usage memory for PHP.
     *
     * @return int
     */
    public function getUsageMemory()
    {
        return memory_get_usage();
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
