<?php
    $pageTitle="Home";
    $qty="SHOW TABLES";
    include '../../p1/bootstrap/header.php';
    include 'showTableTemplate.php';
    include 'determineTable.php';
    include '../../credential.php';
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
?>