<!DOCTYPE html>

<?php
  // --DATABASE
  require_once 'database/functions.inc.php';
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

  // create instance of CreateDb  class
  $database = new CreateDb(dbname: "shop", tb1name: "users", tb2name: "products");
  
  // Injection of products
  $products = [
      ["Laptop", 12.99, "dist/img/products/laptop.jpg"],
      ["Computer", 13.99, "dist/img/products/phone.jpg"],
      ["Phone", 14.99, "dist/img/products/pc3.jpg"],
      ["Headset", 15.99, "dist/img/products/headset.webp"],
      ["Netflix", 10.99, "dist/img/products/nf.png"],
      ["Spotify", 11.99, "dist/img/products/spotify.png"]
  ];

  foreach ($products as $product) {
      $database->insertProduct($product[0], $product[1], $product[2]);
  }

  // To store a product into an array and start a session
  if (isset($_POST['add'])) {
    // print_r($_POST['product_id']);
    if (isset($_SESSION['cart'])) {
        $item_array_id = array_column($_SESSION['cart'], 'product_id');

        if (in_array($_POST['product_id'], $item_array_id)) {
            echo '<script>alert("Product is already in the cart")</script>';
            echo '<script>window.location = "home.php"</script>';
        } else {
            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_POST['product_id']
            );

            $_SESSION['cart'][$count] = $item_array;
        }
    } else {
        $item_array = array(
            'product_id' => $_POST['product_id']
        );

        // Create new session variable
        $_SESSION['cart'][0] = $item_array;
    }
}

?>

<style>  
        /* Style for star rating */
        .checked {  
            color : yellow;  
            font-size : 20px;  
        }  
        .unchecked {  
            font-size : 20px;  
        }  
        .card-img-top {
            width: 100%; /* Adjust the width as desired */
            height: 250px; /* The height will be adjusted automatically */
            object-fit: cover;
        }

         .star-rating i {
        font-size: 10px;
        color: gray;
        cursor: pointer;
      }

      .star-rating i.checked {
        color: yellow;
      }

      

      @media (max-width: 767px) {
        .star-rating i {
          font-size: 16px;
        }
      }

      @media (min-width: 768px) and (max-width: 991px) {
        .star-rating i {
          font-size: 24px;
        }
      }

      @media (min-width: 992px) {
        .star-rating i {
          font-size: 32px;
        }
      }
      /* end of star rating css */

</style>  


<body class="hold-transition sidebar-mini"
      data-spy="scroll"
      data-target=".navbar"
      data-offset="50">

  <!--  -->
  <div class="wrapper">
    <div class="content-wrapper">
      <!-- Content -->
      <div class="content">
        <div class="container">

          <!-- Navigation bar of products -->
          <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
            <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse text-center" id="navbarNav">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link" href="#laptop">Laptop</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#phone">Phone</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#computer">Computer</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    More
                  </a>
                  <div class="dropdown-menu text-center">
                    <a class="dropdown-item" href="#headset">Headset</a>
                    <a class="dropdown-item" href="#mcbook">Mcbook</a>
                  </div>
                </li>
              </ul>
            </div>
          </nav>

          <!-- Product display -->
          <div data-spy="scroll" data-target="#navbar-example2" data-offset="0">
            <div class="d-flex flex-wrap justify-content-start">

              <?php
               $result = GetProduct($conn);

               while ($row = $result->fetch_assoc()) {
                   component($row['product_name'], $row['product_price'], $row['product_img'], $row['id']);
               }
               
              ?>
            </div>
          </div>

          
        </div>
      </div>
    </div>
  </div>

  <script>
  const starRatings = document.querySelectorAll('.star-rating h6');

  starRatings.forEach((rating) => {
    const stars = rating.querySelectorAll('i');

    stars.forEach((star, index) => {
      star.addEventListener('click', () => {
        resetRating(rating);
        rateStars(rating, index);
      });
    });
  });

  function resetRating(rating) {
    const stars = rating.querySelectorAll('i');
    
    stars.forEach((star) => {
      star.classList.remove('checked');
    });
  }

  function rateStars(rating, index) {
    const stars = rating.querySelectorAll('i');

    for (let i = 0; i <= index; i++) {
      stars[i].classList.add('checked');
    }
  }
</script>

<!-- Footer -->
<?php 
include 'includes/footer.php'; 

include 'includes/cart_float.php';
?>
<!-- /.footer -->

</body>
</html>