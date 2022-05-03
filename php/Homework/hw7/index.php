<?php
/**
 * index.php
 *
 * Homework 7
 *
 * @category   Homework
 * @package    Homework 7
 * @author     Mahmoud Chahine <mhchahine2@hawkmail.hfcc.edu>
 * @version    2019.10.29
 * @link       https://cislinux.hfcc.edu/~mhchahine2/cis222/Homework/hw7
 * @see        NetOther, Net_Sample::Net_Sample()
 * @grade
 */
echo "<form method='post' action='handlers.php?form=1'> 
<input type='submit' name='submit' value='Correct'>
</form>
<form method='post' action='handlers.php?form=2'>
<input type='submit' name='submit' value='Throw Error'>
</form>
<form method='post' action='handlers.php?form=3'>
<input type='text' name='text_input'>
<input type='submit' name='submit' value='Submit'>
</form>";
