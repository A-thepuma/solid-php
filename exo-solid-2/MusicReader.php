<?php

// Si on doit supporter un nouveau type de format, on doit modifier cette classe :(
require_once 'Mp3.php';
require_once 'Ogg.php';

class MusicReader
{
    private $audio;

    public function __construct(AudioFormat $audio) 
    {
        $this->audio = $audio;
    }

    public function listen()
    {
        return $this->audio->listen();
    }
}