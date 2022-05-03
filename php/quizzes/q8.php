<?php
/**
 * quiz8.txt
 *
 * Cookies and sessions
 *
 * @category    Chapter 12
 * @package     Quiz 8
 * @author      Mahmoud Chahine <mhchahine2@hawkmail.hfcc.edu>
 * @version     2019.11.14
 * @grade       9 / 10
 */

// 1. (3/4pts) Using a PHP function, save a cookie named season.
//              The cookie should contain the value saved in the $cv variable.
//              The cookie should expire after 90 days.
$cv = "CryptoWinter";
$season="season";
setcookie($season, $cv, time() + (86400 * 90));


// 2. (3/3pt) Imagine you have a user_id in a variable called $uid.
//          Write all the code needed below to store their user_id in a session variable.
//          Name this session index current_user_id.
$uid = 42;
session_start();
$_SESSION['current_user_id']=$uid;


// 3. (3/3pts) Now write the following echo statements,
//                          where X and Y are the users season cookie and user_id.
//              Your current season is X.
//              Your user ID is Y.
echo "Your current season is ". $_COOKIE[$season];
echo "Your user ID is ".$_SESSION['current_user_id'];


// B. (1pt) Explain how you might use the HTTP_USER_AGENT data in the $_SERVER array...
//                                                ...to improve the security of your site.