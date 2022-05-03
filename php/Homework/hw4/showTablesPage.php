<?php
$pageTitle="Home";

include '../../../credential.php';
include '../../p2/bootstrap/header.php';
include 'showTableTemplate.php';

$qty="SHOW TABLES;";
//needs to be fixed
$stmt=$pdo->query($qty);

//$result = $stmt->fetchAll();
//foreach($result as $value) {
//    echo $value."";
//}
$count=0;
$tables=array();
while ($row = $stmt->fetch())
{
    array_push($tables, $row['Tables_in_mhchahine2']);
//    echo $row['Tables_in_mhchahine2'] . "<br>";
}
displayTable($tables);
