<?php

namespace Contracts;

/**
 * Interface IFileKeeper
 * @package Contracts
 */
interface IFileKeeper {

    /**
     * @param string $filename
     * @param array $params
     * @return mixed
     */
    public function save(string $filename, array $params);

    /**
     * @param string $filename
     * @param array $params
     * @return mixed
     */
    public function get(string $filename, array $params);
}