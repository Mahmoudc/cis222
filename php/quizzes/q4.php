<?php
/**
* q4.txt
*
* Quiz 4 for your enjoyment
*
* @category    Quiz
* @package     Quiz 4
* @author      Mahmoud Chahine <mhchahine2@hawkmail.hfcc.edu>
* @version     2019.10.03
* @grade        11 / 10
*/

/**
* 3/3 pts
* 1. You are working on a new project with a high profile client
*  It is your job to set up a database connection.
*  Create a variable called $mysqlconnection and store a new database connection object in it.
*	This connection object can be either PDO or mysqli.
*	Just use the credentials already included below.
*/

$DBUSER = 'mzuck';
$DBPASS = 'TotallyNotARobot';
$DBHOST = 'robobook.com';
$DBNAME = 'robobook_prod';
$DBCHARSET = 'utf8';
$dsn = "mysql:host=$DBHOST;dbname=$DBNAME;charset=$DBCHARSET";
$opt =
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

$mysqlconnection = new PDO($dsn, $DBUSER, $DBPASS, $opt);

/**
* 3/3 pts
* 2. Use the previous connection object to select all columns from a table called memposts.
*	Once you execute this, loop through the results and echo a column called `mptxt`.
*	Assume there are a total of 7 columns and the `mempost_id` field is the primary key.
*	Feel free to ask about the table structure at any time during this quiz if needed.
*/

$stmt=$mysqlconnection->prepare("SELECT * FROM mempost");
$stmt->execute([]);
while($row=$stmt->fetch()) {
    echo $row['mptxt'] . "<br>";
}


/**
* 2/2 pts
* 3. Use this connection to execute an update on the previous table.
*	You want to set a field called `hidden` to 1 and `updated` to the current date and time.
*	Only do this for all rows that have a `user_id` of 4 or 7.
*/
$stmt=$mysqlconnection->prepare("UPDATE mempost SET `hidden`=1 AND `updated`=NOW()
WHERE user_id=4 or user_id=7");
$stmt->execute([]);


/**
* 2/2 pts
* 4. Manually insert a row into this table.
*	You only need to specify the following fields: `mempost_id`, `user_id`, `mptxt`, `created`
*	Assume all unspecified fields will default to their values.
*	The user id is 1337.
*	The created field should be the current date and time.
*	The message should read 'I love PHP!' without the quotes.
*/
$stmt=$mysqlconnection->prepare("INSERT INTO mempost(`mempost_id`,`user_id`,`mptxt`,`created`)
VALUES(NULL, 1337, 'I love PHP!', NOW())");
$stmt->execute([]);


/**
* 1/1 pt
* E. Explain some advantages of a PDO database connection over a mysqli connection.
 * PDO is more secure than mysqli connection and is newer
*/
