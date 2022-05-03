
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact Mahmoud Chahine</title>

    <link rel="stylesheet" type='text/css' href="contactStyle.css">


</head>
<body>
<?php
/**
 * contact.php
 *
 * Homework 1
 *
 * @category   Homework
 * @package    Homework 1
 * @author     Mahmoud Chahine <mhchahine2@hawkmail.hfcc.edu>
 * @version    2019.09.05
 * @link       https://cislinux.hfcc.edu/~mhchahine2/contact.php
 * @see        NetOther, Net_Sample::Net_Sample()
 * @grade      10/10
 */
$email="mhchahine2@hawkmail.hfcc.edu";
define('SLACK', 'Mahmoud Chahine');
echo "<h1>Mahmoud Chahine</h1>";
$message="Email: ".$email."<br>Slack username: ". SLACK;
echo "<p>$message</p>";
?>
</body>
</html>