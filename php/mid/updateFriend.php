<?php
$pageTitle="Add animal";
include 'headerBootstrap.php';
$formInfo=getFormData();
echo "<div class=\"container\">
    <br>
<form class=\"form-horizontal\" action=\"?update=".$_GET['update']."&page=update&isUpdate=yes\" method='post'>

    <label class=\"control-label col-2\" for=\"TypeInput\">
        Type:
    </label>
    <input type=\"text\" class=\"col-5\" value='$formInfo[0]' name=\"Type\" id=\"TypeInput\"  required>
    <br>
    <label for=\"BreedInput\" class=\"control-label col-2\">
        Breed:
    </label>
    <input type=\"text\" class=\"col-5\" value='$formInfo[1]' name=\"Breed\" id=\"BreedInput\"  required>
    <br>
    
    <label for=\"checkedInInput\" class=\"control-label col-2\">
        Checked in:
    </label>
    <input type=\"date\" name=\"checkin\" value='$formInfo[2]' id=\"checkedInInput\" class=\"col-5\" required>
    <br>
    <label for=\"checkedOutInput\" class=\"control-label col-2\">
        Checked out:
    </label>
    <input type=\"date\" name=\"checkout\" value='$formInfo[3]' id=\"checkedOutInput\" class=\"col-5\" >
    <br>
    <br>
    <input type=\"submit\" class=\"btn btn-primary offset-4\" id=\"submit\" value=\"Submit\">


</form>
</div>
<a href='index.php' class='btn btn-primary'>Go back to home</a>";
if(isset($_GET['isUpdate']) &&$_GET['isUpdate']=='yes') {
    updateFriend();
}
function updateFriend() {
    include '../credential.php';
    $type=$_POST["Type"];
    $breed=$_POST["Breed"];
    $checkedIn=$_POST["checkin"];
    $checkedOut=$_POST["checkout"];
    $stmt=$pdo->prepare("update midterm_animals set animal_type='$type', animal_breed='$breed',
    checked_in='$checkedIn', checked_out='$checkedOut'
where animal_index=".$_GET['update']);
    $stmt->execute([]);
    header("Location: https://cislinux.hfcc.edu/~mhchahine2/cis222/mid/index.php");
    die();
};
function getFormData() {
    include '../credential.php';
    $stmt=$pdo->prepare("Select * from midterm_animals where animal_index=".$_GET['update']);
    $stmt->execute();
    $formInfo=array();
    while($row=$stmt->fetch()) {
        array_push($formInfo, $row['animal_type']);
        array_push($formInfo, $row['animal_breed']);
        array_push($formInfo, $row['checked_in']);
        array_push($formInfo, $row['checked_out']);
    }
    return $formInfo;
}