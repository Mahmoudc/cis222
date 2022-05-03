<?php
if($_GET['form']==1) {
    try {
        echo "<p>success</p>";
    }
    catch (Exception $e) {
        echo $e->getMessage();
    }
}
else if($_GET['form']==2) {
    try {
        throw new Exception("<p>Sorry you clicked a bad form</p>");
    }
    catch (Exception $e) {
        echo $e->getMessage();
    }
}
else if($_GET['form']==3) {
    try {
        $message=$_POST['text_input'];

        if (preg_match('/\berror\b/', $message)) {
            throw new Exception("<p>I detected an error</p>");
        }
        else {
            $hashed=crypt($message, "The_Salt");
            echo "<p>".$hashed."</p>";
        }
    }
    catch (Exception $e) {
            echo $e->getMessage();
    }
}