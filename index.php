
<!DOCTYPE html>

    <?php
        include 'includes/header.php'; 

        include 'database/CreateDb.php';

        include 'database/functions.inc.php';

        // create instance of CreateDb  class
        $database = new CreateDb(dbname: "shop", tb1name: "users", tb2name: "products", tb3name: "admin");
    ?>

<style>
.admin-button-container {
    position: fixed;
    bottom: 20px;
    right: 20px;
    z-index: 999; /* To make sure it appears above other elements */
  }

  .admin-button {
    background-color: white;
    color: black;
    border-radius: 10em;
    font-size: 14px;
    font-weight: 600;
    padding: 0.5em 1em;
    cursor: pointer;
    transition: all 0.3s ease-in-out;
    border: 1px solid black;
    box-shadow: 0 0 0 0 black;
    text-decoration: none; /* To remove underline */
    display: inline-block; /* To apply padding properly */
  }

  .admin-button:hover {
    transform: translateY(-4px) translateX(-2px);
    box-shadow: 2px 5px 0 0 black;
  }

  .admin-button:active {
    transform: translateY(2px) translateX(1px);
    box-shadow: 0 0 0 0 black;
  }
</style>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <b>Online</b> Shopping
        </div>
        <!-- /.login-logo -->
        <div class="card shadow" >
            <div class="card-body login-card-body mt-3" style="border-radius: 20px;">
                <h6 class="login-box-msg"><b>Sign in</b> to start your session</h6>

                <?php
                LgnMsgs();
                ?>
                <form action="database/login.inc.php" method="post">
                    <div class="input-group my-3">
                        <input type="text" name="username" class="form-control" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>  
                    <div class="input-group my-3">
                        <input type="password" name="pass01" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <!-- /.col  -->
                        <div class="col-12">
                            <button type="submit" name="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <p class="my-2 text-center">
                    <a href="register.php" class="text-center">Register a new membership</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>

    <div class="admin-button-container">
        <a class="admin-button" href="adminlogin.php">Admin Login</a>
    </div>

</body>
</html>