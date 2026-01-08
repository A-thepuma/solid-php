<?php

require_once 'DatabaseInterface.php';

class JSONClient implements DatabaseInterface
{
    public function fetchAll() : array
    {
        $path = __DIR__ . '/../data/users.json';

        if (!file_exists($path)) {
            return [];
        }

        $fileContent = file_get_contents($path);

        $data = json_decode($fileContent, true);

        return is_array($data) ? $data : [];
    }
}