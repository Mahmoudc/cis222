<?php
/**
 * contact.php
 *
 * Homework 1
 *
 * @category   Homework
 * @package    Homework 2
 * @author     Mahmoud Chahine <mhchahine2@hawkmail.hfcc.edu>
 * @version    2019.09.05
 * @link       https://cislinux.hfcc.edu/~mhchahine2/cis222/Homework/homework2.php
 * @see        NetOther, Net_Sample::Net_Sample()
 * @grade      10/10
 */
include '../credential.php';
$qty='SHOW TABLES;';
$stmt=$pdo->query($qty);

//$result = $stmt->fetchAll();
//foreach($result as $value) {
//    echo $value."";
//}
while ($row = $stmt->fetch())
{
    echo $row['Tables_in_mhchahine2'] . "<br>";
}

//var_dump($result);
$stmt=$pdo->prepare('SELECT * FROM `hardware`');
$stmt->execute([]);
$user=$stmt->fetch();
while ($row = $stmt->fetch())
{
    //potentially you can make a table that loads this info
    echo $row['hardware_id'] . " " .$row['notes'] ."<br>";
}
var_dump($user);