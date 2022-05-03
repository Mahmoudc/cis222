<?php
//define('valid', true);
//include 'describeValidTable.php';

/**
 * contact.php
 *
 * Homework 1
 *
 * @category   Homework
 * @package    Homework 4
 * @author     Mahmoud Chahine <mhchahine2@hawkmail.hfcc.edu>
 * @version    2019.09.05
 * @link       https://cislinux.hfcc.edu/~mhchahine2/cis222/Homework/hw4
 * @link       https://www.codexworld.com/how-to/get-user-ip-address-php/
 * @see        NetOther, Net_Sample::Net_Sample()
 * @grade      10/10
 */
if(!isset($_GET["table"]))
{
    include 'showTablesPage.php';
}
else if(isset($_GET["table"]))
{
    include 'describeTablePage.php';
}
//if($valid && isset($_GET["table"]))
//{
//
//}



?>