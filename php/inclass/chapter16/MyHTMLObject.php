<?php
class MyHTMLObject {
    public $ObjectNumber;
    private $title="hello";
    function sayHello() {
        echo "I am site object #";
    }
    function setTitle($title) {
        $this->title=$title;
    }
    function render() {
        echo"
        <!DOCTYPE html>
        <html>
        <head>
            <title>".$this->title."</title>
        </head>
        <body>
            <h1>Hello World!</h1>
        </body>
        </html>
    ";
    }
}
?>