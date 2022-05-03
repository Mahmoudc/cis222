<?php
/**
 * contact.php
 *
 * Homework 1
 *
 * @category   Homework
 * @package    Homework 4
 * @author     Mahmoud Chahine <mhchahine2@hawkmail.hfcc.edu>
 * @version    2019.09.05
 * @link       https://cislinux.hfcc.edu/~mhchahine2/cis222/Homework/hw4
 * @see        NetOther, Net_Sample::Net_Sample()
 * @grade      10/10
 */
$pageTitle="Home";
$qty="SHOW TABLES;";
include '../../credential.php';
include '../../p1/bootstrap/header.php';
include 'showTableTemplate.php';
include 'describeTableTemplate.php';
//include 'determineTable.php';
include 'describeValidTable.php';

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

$valid=determineTable($tables);
if($valid && isset($_GET['table'])) {
    $tables=array();
//    $stmt=$pdo->prepare("select * from" . $_GET['table']);
    $stmt=$pdo->prepare("DESCRIBE " .$_GET['table']);
    $stmt->execute([]);
//    var_dump($stmt);
    //I know it should've probably been a class that has this array fields and the object would be a list of those array fields
    $fields =array();
    $types=array();
    $nulls=array();
    $keys=array();
    $extras=array();
//need to find the the number of values that speperates each column
    $count=0;
    while($row =$stmt->fetch())
    {
        //echo $row["Field"]. " ". $row["Type"]. " ". $row["Null"]. " ". $row["Key"]. " ".$row["Extra"]."<br>";
        //$fields[$row['Field']]=array();
        array_push($fields,$row['Field']);
        array_push($types, $row['Type']);
        array_push($nulls, $row['Null']);
        array_push($extras, $row['Key']);
        $count++;
      // var_dump($row);
    }
    var_dump($fields);
    for ($i=0;$i<sizeof($fields);$i++) {
        echo $fields[$i]. "<br>";

    }
    displayDescribeTable($_GET["table"],$fields);

    //echo $fields[0][0];
}
echo sizeof($tables);
