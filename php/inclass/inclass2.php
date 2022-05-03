<!doctype html>
<html lang="en">

<?php
$pageTitle="Chahine Software Solutions LLC";
include('../bootstrap/header.php');
?>

<body>

<?php
//navigation items
include('../includes/header.php');?>

<div class="jumbotron">

    <br>
    <div class="h1">About Chahine Software Solutions</div>
    <div class="lead">
        <p>We are a software company that specializes in creating .net desktop applications, mobile applications, sql databases, console applications, api's, and websites.
            In this website we offer both free and paid applications that you can you use for your company or personal needs. In addition your welcome to contact us to do
            an application for your business or individual needs in the contact section.</p>


    </div>
    <?php function sayHello() {
        echo "<h1>Hello</h1>";
    }
    sayHello();
    for($i=0;$i<1000;$i++) {
        sayHello();
    }
    ?>

    <!--<h2>Carousel Example</h2>-->


</div>
<?php include('../includes/footer.php')?>


</body>