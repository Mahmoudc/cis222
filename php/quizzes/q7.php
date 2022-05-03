<?php
/**
 * quiz7.txt
 *
 * Send an email!
 *
 * @category    Chapter 11
 * @package     Quiz 7
 * @author      Mahmoud Chahine <mhchahine2@hawkmail.hfcc.edu>
 * @version     2019.11.07
 * @grade       10 / 10
 */

// 1. (7/7pts) Write the PHP needed below to send an email.
//          The subject should read "Test Email"
//          The body should use the variable $content
//          The email should be sent to crbanks1@hfcc.edu\
//          Use your email address as the from and reply to addresses.
//          The email should also have valid headers.
$headers='From: mhchahine2@hawkmail.hfcc.com'."\r\n".'Reply-To: webmaster@example.com'."\r\n".'X-Mailer: PHP/'.phpversion();
$to='crbanks1@hfcc.edu';
$subject='Test Email';
$content='The actual content of the message goes here.';

mail($to,$subject,$content,$headers);



// 2. (1/1pts) When uploading a file via an HTML form into PHP,
// what global array are the files temporarily stored in?
//$_FILES['tmp_name']

// 3. (2/2pt) Use the PHP header functionality to send the user to the following url
//              https://facebook.com

header('Location: https://facebook.com');
die;

// B. (1pt) Demonstrate how you would send an SMS text message using PHP.