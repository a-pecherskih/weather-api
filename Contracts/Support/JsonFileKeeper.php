<?php

namespace Contracts\Support;

use Contracts\IFileKeeper;

/**
 * Class JsonFileKeeper
 * @package Contracts\Support
 */
class JsonFileKeeper implements IFileKeeper
{

    /**
     * @param string $filename
     * @param array $params
     * @return bool
     */
    public function save(string $filename, array $params): bool
    {
        $filename .= '.json';

        $json = @file_get_contents($filename);
        $data = json_decode($json);
        $data[] = $params;

        return (bool)file_put_contents($filename, json_encode($data));
    }

    /**
     * @param string $filename
     * @param array $params
     */
    public function get(string $filename, array $params)
    {
        // TODO: Implement get() method.
    }
}