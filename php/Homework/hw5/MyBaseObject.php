<?php
class MyBaseObject {
    private $content;
    private $type;
    private $size;

    function getContent() {
        return $this->content;
    }
    function setContent($content) {
        $this->content=file_get_contents($content);
    }
    function getType() {
        return $this->type;
    }
    function setType($type) {
        $this->type=$type;
    }
    function setSize($size) {
        $this->size=$size;
    }
    function getSize() {
        return $this->size;
    }

}