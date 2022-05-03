<?php

function describeTableTemplate()
{
//    $stmt=$pdo->prepare("select * from" . $_GET['table']);
    include '../../../credential.php';
    $stmt = $pdo->prepare("SHOW TABLES");
    $stmt->execute([]);
    $tables = array();
    while ($row = $stmt->fetch()) {
        array_push($tables, $row["Tables_in_mhchahine2"]);
    }
$valid=determineTable($tables);
if ($valid) {
        $stmt = $pdo->prepare("DESCRIBE " . $_GET['table']);
        $stmt->execute([]);
//    var_dump($stmt);
        //I know it should've probably been a class that has this array fields and the object would be a list of those array fields
        $fields = array();
        $types = array();
        $nulls = array();
        $keys = array();
        $extras = array();
//need to find the the number of values that speperates each column
        $count = 0;
        while ($row = $stmt->fetch()) {
            //echo $row["Field"]. " ". $row["Type"]. " ". $row["Null"]. " ". $row["Key"]. " ".$row["Extra"]."<br>";
            //$fields[$row['Field']]=array();
            array_push($fields, $row['Field']);
            array_push($types, $row['Type']);
            array_push($nulls, $row['Null']);
            array_push($keys, $row['Key']);
            array_push($extras, $row['Extra']);
            $count++;
            // var_dump($row);
        }
//        var_dump($fields);
//        for ($i = 0; $i < sizeof($fields); $i++) {
//            echo $fields[$i] . "<br>";
//
//        }
        displayDescribeTable($_GET["table"], $fields, $types, $nulls, $extras, $keys);
    }
else {
    getUserIpAddr();
}
}
function determineTable($tables)
{

    $valid =false;

    foreach($tables as $value) {
        if($_GET['table']==$value)
        {
            $valid=true;
        }
    }
    return $valid;
}
//I used this cool function from this website https://www.codexworld.com/how-to/get-user-ip-address-php/
function getUserIpAddr(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    echo "Your ip address has been determined and black listed due to attempts to hack this website<br>Ip address: ".$ip;
    return $ip;
}
?>