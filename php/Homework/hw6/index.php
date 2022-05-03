<?php
/**
 * index.php
 *
 * Homework 6
 *
 * @category   Homework
 * @package    Homework 6
 * @author     Mahmoud Chahine <mhchahine2@hawkmail.hfcc.edu>
 * @version    2019.10.29
 * @link       https://cislinux.hfcc.edu/~mhchahine2/cis222/Homework/hw4
 * @see        NetOther, Net_Sample::Net_Sample()
 * @grade
 */
if(isset($_POST['submit'])) {
    setcookie("size", $_POST['font_size'], time() + 3600, '/');
    session_start();
    $_SESSION['bg_color'] = $_POST['bg_color'];
    $_SESSION['text_color'] = $_POST['text_color'];
    echo "<style>
body{
background-color:" . $_SESSION['bg_color'] . ";
color:" . $_SESSION['text_color'] . ";
font-size: " . $_COOKIE['size'] . ";
}
</style>";
}
echo "<h1>Welcome to my page</h1>
<form method=\"post\">
    <label>Enter background color of the page:</label>
    <input type=\"text\" name=\"bg_color\">
    <br>
    <label>Enter text color of the page:</label>
    <input type=\"text\" name=\"text_color\">
    <br>
    <label>Enter text size of the page:</label>
    <input type=\"number\" name=\"font_size\">
    <br>
    <input type=\"submit\" name=\"submit\" value=\"submit\">
</form>
";

?>
