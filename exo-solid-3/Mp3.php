<?php

require_once 'MusicType.php';
require_once 'Exceptions.php';

class Mp3 extends MusicType
{
    public function __construct($filename){
        parent::__construct($filename);

        $extension = pathinfo($this->filename, PATHINFO_EXTENSION);

        if (empty($extension)) {
            throw new UnknownExtensionException("Le fichier n'a pas d'extension.");
        }

        if (strtolower($extension) !== 'mp3') {
            throw new InvalidExtensionException("Fichier Mp3 attendu mais '$extension' obtenu");
        }
    }
    public function listen()
    {
        $extension = pathinfo($this->filename, PATHINFO_EXTENSION);
        if ($extension !== 'mp3') {
            throw new Exception("Fichier Mp3 attendu mais ''$extension'' obtenu");
        }

        return 'Lecture du fichier Mp3 '. $this->filename;
    }
}
