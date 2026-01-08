<?php

require_once 'MusicType.php';
require_once 'Exceptions.php';

class Ogg extends MusicType
{
    public function __construct($filename)
    {
        parent::__construct($filename); 
        $extension = pathinfo($this->filename, PATHINFO_EXTENSION);

        if (empty($extension)) {
            throw new UnknownExtensionException("Les fichiers sans extension ne sont pas acceptés.");
        }

        if (strtolower($extension) !== 'ogg') {
            throw new InvalidExtensionException("Fichier Ogg attendu mais ''$extension'' obtenu");
        }
    }
    public function listen()
    {
        $extension = pathinfo($this->filename, PATHINFO_EXTENSION);
        if ($extension !== 'ogg') {
            throw new Exception("Fichier Ogg attendu mais ''$extension'' obtenu");
        }

        return 'Lecture du fichier Ogg '. $this->filename;
    }
}
