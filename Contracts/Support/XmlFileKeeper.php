<?php

namespace Contracts\Support;

use Contracts\IFileKeeper;

/**
 * Class XmlFileKeeper
 * @package Contracts\Support
 */
class XmlFileKeeper implements IFileKeeper
{
    /**
     * @param string $filename
     * @param array $params
     * @return bool
     */
    public function save(string $filename, array $params): bool
    {
        $filename .= '.xml';

        $fileContent = @simplexml_load_file($filename);

        if (!empty($fileContent)) {
            $result = $this->addEntryToExist($filename, $fileContent, $params);
        } else {
            $result = $this->createNewFile($filename, $params);
        }

        return (bool)$result;
    }

    /**
     * @param string $filename
     * @param array $params
     */
    public function get(string $filename, array $params)
    {
        // TODO: Implement get() method.
    }

    /**
     * @param string $filename
     * @param \SimpleXMLElement $data
     * @param array $params
     * @return bool|string
     * @throws \Exception
     */
    private function addEntryToExist(string $filename, \SimpleXMLElement $data, array $params)
    {
        $entries = new \SimpleXMLElement($data->asXML());
        $entry = $entries->addChild('entry');

        foreach ($params as $k => $v) {
            $entry->addChild($k, $v);
        }

        $dom = $entries;

        return $dom->asXML($filename);
    }

    /**
     * @param string $filename
     * @param array $params
     * @return false|int
     */
    private function createNewFile(string $filename, array $params)
    {
        $dom = new \DOMDocument('1.0');
        $dom->encoding = 'utf-8';
        $dom->formatOutput = true;
        $entries = $dom->createElement('entries');

        $entry = $dom->createElement('entry');
        foreach ($params as $k => $v) {
            $child = $dom->createElement($k, $v);
            $entry->appendChild($child);
        }

        $entries->appendChild($entry);
        $dom->appendChild($entries);

        return $dom->save($filename);
    }
}