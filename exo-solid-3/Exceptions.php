<?php
// La classe parente
class InvalidFileException extends \Exception {}

// Les classes enfants
class InvalidExtensionException extends InvalidFileException {}
class UnknownExtensionException extends InvalidFileException {}