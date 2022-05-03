<?php

function describeTableTemplate() {
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
    displayTable2($_GET["table"],$fields);
}
function determineTable($arrayTable)
{

    foreach($arrayTable as $value) {
        if(isset($_GET['table'])&&$_GET['table']==$value) {
            $valid=true;

        }
//        $count++;
    }
    if(!isset($_GET['table']))
    {
        $valid=true;
    }
    if($valid) {

    }

    else if(!$valid) {
        echo "404 error do not try to hack this website<br> Your ip address has been determined and blacklisted <br>ip address: " .getUserIpAddr();
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
    return $ip;
}
?>