<?php
/**
* quiz6.txt
*
* HAPPY HALLOWEEN!
*
* @category    Chapter 10
* @package     Quiz 6
* @author      Mahmoud Chahine <mhchahine2@hawkmail.hfcc.edu>
* @version     2019.10.31
* @grade        11 / 10
*/

// 1. (4pts) Write a basic HTML POST form that allows a user to update their email address.
//              This form should have a text input as well as a submit button.

// 2. (2pts) Add a hidden input to this form that contains the users user_id in the value.
//              Assume the users user_id is in a varaible called $user_id.
//              The name of this input should also be user_id.
//in reality that would probably be a variable holding the user id through session
$user_id=2;
echo "<form method='post'>

    <label class=\"control-label col-2\" for=\"emailInput\">
        Email:
    </label>
    <input type=\"text\" name=\"Email\" id=\"emailInput\" placeholder=\"Email\" required>
    <input type=\"hidden\" name=\"user_id\" id=\"userInput\" value='$user_id'>
     <input type=\"submit\" class=\"btn btn-primary offset-4\" id=\"submit\" value=\"Submit\">";


// 3. (4pts) Now we need to update the users table that contains the email address.
//              Write the basic PHP code and SQL query needed to perform the update.
//              Assume the table is called users and it at least has a user_id and email field.
include '..\credential.php';
$update="UPDATE users SET email=".$_POST['Email']." WHERE user_id=".$_POST['user_id'];
$stmt=$pdo->query($update);

// Ex. (1pt) Write a SQL query that will return the number of users (rows) in the table above.
//              You do not need any PHP for this question, only the SQL.
/**
 * SELECT COUNT(*) FROM users;
 */