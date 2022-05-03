<?php
//I did this cause putty wasn't working at home I know this is not secure at all
$pageTitle="php admin";
include 'p2/bootstrap/header.php';

?>
<form method="post">
    <textarea class="col-8" rows="8" name="sql"></textarea>
    <br><br>

    <input type="submit" class="btn btn-primary offset-4" id="submit" value="Submit">
</form>
<?php
include 'credential.php';
if(isset($_POST['sql'])) {
    $sql = $_POST['sql'];
    $pdo->query($sql);
    echo "success";
}
