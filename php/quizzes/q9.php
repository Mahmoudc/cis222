<?php

/**
 * q9.txt
 *
 * Security
 *
 * @category    Chapter 13
 * @package     Quiz
 * @author      Mahmoud Chahine <mhchahine2@hawkmail.hfcc.edu>
 * @version     2019.11.21
 * @grade       12 / 10
 */

// 1. (5pts) Create a function or class that can accept at least one string parameter.
//             Assume the parameter is a password, hash and return it.

function hashPassword($password, $s="Chahine") {
    $hashed_password = crypt( $password, $s );
    return $hashed_password;
}
// 2. (3pts) Let's say you have a password saved in the $pass variable.
//              But do not assume this is true!
//              Execute some checks to ensure the variable is not null and is indeed a string.
$pass = 'Very_secure_password';

if(isset($pass) && is_string($pass) && $pass!="") {
    echo "valid";
}
else {
    echo "Invalid make sure you use a valid password that is a string only";
}
// 3. (2pts) Use the function you created above to hash the $pass variable.
//              Then save the hashed password in an $encp variable.
$encp=hashPassword($pass);

// B. (2pt) Describe a honey pot.
//Honey pot is a form input that is hidden from humans but visible to bots.
//so if a bot fills out the hidden input field. You could ignore it