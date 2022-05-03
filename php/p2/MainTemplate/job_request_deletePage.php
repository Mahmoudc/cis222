<?php
$pageTitle="Delete";
include ('bootstrap/header.php');
echo "<center><h1>Are you sure you want to delete index ".$_GET['delete']."</h1></center>";
echo "<center><a href='?delete=".$_GET['delete']."&page=jobRequest&request=delete&confirm=yes' class='btn btn-primary'>Yes</a></center>";
if(isset($_GET['confirm'])&&$_GET['confirm']=='yes'){
    include '../../credential.php';
    $stmt=$pdo->prepare("Delete from user_job_request where request_id=".$_GET['delete']);
    $stmt->execute();
    header("Location: https://cislinux.hfcc.edu/~mhchahine2/cis222/p2?page=jobRequest&request=home");
    die();

}
echo "<a href='?page=jobRequest&request=home' class='btn btn-primary'>Go back to home</a>";