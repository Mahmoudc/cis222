<div class="container">
    <div class="nav-brand">
        <!--<h1 class="display-4">Chahine Software Solutions</h1>-->
    </div>
    <nav class="navbar navbar-dark bg-dark navbar-expand-sm fixed-top">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNav">
            <span class="navbar-toggler-icon "></span>
        </button>
        <a href="" class="navbar-brand"><img src="logo/logo.ico"class="img-fluid"/></a>
        <div class="collapse navbar-collapse" id="myNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                   <?php
                   if($active=='home')
                       echo"<a href='?page=home' class='nav-link active'>Home</a>";
                   else
                       echo "<a href='?page=home' class='nav-link'>Home</a>";
                   ?>
                </li>
                <li class="nav-item">
                    <?php
                    if($active=='product')
                        echo"<a href='?page=product' class='nav-link active'>Products</a>";
                    else
                        echo "<a href='?page=product' class='nav-link'>Products</a>";
                    ?>
                </li>
                <li class="nav-item">
                    <?php
                    if($active=='services')
                        echo"<a href='?page=services' class='nav-link active'>Services</a>";
                    else
                        echo "<a href='?page=services' class='nav-link'>Services</a>";
                    ?>

                </li>
                <li class="nav-item">
                    <?php
                    if($active=='contact')
                        echo"<a href='?page=contact' class='nav-link active'>Contact Us</a>";
                    else
                        echo "<a href='?page=contact' class='nav-link'>Contact Us</a>";
                    ?>
                </li>
                <li class="nav-item">
                    <?php
                    session_start();
                    if(!isset($_SESSION['user_id'])) {
                        if ($active == 'login')
                            echo "<a href='?page=login' class='nav-link active'>Login</a>";
                        else
                            echo "<a href='?page=login' class='nav-link'>Login</a>";
                    }
                    //destory session
                    else if(isset($_SESSION['user_id'])) {
                            echo "<a href='?page=logout' class='nav-link'>Logout</a>";
                            //redirects to login
                    }

                    ?>
                </li>
            </ul>
        </div>

    </nav>
</div>