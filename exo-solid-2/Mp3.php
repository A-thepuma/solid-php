<?php
require_once 'AudioFormat.php';
class Mp3 implements AudioFormat
{
    private $filename;

    public function __construct($filename)
    {
        $this->filename = $filename;
    }

    public function listen()
    {
        return 'Lecture du fichier Mp3 '. $this->filename;
    }
}
