<!DOCTYPE html>

<?php
include 'includes/header.php';

include 'database/CreateDb.php';

include 'database/functions.inc.php';
?>

<style>
    body {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #f7f7f7;
    }

    .admin-login-card {
        max-width: 400px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        background-color: #ffffff;
        /* Add a background color to the card */
        margin-left: 20%;
    }

    .admin-login-card .login-logo {
        text-align: center;
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .admin-login-card .login-box-msg {
        text-align: center;
        margin-bottom: 20px;
    }

    .admin-login-card form {
        margin-bottom: 10px;
    }

    .admin-login-card .form-control {
        border-radius: 5px;
    }

    .admin-login-card .btn-primary {
        border-radius: 10em;
        padding: 10px 20px;
        width: 100%;
    }
</style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-sm-10">
                <div class="admin-login-card">

                    <a href="index.php" class="text-body fa-lg"><i class="fas fa-arrow-left me-2"></i></a>
                    <div class="login-logo">
                        <b>Admin</b> Login
                    </div>
                    <div class="login-box-msg">
                        Sign in to access the admin panel
                    </div>

                    <?php 
                    AdminMsgs();
                    ?>
                    
                    <form action="database/adminlogin.inc.php" method="post">
                        <div class="input-group my-3">
                            <input type="text" name="username" class="form-control" placeholder="Username">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group my-3">
                            <input type="text" name="pass01" class="form-control" placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="submit" class="btn btn-primary">Sign In</button>
                        </div>
                    </form>
                    <p class="my-2 text-center">
                        <a href="adminreg.php" class="text-center">Register as Admin</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

</body>

</html>