<?php

/* REGISTER FUNCTION */

/* Function if all the forms are not blank */
function emptyInputSignup($usrname, $full_name, $email, $pass01, $pass02)
{
    $result;
    if (empty($usrname) || empty($full_name) || empty($email) || empty($pass01) || empty($pass02)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

/* Function if the username is not taken */
function invalidusrname($usrname)
{
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $usrname)) { /* preg_match is a built in function in php */
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

/* Function if the email is valid */
function invalidemail($email)
{
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

/* Function if the password matches */
function pwdMatch($pass01, $pass02)
{
    $result;
    if ($pass01 !== $pass02) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

/* Function if the user exists on the database */
function usrnameExist($conn, $usrname, $email)
{
    $sql = "SELECT * FROM users WHERE username = ? OR email = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../register.php?error=stmt failed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $usrname, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

/* Function that tells the user that it has created an account */
function createUser($conn, $usrname, $full_name, $email, $pass01, $pass02)
{
    $sql = "INSERT INTO users (username, fullname, email, password) VALUES /* placeholders */(?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../register.php?error=stmt failed");
        exit();
    }

    /* password hashing */
    $hasedPwd = password_hash($pass01, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $usrname, $full_name, $email, $hasedPwd); /* bind variables (verify if the same as the $SQL variable) */
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../index.php?error=none");
    exit();
}

/* CREATE ADMIN */
function createAdmin($conn, $usrname, $full_name, $email, $pass01, $pass02)
{
    $sql = "INSERT INTO admin (username, fullname, email, password) VALUES /* placeholders */(?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../adminreg.php?error=stmt failed");
        exit();
    }

    /* password hashing */
    $hasedPwd = password_hash($pass01, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $usrname, $full_name, $email, $hasedPwd); /* bind variables (verify if the same as the $SQL variable) */
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../adminlogin.php?error=none");
    exit();
}

/* Function if the username is not taken */
function invalidusrnameAdmin($usrname)
{
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $usrname)) { /* preg_match is a built in function in php */
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

/* Function if the email is valid */
function invalidemailAdmin($email)
{
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

/* Function if the password matches */
function pwdMatchAdmin($pass01, $pass02)
{
    $result;
    if ($pass01 !== $pass02) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

/* Function if the user exists on the database */
function usrnameExistAdmin($conn, $usrname, $email)
{
    $sql = "SELECT * FROM admin WHERE username = ? OR email = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../adminreg.php?error=stmt failed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $usrname, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function loginAdmin($conn, $username, $password)
{
    $usernameExists = usrnameExistAdmin($conn, $username, $password);

    if ($usernameExists == false) {
        header("location: ../adminlogin.php?error=wronglogin");
        exit();
    }

    $pswHashed = $usernameExists["password"];
    $checkpsw = password_verify($password, $pswHashed);

    if ($checkpsw === false) {
        header("location: ../adminlogin.php?error=wronglogin");
    } elseif ($checkpsw === true) {
        session_start();
        $_SESSION["id"] = $usernameExists["id"];
        $_SESSION["username"] = $usernameExists["username"];
        header("location: ../dashboard.php?");
        exit();
    }
}

function emptyInputLoginAdmin($usrname, $pass01)
{
    $result;
    if (empty($usrname) || empty($pass01)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

/* ERROR MESSAGES */
function RgstrMsgs()
{
    if (isset($_GET['error'])) {
        if ($_GET['error'] == "emptyinput") {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Fill in all the fields!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
        } elseif ($_GET['error'] == "invalidusername") {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Invalid username!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
        } elseif ($_GET['error'] == "invalidemail") {
            echo "<p>Invalid Email</p>";
        } elseif ($_GET['error'] == "passworddontmatch") {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Password does not match!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
        } elseif ($_GET['error'] == "usernameisalreadytaken") {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Email already exists!</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
        } elseif ($_GET['error'] == "none") {
            echo '<div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Congratulations!</h4>
                    <p>You have registered succesfully.</p>
                </div>';
        }
    }
}

function LgnMsgs()
{
    if (isset($_GET['error'])) {
        if ($_GET['error'] == 'emptyinput') {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Please enter your account.</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
        } elseif ($_GET['error'] == 'wronglogin') {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Invalid username or password!</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
        }
    }
}

function AdminMsgs()
{
    if (isset($_GET['error'])) {
        if ($_GET['error'] == 'emptyinput') {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Please enter your account.</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
        } elseif ($_GET['error'] == 'wronglogin') {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Invalid username or password!</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
        }
    }
}



/* LOGIN FUNCTIONS */

/* Function that echoes to input your account */
function emptyInputLogin($usrname, $pass01)
{
    $result;
    if (empty($usrname) || empty($pass01)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

/* Function that check if the user input has already an account on the database  */
function loginUser($conn, $username, $password)
{
    $usernameExists = usrnameExist($conn, $username, $password);

    if ($usernameExists == false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pswHashed = $usernameExists["password"];
    $checkpsw = password_verify($password, $pswHashed);

    if ($checkpsw === false) {
        header("location: ../login.php?error=wronglogin");
    } elseif ($checkpsw === true) {
        session_start();
        $_SESSION["id"] = $usernameExists["id"];
        $_SESSION["username"] = $usernameExists["username"];
        header("location: ../index.php?");
        exit();
    }
}

/* Log in or Log out button sidebar */
function displayLoginOrLogoutLink()
{
    if (isset($_SESSION["id"])) {
        // User is logged in, display Logout link
        echo '
        <li class="nav-item"><a class="nav-link" href="database/logout.inc.php">Log out</a></li>
        <li class="nav-item mr-2"><a class="nav-link" href="index.php">Account</a></li>';
    } else {
        // User is not logged in, display Sign In link
        echo '<li class="nav-item px-3"><a class="nav-link" href="login.php">Sign In</a></li>';
    }
}



/* PRODUCT */
function component($productname, $productprice, $productimg, $productid)
{
    $element = '
    <div class="col-md-6 col-lg-4 col-xl-3"> 
        <div class="card py-3 px-3" style="width: 18rem;">
          <img src="' . $productimg . '" class="card-img-top" alt="Product Image" style="object-fit: cover; height: 200px;">
          <div class="card-body">
            <h5 class="card-title">' . $productname . '</h5>
            <p class="card-text">' . $productprice . '</p>
            <div>
              <div class="d-flex justify-content-between">
                <span>Pro Display XDR</span><span>$5,999</span>
              </div>
              <div class="d-flex justify-content-between">
                <span>Pro stand</span><span>$999</span>
              </div>
              <div class="d-flex justify-content-between">
                <span>Vesa Mount Adapter</span><span>$199</span>
              </div>
            </div>
            <div class="d-flex justify-content-between total font-weight-bold mt-4">
              <span>Total</span><span>$7,197.00</span>
            </div>
            <div class="text-center mt-3">
              <form action="" method="post">
                <button type="submit" name="add" class="btn btn-outline-dark mt-auto">Add to cart</button>
                <input type="hidden" name="product_id" value="' . $productid . '">
              </form>
            </div>
          </div>
        </div>
      </div>
    ';

    echo $element;
}

function GetProduct($conn)
{
    $query = "SELECT product_name, product_price, product_img, id FROM products";
    return $conn->query($query);
}

function cartElement($productname, $productprice, $productimg, $productid)
{
    $element = '
    <div class="card mb-3">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div class="d-flex flex-row align-items-center">
                    <div>
                        <img src="' . $productimg . '" class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                    </div>
                    <div class="ms-3">
                        <h5>' . $productname . '</h5>
                        <p class="small mb-0">Product description</p>
                    </div>
                </div>
                <div class="d-flex flex-row align-items-center">
                    <div style="width: 80px;">
                        <h5 class="mb-0">' . $productprice . '</h5>
                    </div>
                    <form action="cart.php?action=remove&id=' . $productid . '" method="post">
                        <button type="submit" class="btn btn-link" style="color: #cecece;" name="remove">
                            <i class="fas fa-trash-alt text-danger"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>';

    return $element;
}

function CartItemsMSG()
{
    if (isset($_SESSION['cart'])) {
        $count = count($_SESSION['cart']);
        if ($count > 0) {
            echo 'You have ' . $count . ' item(s) in your cart';
        } else {
            echo '<div class="container">
                <div class="row">
                  <div class="col">
                    <div class="alert alert-primary" role="alert">
                      Your cart is empty <a href="index.php" class="alert-link">Go shopping.</a>.
                    </div>
                  </div>
                </div>
              </div>';
        }
    } else {
        echo '<div class="container">
              <div class="row">
                <div class="col">
                  <div class="alert alert-primary" role="alert">
                    Your cart is empty <a href="index.php" class="alert-link">Go shopping.</a>.
                  </div>
                </div>
              </div>
            </div>';
    }
}

function displayCartItems($conn)
{
    $total = 0;
    if (isset($_SESSION['cart'])) {
        $product_id = array_column($_SESSION['cart'], "product_id");
        $result = GetProduct($conn); // Assuming GetProduct() is defined and takes $conn as a parameter

        $cartItems = ''; // Initialize an empty string to store the generated cart items

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                if (in_array($row['id'], $product_id)) {
                    $cartItems .= cartElement($row['product_name'], $row['product_price'], $row['product_img'], $row['id']);
                    $total = $total + (int) $row['product_price'];
                }
            }
        } else {
            // Handle the case when fetching products fails
            $cartItems = "Failed to retrieve products.";
        }

        return $cartItems; // Return the concatenated HTML markup for all cart items
    }
}

function calculateTotal($conn)
{
    $total = 0;

    if (isset($_SESSION['cart'])) {
        $product_id = array_column($_SESSION['cart'], "product_id");
        $result = GetProduct($conn); // Assuming GetProduct() is defined and takes $conn as a parameter

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                if (in_array($row['id'], $product_id)) {
                    $total = $total + (int) $row['product_price'];
                }
            }
        }
    }

    return $total;
}

function displayCartPrice()
{
    if (isset($_SESSION['cart'])) {
        $count = count($_SESSION['cart']);
        echo "<h6>Price($count items)</h6>";
    } else {
        echo "<h6>Price(0 items)</h6>";
    }
}

function displayCheckoutButton()
{
    if (isset($_SESSION['cart'])) {
        $count = count($_SESSION['cart']);
        if ($count > 0) {
            echo '<button class="btn btn-primary mt-3">Checkout</button>';
        } else {
            echo '<a href="home.php" class="btn btn-primary mt-3">You need to add products to your cart</a>';
        }
    }
}

function addToCart($product_id)
{
    if (isset($_SESSION['cart'])) {
        $item_array_id = array_column($_SESSION['cart'], 'product_id');

        if (in_array($product_id, $item_array_id)) {
            echo '<script>alert("Product is already in the cart")</script>';
            echo '<script>window.location = "index.php"</script>';
        } else {
            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $product_id
            );

            $_SESSION['cart'][$count] = $item_array;
        }
    } else {
        $item_array = array(
            'product_id' => $product_id
        );

        // Create new session variable
        $_SESSION['cart'][0] = $item_array;
    }
}

function removeProductFromCart($id)
{
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['product_id'] == $id) {
                unset($_SESSION['cart'][$key]);
                echo '<script>
                        alert("Product has been removed!");
                        window.location = "cart.php";
                      </script>';
                break;
            }
        }
    }
}