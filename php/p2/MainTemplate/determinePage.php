<?php
//Default page
if(isset($_GET['page']) &&$_GET['page']=='home' || !isset($_GET['page'])) {
    include 'mainPage.php';
}
//Contact page
else if($_GET['page']=='contact') {
    include 'contactPage.php';
}
//products page
else if($_GET['page']=='product') {
    include 'productsPage.php';
}
else if($_GET['page']=='login') {
    include 'loginPage.php';
}
else if($_GET['page']=='logout') {
    session_start();
    session_destroy();
    header('Location: https://cislinux.hfcc.edu/~mhchahine2/cis222/p2?page=login');
}
else if($_GET['page']=='register') {
    include 'registerPage.php';
}
else if($_GET['page']=='cart') {
    include 'cartPage.php';
}
else if($_GET['page']=='services') {
    include 'servicePage.php';
}
else if($_GET['page']=='jobRequest' && $_GET['request']=='home') {
    include 'job_requestPage.php';
}
else if($_GET['page']=='jobRequest' && $_GET['request']=='delete') {
    include 'job_request_deletePage.php';
}
else if($_GET['page']=='jobRequest' && $_GET['request']=='add') {
    include 'job_request_insertPage.php';
}
else if($_GET['page']=='jobRequest' && $_GET['request']=='details') {
    include 'job_request_detailsPage.php';
}