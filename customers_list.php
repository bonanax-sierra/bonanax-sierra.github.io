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
?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Customers Information</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">List of Customers</h3>
                            </div>
                            <div class="card-body"><a class="btn btn-primary" href="customer_add_form.php">Add Customer</a></div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-boardered tabled-striped">
                                    <thead>
                                        <tr>
                                            <th>Last Name</th>
                                            <th>First Name</th>
                                            <th>Email Address</th>
                                            <th>Contact Info</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Bona</td>
                                            <td>Adrian Lylle</td>
                                            <td>bonanaxbona@gmail.com</td>
                                            <td>654654654</td>
                                            <td>Brgy. Fabrica, Sagay City</td>
                                            <td class="align-right">
                                                <button class="btn btn-sm btn-info">edit</button>
                                                <button class="btn btn-sm btn-danger">delete</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content-header -->

        <!-- Main content-->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <?php include 'includes/dashboard_footer.php' ?>

    </div>
    <!-- ./wrapper -->

    <?php include 'includes/footer.php' ?>
    
</body>
</html>