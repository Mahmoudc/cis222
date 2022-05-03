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
//possible queries
//gets a specified table name https://cislinux.hfcc.edu/~mhchahine2/cis222/Homework/homework2.php?operation=get&tb=test
//insert by passing name and email https://cislinux.hfcc.edu/~mhchahine2/cis222/Homework/homework2.php?operation=insert&name=Chad%20Banks&email=crbanks@hfcc.edu
//Update by passing name https://cislinux.hfcc.edu/~mhchahine2/cis222/Homework/homework2.php?operation=update&name=Mahmoud%20Chahine&email=mahmoud101998@yahoo.com
//Delete by passing a name https://cislinux.hfcc.edu/~mhchahine2/cis222/Homework/homework2.php?operation=delete&name=Chad%20banks
$servername = "localhost";
$username = "mhchahine2";
$password = "dnfj9kd3";
$database = "mhchahine2";


$operationType=$_GET["operation"];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if ($operationType == "create") {
        $table=$_GET["tb"];
        $sql = "create TABLE IF NOT EXISTS ".'table'."(id int NOT NULL AUTO_INCREMENT, name varchar(50), email varchar(100),
primary key(id))";
        $conn->exec($sql);

    }
    else if ($operationType == "insert") {
        $name=$_GET["name"];
        $email=$_GET["email"];
        $sql ="insert into test(name, email) values('$name', '$email')";
        $conn->exec($sql);
    }
    else if($operationType=="update") {
        $name=$_GET["name"];
        $email=$_GET["email"];
        $sql ="update test set email='$email' where name='$name'";
        $conn->exec($sql);
    }
    else if($operationType=="delete") {
        $name=$_GET["name"];
        $sql ="DELETE from test where name='$name'";
        $conn->exec($sql);
    }
    else if($operationType=="get") {
        $table=$_GET["tb"];
        $connect = mysqli_connect($servername, $username, $password, $database);
        $sql = "SELECT * FROM ".$table;
        $result = mysqli_query($connect, $sql);

        $json_array=array();
        while($row=mysqli_fetch_assoc($result))
        {
            $json_array[]=$row;
        }
        echo json_encode($json_array);
    }
}
catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

?>