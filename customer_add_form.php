<!DOCTYPE html>

<?php 
// --SESSION
include 'database/session.inc.php';

// --HEADER
include 'includes/header.php';

// --NAVBAR
include 'includes/navbar.php';

// --SIDEBAR
include 'includes/sidebar.php';

include 'database/crud.inc.php';
?>

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content Header -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Customer Info</h1>
                    </div>
                </div>
            </div>
        </div><!-- /.header -->

        <!-- Main Content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h2 class="card-title">Add customer</h2>
                            </div><!-- /.header -->

                            <?php
                                if(isset($_GET['success'])) {
                                    if($_GET['success']) {
                                        echo '<div class="alert alert-success" role="alert">
                                                    <h5 class="alert-heading">Customer added succesfully!</h5>
                                                </div>';
                                    }
                                }
                            ?>
                            
                            <!-- FORM -->
                            <form action="database/crud.inc.php" method="post">
                                <div class="card-body">
                                    <div class="form-body">
                                        <label for="lname">Last Name</label>
                                        <input type="text" class="form-control" name="lname" id="lname" placeholder="" required><br>
                                    </div>

                                    <div class="form-body">
                                        <label for="fname">First Name</label>
                                        <input type="text" class="form-control" name="fname" id="fname" required><br>
                                    </div>
                                    
                                    <div class="form-body">
                                        <label for="email">Email Address</label>
                                        <input type="email" class="form-control" name="email" id="email" required><br>
                                    </div>
                                    
                                    <div class="form-body">
                                        <label for="contact">Contact Info</label>
                                        <input type="number" class="form-control" name="contact" id="contact" required><br>
                                    </div>
                                    
                                    <div class="form-body">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" name="address" id="address" required><br>
                                    </div>
                                    
                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div><!-- /.wrapper -->


 <?php include 'includes/footer.php' ?>   
</body>
</html>