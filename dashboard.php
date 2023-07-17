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
    
    <!-- Content Wrapper. Contains page content-->
    <div class="content-wrapper">
        <!-- content header (page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content-->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box-->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>150</h3>

                                <p>Number of Customers</p>
                            </div>
                            <div class="icon"> 
                                <i class="fas fa-regular fa-users"></i>
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box-->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>5,000</h3>

                                <p>Income</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-dollar-sign"></i>
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box-->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>150</h3>

                                <p>Number of Services</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box-->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>150</h3>

                                <p>Number of Services</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    
<!-- Main footer -->
<?php include 'includes/footer.php' ?>
</body>
</html>