<?php
if(!isset($_GET['page'])) {
    include 'homePage.php';
}
else if(isset($_GET['page']) && $_GET['page']=='delete') {
    include 'removeFriend.php';
}
else if(isset($_GET['page']) && $_GET['page']=='add') {
    include  'insertFriend.php';
}
else if(isset($_GET['page']) && $_GET['page']=='update') {
    include  'updateFriend.php';
}
?>