<?php
/**
 * q2.txt
 *
 * Quiz 2 for your enjoyment
 *
 * @category   Quiz
 * @package    Quiz 2
 * @author     Mahmoud Chahine <mhchahine2@hawkmail.hfcc.edu>
 * @version    2019.09.12
 * @link       https://cislinux.hfcc.edu/~mhchahine2/cis222/quizzes/q2.php
 * @grade      12 / 10
 */

// 3/3 pts
// 1. Define an array called $classes and populate it with strings containing the classes you have taken at HFC (at least 3 or 4).
//		Then use a foreach loop to step through that array and echo their contents, don't forget to format with <br> tags.
$classes=array("cis126", "cis222", "cis294");
//echo $classes[0];
foreach($classes as $value) {
    echo $value . "<br>";
}

// 3/3 pts
// 2. You are building a new site and have to implement a few files to do so.
//		However, there are a couple conditions for these files that must be met.
//		Write the code needed to accomplish this task and meet the conditions.
//
//		apis/file1.php		This file imports data for our API service; it must be executed, but must not be executed more than one time per page.
//		file2.php			This file imports a cool visual effect; it can be executed, but must not be executed more than one time per page.
//		file3.php			This file dynamically generates data for the page; it can be executed as often as needed.

require_once('apis/file1.php');
include_once ('file2.php');
for($i=0;$i<10;$i++)//nice
    include('file3.php');
// 2/2 pts
// 3. We want to start collecting email addresses to add to our mailing list.
//		Finish the form below so that it contains a text input to enter a users email address, and a submit button that posts the data to a add_email_subscriber.php page.
//		You do not need to handle the data or response of the form, just create the form itself.
?>
    <form method="POST" action="add_email_subscriber.php">
        <label>Email: </label><input type="email" name="email">
        <br>
        <input type="submit" name="action" value="addToMailingList" >
    </form>
<?php


// 2/2 pts
// 4. Create a function that accepts 3 parameters, you can name it anything you want.
//		The first parameter should be multipled by the second, and then the third parameter should be added to that product.
//		The function should return the result of this operation.
function calculation($num1, $num2, $num3) {
    $multiply=$num1*$num2;
    $product=$multiply+$num3;
    return $product;
}
echo calculation(2, 5, 8);
// Ex 2/2 pts
// 5. Below are a 3 variables that have been set to numbers.
//		Call the function you defined above by passing it the three variables below, and be sure to save the result.
//		Then echo the result in a sentence, be sure it is formated nicely in HTML.
function printData($num1, $num2, $num3) {
    $multiply=$num1*$num2;
    $product=$multiply+$num3;
    return $product;
}
$i1 = 7;
$i2 = 13;
$i3 = 17;
echo "<p>The result is ".printData($i1,$i2,$i3);
?>