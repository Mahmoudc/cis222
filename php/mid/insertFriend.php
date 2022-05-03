<?php
$pageTitle="Add animal";
include 'headerBootstrap.php';
echo "<div class=\"container\">
    <br>
<form class=\"form-horizontal\" action=\"?page=add&add=yes\" method='post'>

    <label class=\"control-label col-2\" for=\"TypeInput\">
        Type:
    </label>
    <input type=\"text\" class=\"col-5\"  name=\"Type\" id=\"TypeInput\"  required>
    <br>
    <label for=\"BreedInput\" class=\"control-label col-2\">
        Breed:
    </label>
    <input type=\"text\" class=\"col-5\" name=\"Breed\" id=\"BreedInput\"  required>
    <br>
    
    <label for=\"checkedInInput\" class=\"control-label col-2\">
        Checked in:
    </label>
    <input type=\"date\" name=\"checkin\" id=\"checkedInInput\" class=\"col-5\" required>
    <br>
    <label for=\"checkedOutInput\" class=\"control-label col-2\">
        Checked out:
    </label>
    <input type=\"date\" name=\"checkout\" id=\"checkedOutInput\" class=\"col-5\" >
    <br>
    <br>
    <input type=\"submit\" class=\"btn btn-primary offset-4\" id=\"submit\" value=\"Submit\">


</form>
</div>
<a href='index.php' class='btn btn-primary'>Go back to home</a>";
if(isset($_GET['add']) &&$_GET['add']=='yes') {
    addFriend();
}
function addFriend() {
    include '../credential.php';
    $type=$_POST["Type"];
    $breed=$_POST["Breed"];
    $checkedIn=$_POST["checkin"];
    $checkedOut=$_POST["checkout"];
    $stmt=$pdo->prepare("INSERT INTO midterm_animals(animal_index, animal_type, animal_breed, checked_in, checked_out)
VALUES(NULL, '$type', '$breed','$checkedIn', '$checkedOut')");
    $stmt->execute([]);
    header("Location: https://cislinux.hfcc.edu/~mhchahine2/cis222/mid/index.php");
    die();
};