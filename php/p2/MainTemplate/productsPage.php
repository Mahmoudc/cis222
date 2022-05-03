<?php
$pageTitle="Products";
include ('bootstrap/header.php');
$active="product";
include ('navigation.php');
include ('controller.php');
retrieveProducts();
include ('footer.php');
