<?php

namespace Services;

use Contracts\IFileKeeper;

/**
 * Class FileService
 * @package Services
 */
class FileService {

    /**
     * @param IFileKeeper $keeper
     * @param string $filename
     * @param array $params
     * @return bool
     */
    public function saveToFile(IFileKeeper $keeper, string $filename, array $params): bool
    {
        return $keeper->save($filename, $params);
    }

}