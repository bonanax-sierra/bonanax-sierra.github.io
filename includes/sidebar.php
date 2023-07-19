<style>
    #cart_count {
        text-align: center;
        padding: 0 0.9rem 0.1rem 0.9rem;
        border-radius: 3rem;
    }
</style>

<aside class="main-sidebar sidebar-dark-primary elevation-4 d-flex flex-column">
    <!-- Brand Logo -->
    <a href="home.php" class="brand-link">
        <img src="dist/img/logo.jpg" alt="Online Shopping Logo" class="brand-image img-circle elevation-3"
            style="opacity: .7">
        <span class="brand-text font-weight-light">Online Shopping</span>
    </a>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="home.php" class="nav-link">
                        <i class="nav-icon fa fa-shopping-bag" aria-hidden="true"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="dashboard.php" class="nav-link">
                        <i class="nav-icon fas fa-address-book" aria-hidden="true"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="customers_list.php" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Customers
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="contact.php" class="nav-link">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>
                            Contact us
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="cart.php" class="nav-link">
                        <i class="nav-icon fas fa-cart-plus" aria-hidden="true"></i>
                        <p>
                            Cart
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cog fa-spin fa-1x fa-fw"></i>
                        <span class="sr-only">Loading...</span>
                        <p>
                            Settings
                        </p>
                    </a>
                </li>
                <?php
                include_once 'database/functions.inc.php';
                displayLoginOrLogoutLink();
                ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>