<?php
$registerFailed="";
if (isset($_GET['failed']) && $_GET['failed'] == 'true') {
    $registerFailed="<p>Registration failed make sure that your using a valid email. First name and last name should only be string characters</p>";
}

echo "<div class=\"container\">
<div class=\"jumbotron\">
    <br>
    <div class=\"h1\">Register on Chahine Software Solutions</div>
    <br>
<form class=\"form-horizontal\" action=\"MainTemplate/controller.php?option=2\" method='post'>

    <label class=\"control-label col-2\" for=\"nameInput\">
        First name:
    </label>
    <input type=\"text\" class=\"col-5\"  name=\"firstName\" id=\"nameInput\" placeholder=\"First name\" required>
    <br>
    <label class=\"control-label col-2\" for=\"nameInput\">
        Last name:
    </label>
    <input type=\"text\" class=\"col-5\"  name=\"lastName\" id=\"nameInput\" placeholder=\"Last name\" required>
    <br>
    <label for=\"emailInput\" class=\"control-label col-2\">
        Email:
    </label>
    <input type=\"email\" class=\"col-5\" name=\"Email\" id=\"emailInput\" placeholder=\"123@gmail.com\" required>
    <br>
    <label for=\"phoneInput\" class=\"control-label col-2\">
        Phone:
    </label>
    <input type=\"tel\" name=\"phone\" id=\"phoneInput\" class=\"col-5\" placeholder=\"Phone number\" required>
    <br>
    <label for=\"passwordInput\" class=\"control-label col-2\">
        Password:
    </label>
    <input type=\"password\" name=\"password\" id=\"passwordInput\" class=\"col-5\" required>
    <br>
    <hr>
    <h1 class='col-5'>Address information</h1>
    <br>
    <label for=\"countryInput\" class=\"control-label col-2\">
        Country:
    </label>
    <input type=\"text\" name=\"country\" id=\"countryInput\" class=\"col-5\" placeholder='Country' required>
    <br>
    <label for=\"provinceInput\" class=\"control-label col-2\">
        Province:
    </label>
    <input type=\"text\" name=\"province\" id=\"provinceInput\" class=\"col-5\" placeholder='Province' required>
    <br>
    <label for=\"cityInput\" class=\"control-label col-2\">
        City:
    </label>
    <input type=\"text\" name=\"city\" id=\"cityInput\" placeholder='City' class=\"col-5\" required>
    <br>
    <label for=\"addressInput\" class=\"control-label col-2\">
        Address:
    </label>
    <input type=\"text\" name=\"address\" id=\"addressInput\" placeholder='Address' class=\"col-5\" required>
    <br>
    <br>
    <input type=\"submit\" class=\"btn btn-primary offset-4\" id=\"submit\" value=\"Submit\">


</form>".$registerFailed."

<a href='?page=login' class='btn btn-primary'>Go back to login</a>
</div>

</div>"
?>