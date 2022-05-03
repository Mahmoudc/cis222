<?php
include "MyHTMLObject.php";
//$myHtmlObjects=array();
//for($x=0;$x<1000;$x++) {
//    $temp=new MyHTMLObject();
//    $tem
//}
//$htmlObject=new MyHTMLObject();
//var_dump();
$mySite=new MyHTMLObject();
$mySite->setTitle("hello");
$mySite->render();