<!DOCTYPE html>
<html lang="en">

<?php
// --DATABASE
require_once 'database/functions.inc.php';
include 'database/dbcon.inc.php';
require_once 'database/CreateDb.php';

// --SESSION
include 'database/session.inc.php';

include 'includes/header.php';

// To store a product into an array and start a session
if (isset($_POST['add'])) {
  addToCart($_POST['product_id']);
}
?>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Online shopping</title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
  <!-- Bootstrap icons-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="css/styles.css" rel="stylesheet" />
</head>

<style>
  .carousel-item img {
            width: 350px; /* Set your desired width here */
            height: 350px; /* Let the height adjust automatically to maintain aspect ratio */
            margin-left: 35%;
        }
</style>

<body>
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
      <a class="navbar-brand" href="#!">Online Shopping</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
          <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">Shop</a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#!">All Products</a></li>
              <li>
                <hr class="dropdown-divider" />
              </li>
              <li><a class="dropdown-item" href="#!">Popular Items</a></li>
              <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
            </ul>
          </li>
        </ul>

        <ul class="navbar-nav">
          <?php
          displayLoginOrLogoutLink();
          ?>
        </ul>
        <button class="btn btn-outline-dark" type="submit">
          <a href="cart.php" class="nav-link">
            <i class="bi-cart-fill me-1"></i>
            Cart
            <?php
            if (isset($_SESSION['cart'])) {
              $count = count($_SESSION['cart']);
              echo '<span id="cart_count" class="badge bg-dark text-white ms-1 rounded-pill">' . $count . '</span>';
            } else {
              echo '<span id="cart_count" class="badge bg-dark text-white ms-1 rounded-pill">0</span>';
            }
            ?>
          </a>
        </button>

      </div>
    </div>
  </nav>

  <!-- Header-->
  <header class="bg-dark py-5">
  
  </header>
  <!-- Section-->


  <!-- Product display -->
  <div data-spy="scroll" data-target="#navbar-example2" data-offset="0">
    <div class="d-flex flex-wrap justify-content-start">
      <div class="row mx-3 my-3">
        <?php
        $result = GetProduct($conn);

        while ($row = $result->fetch_assoc()) {
          component($row['product_name'], $row['product_price'], $row['product_img'], $row['id']);
        }

        ?>
      </div>
    </div>
  </div>



  <!-- Footer-->
  <?php
  include_once 'includes/footer.php'
    ?>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- Bootstrap core JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Core theme JS-->
  <script src="js/scripts.js"></script>
</body>

</html>