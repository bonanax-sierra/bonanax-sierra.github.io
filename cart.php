<!DOCTYPE html>

<?php
// --DATABASE
include 'database/dbcon.inc.php';
require_once 'database/CreateDb.php';

// --SESSION
include 'database/session.inc.php';

// --HEADER
include 'includes/header.php';

// --NAVBAR
include 'includes/navbar.php';

// --SIDEBAR
include 'includes/sidebar.php';

// --FUNCTIONS 
include_once 'database/functions.inc.php';

// --REMOVE PRODUCT
if (isset($_POST['remove']) && isset($_GET['action']) && $_GET['action'] == 'remove') {
  $productId = $_GET['id'];
  removeProductFromCart($productId);
}
?>


<style>
  .price-details h6 {
    padding: 3% 2%;
  }

  body {
  padding: 0 !important;
  margin: 0 !important;
}
</style>

<body class="bg-light" class="hold-transition sidebar-mini" data-spy="scroll" data-target=".navbar" data-offset="50">

  <div class="wrapper">
    <div class="content-wrapper">
      <div class="content">
        <div class="container">


          <section class="h-100 h-custom" style="background-color: #eee;">
            <div class="container py-5 h-100">
              <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                  <div class="card">
                    <div class="card-body p-4">
                      <div class="row">
                        <div class="col-lg-7">
                          <h5 class="mb-3"><a href="index.php" class="text-body"><i
                                class="fas fa-long-arrow-alt-left me-2"></i>Continue shopping</a></h5>
                          <hr>

                          <div class="d-flex justify-content-between align-items-center mb-4">
                            <div>
                              <h5 class="mb-3">Shopping cart</h5>
                              <p class="mb-0">

                                <?php
                                CartItemsMSG();
                                ?>

                              </p>
                            </div>
                            <div>
                              <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!"
                                  class="text-body">price <i class="fas fa-angle-down mt-1"></i></a></p>
                            </div>
                          </div>

                          <?php
                          echo displayCartItems($conn);
                          ?>

                        </div>
                        <div class="col-md-4 offset-md-1 border rounded mt-5-bg-white h-25">
                          <div class="pt-0 mt-3">
                            <h5>Price Details</h5>
                            <hr>
                            <div class="row price-details">
                              <div class="col-md-6">

                                <?php
                                displayCartPrice();
                                ?>

                                <h6>Delivery</h6>
                                <hr>
                                <h6>Amount Payable</h6>
                              </div>
                              <div class="col-md-6">
                                <h6>$
                                  <?php 
                                  $calculatedTotal = calculateTotal($conn);
                                  echo $calculatedTotal 
                                  ?>
                                </h6>
                                <h6 class="text-success">FREE</h6>
                                <hr>
                                <h6>$
                                  <?php 
                                  $calculatedTotal = calculateTotal($conn);
                                  echo $calculatedTotal 
                                  ?>
                                </h6>
                              </div>

                              <?php
                              displayCheckoutButton();
                              ?>

                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </div>


  <!-- Footer -->
  <?php include 'includes/footer.php' ?>
  <!-- /.footer -->
</body>

</html>