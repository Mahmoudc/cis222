<?php
include 'MyBaseObject.php';
class MyFileObject extends MyBaseObject {
    private $filename;
    public function getFileName() {
        return $this->filename;
    }
    public function setFileName($fileName) {
        $this->filename=$fileName;
    }
    public function saveFile() {
        $myfile = fopen("files/".$this->getFileName(), "w");
        //var_dump($_FILES['fileToUpload']);,
        fwrite($myfile,$this->getContent());
        fclose($myfile);
    }
    public function loadFile() {
        echo $this->getContent();
    }
}