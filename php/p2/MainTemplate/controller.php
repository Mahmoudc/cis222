<?php


if( isset($_GET['option'])&&$_GET['option']==1) {
    confirmation();
}
else if( isset($_GET['option'])&&$_GET['option']==2) {
    registerUser();
}
else if( isset($_GET['option'])&&$_GET['option']==3) {
    $success=login();
    if(!$success) {
        header('Location: https://cislinux.hfcc.edu/~mhchahine2/cis222/p2?page=login&failed=true');
    }
    else if($success) {
        header('Location: https://cislinux.hfcc.edu/~mhchahine2/cis222/p2');
        die;
//        echo "<h2>".$_SESSION['user_id']."</h2>";
    }
}
else if( isset($_GET['option'])&&$_GET['option']==4) {
    addToCart();
}
else if( isset($_GET['option'])&&$_GET['option']==5) {
    removeCart();
}
else if( isset($_GET['option'])&&$_GET['option']==6) {
    preformOrder();
}
else if( isset($_GET['option'])&&$_GET['option']==7) {
    insertRequest();
}
function confirmation() {
    //it shows up as not found but works ??????
    include '../../../credential.php';
    $pageTitle="Confirmation";
    include '../bootstrap/header.php';
    $name=$_POST["Name"];
    $email=$_POST["Email"];
    $phone=$_POST["phone"];
    $message=$_POST["message"];
    $stmt=$pdo->prepare("INSERT INTO contact(contact_id,`name`, email, phone, message)
VALUES(NULL, '$name', '$email','$phone', '$message')");
    $stmt->execute([]);

    echo "<body><h>Your entry has been successfully send</h><br>
<a href='../index.php' class='btn btn-primary'>Go back home</a> </body>";
}
//this will check if a user has any product added if so then it will display a button called checkout
//on top of the products page

function retrieveProducts() {
    //same file crediential works but if i use this location on the confirmation it will say not found??? wierd
    include '../../credential.php';
    include ('productsTemplate.php');
    if(!isset($_SESSION))
    {
        session_start();
    }
    $_SESSION["isCart"]=null;
    if($_GET['page']=='product') {
        $_SESSION["isCart"]=false;
    }
    else if($_GET['page']=='cart') {
        $_SESSION["isCart"]=true;
    }
    $isCart=$_SESSION["isCart"];
    $uid="";
    if(isset($_SESSION['user_id'])) {
        $uid = $_SESSION['user_id'];
    }

    //$uid=$_SESSION['user_id'];
    $sql="";
    if($isCart) {
        $sql="SELECT * FROM cart where user_id='$uid'";
    }
    else {
        $sql="SELECT * FROM products;";
    }

    $stmt=$pdo->query($sql);
    $productNames=array();
    $productDescriptions=array();
    $media=array();
    $prices=array();
    $product_ids=array();
    while($row=$stmt->fetch()) {
        array_push($productNames, $row['product_name']);
        array_push($productDescriptions, $row['product_description']);
        array_push($media, $row['media']);
        array_push($prices, $row['product_price']);
        array_push($product_ids, $row['product_id']);
    }
//    array_push($media, "<image src = "images/game.JPEG" class="card-image" alt = "Video game" >");
//    array_push($media, "<iframe width=\"500\" height=\"500\" src=\"https://www.youtube.com/embed/uJqhM_o8dTE\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>");
    displayAllProducts($productNames, $productDescriptions, $media, $prices, $product_ids);
}
function retrieveRequests() {
    include '../../credential.php';
    include 'job_request.php';
    if(!isset($_SESSION))
    {
        session_start();
    }
    $uid=$_SESSION['user_id'];
    if(!isset($uid)) {
        header('Location: https://cislinux.hfcc.edu/~mhchahine2/cis222/p2?page=login');
    }
//    if(!isset($_SESSION['user_id'])) {
//        header("Location: https://cislinux.hfcc.edu/~mhchahine2/cis222/p2");
//        die;
//    }
    $sql= "select request_id, project_name from user_job_request where user_id='$uid'";
    $stmt=$pdo->query($sql);
    $job_id=array();
    $project_names=array();
    while($row=$stmt->fetch()) {
        array_push($job_id, $row['request_id']);
        array_push($project_names, $row['project_name']);
    }
    displayJobRequest($job_id, $project_names);
}
function retrievedDetailsRequests() {
    include '../../credential.php';
    include 'job_request_details.php';
    if(!isset($_SESSION))
    {
        session_start();
    }
    $uid=$_SESSION['user_id'];
    if(!isset($uid)) {
        header('Location: https://cislinux.hfcc.edu/~mhchahine2/cis222/p2?page=login');
    }
//    if(!isset($_SESSION['user_id'])) {
//        header("Location: https://cislinux.hfcc.edu/~mhchahine2/cis222/p2");
//        die;
//    }
    $job_id=$_GET['details'];
    $sql= "select * from user_job_request where user_id='$uid' and request_id='$job_id'";
    $stmt=$pdo->query($sql);
    $data=array();
    while($row=$stmt->fetch()) {
        array_push($data, $row['request_id']);
        array_push($data, $row['project_name']);
        array_push($data, $row['project_description']);
        array_push($data, $row['project_deadline']);
        array_push($data, $row['project_cost_minimum']);
        array_push($data, $row['project_cost_maximum']);
        array_push($data, $row['status']);
        array_push($data, $row['progress']);
    }
    displayJobRequestDetails($data);
}
function insertRequest() {
    include '../../credential.php';
    if(!isset($_SESSION))
    {
        session_start();
    }
    $uid=$_SESSION['user_id'];
    $projectName=$_POST["projectName"];
    $projectDescription=$_POST["projectDescription"];
    $projectDeadline=$_POST["projectDeadline"];
    $minimum=$_POST["minimumCost"];
    $maximum=$_POST["maximumCost"];
    $status="Awaiting response";
    $stmt=$pdo->prepare("insert into user_job_request(request_id, user_id, project_name, project_description, project_deadline, project_cost_minimum, project_cost_maximum, status, progress)
VALUES(NULL, '$uid', '$projectName', '$projectDescription', '$projectDeadline', '$minimum', '$maximum', '$status', 0)");
    $stmt->execute([]);
    header("Location: https://cislinux.hfcc.edu/~mhchahine2/cis222/p2?page=jobRequest&request=home");
    die();
};
function registerUser() {
    include '../../credential.php';
    include 'Helper.php';
    $firstName=$_POST["firstName"];
    $lastName=$_POST["lastName"];
    $email=$_POST["Email"];
    $phone=$_POST["phone"];
    $password=$_POST['password'];
    $country=$_POST['country'];
    $province=$_POST['province'];
    $city=$_POST['city'];
    $address=$_POST['address'];
    //validate email and make sure that first name and last name are string
    $stmt=$pdo->prepare("SELECT COUNT(email) FROM users WHERE email='$email'");
    $stmt->execute();
    $duplicateEmails=0;
    while($row=$stmt->fetch()) {
        $duplicateEmails=$row['COUNT(email)'];
    }
    //User will not be able to registor if he a same email has been identified or the emails is not in the right format or first name or last name is not a string
    //if any of those criteria are meet then the use will be redirected to the registration page with a get response saying failed
    if($duplicateEmails==1 || !filter_var($email, FILTER_VALIDATE_EMAIL) || !is_string($firstName) || !is_string($lastName)) {
        header('Location: https://cislinux.hfcc.edu/~mhchahine2/cis222/p2?page=register&failed=true');
        die;
    }

    $hashPassword=new Helper();
    $hashedPassword=$hashPassword->hash($password);
    $stmt=$pdo->prepare("insert into users(user_id, user_firstName, user_lastName, email, phone, password) values(null, '$firstName', '$lastName', '$email', '$phone', '$hashedPassword')");
    $stmt->execute();
    //finding the most recent user id signed up so that i could use it to insert into addresses
    $stmt=$pdo->prepare("SELECT MAX(user_id) FROM users");
    $stmt->execute([]);
    $userId=0;
    while($row=$stmt->fetch()) {
        $userId=$row['MAX(user_id)'];
    }
    $stmt=$pdo->prepare("insert into addresses(address_id, user_id, country, province, city, address) values(null, '$userId', '$country', '$province', '$city', '$address')");
    $stmt->execute();
    $pageTitle="Registered";
    include '../bootstrap/header.php';
    echo "<body><h>You have registered successfully</h><br>";
    session_start();
    $_SESSION['user_id']=$userId;
    header('Location: https://cislinux.hfcc.edu/~mhchahine2/cis222/p2');
    die;
}
function login() {
    include '../../credential.php';
    include 'Helper.php';
    $login_success=true;
    $email=$_POST['Email'];
    $password=$_POST['Password'];
    $hashPassword=new Helper();
    $hashedPassword=$hashPassword->hash($password);
    $stmt=$pdo->prepare("SELECT user_id from users where email='$email' and password='$hashedPassword'");
    $stmt->execute();
    $user_id=null;
    while($row=$stmt->fetch()) {
        $user_id=$row['user_id'];
    }
    if($user_id==null) {
        $login_success=false;
    }
    session_start();
    $_SESSION['user_id']=$user_id;
    return $login_success;

}
function addToCart() {
    include '../../credential.php';

    session_start();

    $pid=$_GET['product_id'];
    if(!isset($_SESSION['user_id'])) {
        header('Location: https://cislinux.hfcc.edu/~mhchahine2/cis222/p2?page=login');
        die;
    }
    //will check if a product id has been set then will this product id to find all product properties from the products table to insert into the cart table
    else if(isset($_GET['product_id']) && isset($_SESSION['user_id'])) {
//check if the product id has been already added for that user id because you don't wan't a user to have
        //same software added to cart like 2 times

        $uid= $_SESSION['user_id'];
        $stmt=$pdo->prepare("select count(cartId) from cart where user_id='$uid' and product_id='$pid'");
        $stmt->execute();
        $userProductsCount=0;
        while($row=$stmt->fetch()) {
            $userProductsCount=$row['count(cartId)'];
        }
//if the product id and user id is not found then allow user to add product
        if($userProductsCount==0) {
            $stmt = $pdo->prepare("insert into cart(user_id,product_id,product_name, product_description,product_price, media)
                            select '$uid',product_id, product_name, product_description, product_price, media from products where product_id='$pid'");
            $stmt->execute();
//        $stmt=$pdo->prepare("truncate table cart");
//        $stmt->execute();
            header('Location: https://cislinux.hfcc.edu/~mhchahine2/cis222/p2?page=product');
            die;
        }
        //otherwise do not let him add product because same product shouldn't be added twice
        else if($userProductsCount>0) {
            header('Location: https://cislinux.hfcc.edu/~mhchahine2/cis222/p2?page=product');
            die;
        }
    }
}
function removeCart() {
        include '../../credential.php';

        session_start();

        $pid=$_GET['product_id'];
        if(!isset($_SESSION['user_id'])) {
            header('Location: https://cislinux.hfcc.edu/~mhchahine2/cis222/p2?page=login');
            die;
        }
        //will check if a product id has been set then will this product id to find all product properties from the products table to insert into the cart table
        else if(isset($_GET['product_id']) && isset($_SESSION['user_id'])) {

            $uid= $_SESSION['user_id'];
            $pid=$_GET['product_id'];
//if the product id and user id is not found then allow user to add product
                $stmt = $pdo->prepare("delete from cart where user_id='$uid' and product_id='$pid'");
                $stmt->execute();

                header('Location: https://cislinux.hfcc.edu/~mhchahine2/cis222/p2?page=cart');
                die;
        }
}
function preformOrder() {
    include '../../credential.php';
    //go through all the cart items and get total cost.
    $stmt = $pdo->prepare("select sum(product_price) from cart");
    $stmt->execute();
    $total=0;
    while($row=$stmt->fetch()) {
       $total=$row['sum(product_price)'];
    }
    if(!isset($_SESSION)) {
        session_start();
    }
    $uid=$_SESSION['user_id'];
    $date = date('Y-m-d H:i:s');
    $stmt = $pdo->prepare("insert into orders(order_id, user_id, total_price, date_ordered) values(null, '$uid', '$total', '$date')");
    $stmt->execute();
    $oid=$pdo->lastInsertId();

    //insert order items
    $stmt = $pdo->prepare("insert into order_items(order_id, product_id, price) select '$oid', product_id, product_price from cart where user_id='$uid'");
    $stmt->execute();
    //finally will remove the cart associated with this user and echo informing the user that his order has been successful
    $stmt = $pdo->prepare("delete from cart where user_id='$uid'");
    $stmt->execute();
    //echo $oid;
    $pageTitle="Order successful";
    include '../bootstrap/header.php';

    echo "<body><h>You have successfully placed your order.Your order id is #$2123A".$oid.". Thank you</h><br>
<a href='https://cislinux.hfcc.edu/~mhchahine2/cis222/p2?page=product' class='btn btn-primary'>Go back to products</a> </body>";
}
