
<!DOCTYPE html>

    <?php
        include 'includes/header.php'; 

        include 'database/CreateDb.php';

        include 'database/functions.inc.php';

        // create instance of CreateDb  class
        $database = new CreateDb(dbname: "shop", tb1name: "users", tb2name: "products");
    ?>



<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <b>Online</b> Shopping
        </div>
        <!-- /.login-logo -->
        <div class="card shadow" >
            <div class="card-body login-card-body" style="border-radius: 20px;">
                <p class="login-box-msg">Sign in to start your session</p>

                <?php
                    LgnMsgs();
                ?>
                <form action="database/login.inc.php" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="username" class="form-control" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>  
                    <div class="input-group mb-3">
                        <input type="password" name="pass01" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- /.col  -->
                        <div class="col-12">
                            <button type="submit" name="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <p class="mb-2 mt-2">
                    <a href="register.php" class="text-center">Register a new membership</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>


</body>
</html>