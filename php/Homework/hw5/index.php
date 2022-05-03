<?php
/**
 * index.php
 *
 * Homework 5
 *
 * @category   Homework
 * @package    Homework 5
 * @author     Mahmoud Chahine <mhchahine2@hawkmail.hfcc.edu>
 * @version    2019.10.29
 * @link       https://cislinux.hfcc.edu/~mhchahine2/cis222/Homework/hw4
 * @see        NetOther, Net_Sample::Net_Sample()
 * @grade
 */
include 'MyFileObject.php';
$pageTitle="Upload files";
include '../../p2/bootstrap/header.php';
$fileObject=new MyFileObject();
echo "<form class=\"form-horizontal\" method='post'>

    <label class=\"control-label col-2\" for=\"fileInput\">
        Enter file link:
    </label>
     <input type=\"text\" class=\"col-5\"  name=\"file\" id=\"fileInput\" placeholder=\"file link\" required>
    <input type = \"submit\" value='submit'/>
    </form>";
echo "<form action = \"\" method = \"POST\" enctype = \"multipart/form-data\">
 <input type = \"file\" name = \"fileToUpload\" />
    <input type = \"submit\"/>";
if(isset($_POST['file'])) {
    $fileObject->setContent($_POST['file']);
    $fileObject->loadFile();
}
if(isset($_FILES['fileToUpload'])) {
    //var_dump($_FILES['fileToUpload']);
    $fileObject->setContent($_FILES['fileToUpload']['tmp_name']);
    $fileObject->setFileName($_FILES['fileToUpload']['name']);
    $fileObject->setType($_FILES['fileToUpload']['size']);
    $fileObject->setSize($_FILES['fileToUpload']['type']);
    echo "<br>".$fileObject->getFileName()."<br>".$fileObject->getType()."<br>".$fileObject->getSize()."<br>";
    $fileObject->loadFile();
    $fileObject->saveFile();
}