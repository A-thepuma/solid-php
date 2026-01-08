<?php
require_once 'AudioFormat.php';
class Ogg implements AudioFormat
{
    private $filename;

    public function __construct($filename)
    {
        $this->filename = $filename;
    }

    public function listen()
    {
        return 'Lecture du fichier Ogg '. $this->filename;
    }
}