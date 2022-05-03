
<div class="container">
    <div class="jumbotron">
        <br>
        <form class="form-horizontal" action="MainTemplate/controller.php?option=3" method='post'>


            <label for="emailInput" class="control-label col-2">
                Email:
            </label>
            <input type="email" class="col-5" name="Email" id="emailInput" placeholder="123@gmail.com" required>
            <br>
            <label for="passwordInput" class="control-label col-2">
                Password:
            </label>
            <input type="password" name="Password" id="passwordInput" class="col-5" required>
            <br>
            <br>
            <input type="submit" class="btn btn-primary offset-2" id="submit" value="Login">

        </form>
        <?php
        if(isset($_GET['failed']) && $_GET['failed']=='true') {
            echo "<p>Login failed try again</p>";
        }
        ?>
        <a class="btn btn-primary" href="?page=register">Register</a>

    </div>
</div>