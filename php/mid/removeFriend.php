<?php
$pageTitle="Delete";
include 'headerBootstrap.php';
echo "<center><h1>Are you sure you want to delete index ".$_GET['delete']."</h1></center>";
echo "<center><a href='?delete=".$_GET['delete']."&page=delete&confirm=yes' class='btn btn-primary'>Yes</a></center>";
if(isset($_GET['confirm'])&&$_GET['confirm']=='yes'){
    include '../credential.php';
    $stmt=$pdo->prepare("Delete from midterm_animals where animal_index=".$_GET['delete']);
    $stmt->execute();
    header("Location: https://cislinux.hfcc.edu/~mhchahine2/cis222/mid/index.php");
    die();

}
echo "<a href='index.php' class='btn btn-primary'>Go back to home</a>";
?>