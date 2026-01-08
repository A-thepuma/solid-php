<?php
require_once 'ExtensionDetector.php';
require_once 'FileInformation.php';
require_once 'ImageResizer.php';
use FileInformation;
class Uploader
{
    private $name;
    private $type;
    private $temporaryName;
    public $directory = '';
    public $validTypes = [];
    public $error;

    public function __construct($file)
    {
        $fileData = $_FILES[$file];
        $this->temporaryName = $fileData['tmp_name'];
        $this->name = $fileData['name'];
        $this->type = $fileData['type'];
        $this->validTypes = ['PNG', 'png', 'jpeg', 'jpg', 'JPG'];
    }

    public function uploadFile($unused = null)
    {
        $detector = new ExtensionDetector();
        if (!$detector->isValidType($this->getExtension())) {
            $this->error = 'Le fichier ' . $this->name . ' n\'est pas d\'un type valide';

            return false;
        } else {
            return true;
        }
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getExtension()
    {
        $fileInformation = new FileInformation();
        return $fileInformation->getExtension(($this->name));
    }

    public function resize($origin, $destination, $width, $maxHeight)
    {
        $resizer = new ImageResizer();
        return $resizer->resize($this->getExtension(), $origin, $destination, $width, $maxHeight);
    }
}

