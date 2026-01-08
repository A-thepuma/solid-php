<?php

require_once 'MusicReader.php';
require_once 'Mp3.php';
require_once 'Ogg.php';
require_once 'Exceptions.php';

function it($m,$p){
    echo"\033[3",$p?'2m✔︎':'1m✘'.register_shutdown_function(function(){die(1);})," $m\033[0m\n";
}

try {
    $mp3File = 'wannabee.mp3';
    $ogg = new Ogg($mp3File);
    $musicReader = new MusicReader($ogg);
    $musicReader->listen();
} catch(InvalidFileException $e) { 
    it('Exception levée pour Mp3 !== Ogg', $e instanceof InvalidExtensionException);
}
try {
    $oggFile = 'happy.ogg';
    $mp3 = new Mp3($oggFile);
    $musicReader = new MusicReader($mp3);
    $musicReader->listen();
} catch(InvalidFileException $e) {
    it('Exception levée pour Ogg !== Mp3', $e instanceof InvalidExtensionException);
}

try {
    $truncatedFile = 'truncated_file';
    $mp3 = new Mp3($truncatedFile);
    $musicReader = new MusicReader($mp3);
    $musicReader->listen();
} catch(InvalidFileException $e) {
    it('Exception levée pour fichier sans extension', $e instanceof UnknownExtensionException);
}