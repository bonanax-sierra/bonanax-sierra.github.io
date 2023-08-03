<style>
.custom-navbar {
  width: fit-content;
  margin-left: 88.5%;
  padding-left: 12px;
  padding-right: 3px;
  padding-top: 10px;
  padding-bottom: 5px;
  margin-bottom: 20px;
  border: 1px solid #ccc;
  border-radius: 10px;
  opacity: 0.5;
  transition: opacity 0.3s ease;
}

.custom-navbar:hover {
  opacity: 1;
}

</style>

<nav class="navbar fixed-bottom navbar-expand-lg navbar-light bg-light custom-navbar">
  <div class="collapse navbar-collapse" id="navbarNavbarAltMarkup">
    <div class="mr-auto"></div>
    <div class="navbar-nav">
      <a href="cart.php" class="nav-item nav-link active">
        <h5 class="px-0 cart">
          <i class="fas fa-shopping-cart cart-icon text-dark"></i> <span class="text-dark">Cart</span>
          <?php
            if (isset($_SESSION['cart'])) {
              $count = count($_SESSION['cart']);
              echo '<span id="cart_count" class="badge bg-dark text-white ms-1 rounded-pill">' . $count . '</span>';
            } else {
              echo '<span id="cart_count" class="badge bg-dark text-white ms-1 rounded-pill">0</span>';
            }
          ?>
        </h5>
      </a>
    </div>
  </div>
</nav>

<script>
document.addEventListener("DOMContentLoaded", function() {
  var navbar = document.querySelector('.custom-navbar');
  navbar.addEventListener('mouseenter', function() {
    navbar.style.opacity = '1';
  });
  navbar.addEventListener('mouseleave', function() {
    navbar.style.opacity = '0.5';
  });
});
</script>
