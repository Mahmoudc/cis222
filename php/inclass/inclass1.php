<html>
<pre>
<?php
//var_dump($_POST);
if(isset($_POST['username'])) {
    $name = $_POST['username'];
    if ($name == "Mahmoud") {
        echo "Welcome genius";
    } else if ($name == "Loser") {
        echo "You suck";
    } else {
        echo "Who the hell are you";
    }
}
//var_dump( $name );

?>
    </pre>
<form method="POST">
    <label for="client">Client: </label>
    <input type="text" name="username" id="client">
    <br>
    <label for="description">description: </label>
    <input type="text" name="description" id="description">
    <br>
    <label for="address">address: </label>
    <input type="text" name="address" id="address">
    <br>
    <input type="submit">
</form>
</html>
<?php
var_dump($name=='Mahmoud');
var_dump((4==4));//true
var_dump((4==3));//false

?>