<?php
session_start();
$cart =  $_SESSION["cart"];
include_once("Login/Db.php");
// print_r($cart);
error_reporting(0);
ini_set('display_errors', 0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="icon" href="./img/titlelogo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/cart.css">
    <script src="https://kit.fontawesome.com/256e5a61f4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css">
</head>
<body>
    <!-- header / navbar -->

    <section id="header">
        <a href="home.php"> <img src="img/zaralogo.png" class="logo" alt="" width="160px"></a>

        <div>
            <ul id="navbar">
                <li><a href="home.php">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="faq.php">FAQ</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li id="lg-bag"><a class="active" href="#"><i class="fa-solid fa-bag-shopping"></i></a></li>
                <?php
                // session_start();
                if (isset($_SESSION['name'])) {
                    echo '
                    <a href="profile.php">Welcome !<br> ' .$_SESSION['name'].'</a>';
                } else {
                    echo '  <li id="lg-bag"><a href="./Login/index.php"><i class="uil uil-user"></i></a></li>';
                }
                ?>
                <a href="#" id="close"><i class="uil uil-times"></i></a>
            </ul>
        </div>
        <div id="mobile">
            <a href="#"><i class="fa-solid fa-bag-shopping"></i></a>
            <a href="./Login/index.php"><i class="uil uil-user"></i></a>
            <i id="bar" class="fas fa-outdent"></i>

        </div>
    </section>

    <!-- home banner -->
    <section id="page-header">

        <h2>#let's_talk</h2>
        <p>LEAVE A MESSAGE, We love to hear from you!</p>

    </section>

    <section id="cart" class="section-p1">
        <table width="100%">
            <thead>
                <tr>
                    <td>Remove</td>
                    <td>Image</td>
                    <td>Product</td>
                    <td>Price</td>
                    <td>Size</td>
                    <td>Quantity</td>
                    <td>Subtotal</td>

                </tr>
            </thead>
            <tbody>

                <?php
                $total = 0;
                foreach ($cart as $key => $value) {
                    //echo $key . ":" . $value['quantity'] . "<br>";
                    //echo $key . ":" . $value['size'] . "<br>";

                    $sql = "SELECT * FROM product WHERE id=$key";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result)

                ?>
                    <tr>
                        <td><a href="deletecart.php?id=<?php echo $key; ?>"> <i class="uil uil-trash-alt"></i></a></td>
                        <td><img src="<?php echo str_replace('..', '.', $row['product_img']) ?>" alt=""></td>
                        <td><?php echo $row['title']  ?></td>
                        <td>&#8360; <?php echo $row['price']  ?></td>
                        <td><?php echo $value['size']?></td>
                        <td><?php echo $value['quantity']?></td>
                        <td>&#8360; <?php echo $row['price'] * $value['quantity'] ?></td>
                    </tr>
                <?php
                    $total = $total + ($row['price'] * $value['quantity']);
                }
                ?>
            </tbody>
        </table>
    </section>

    <section id="cart-add" class="section-p1">
        <div id="coupon">
            <!-- <h3>Apply Coupon</h3>
            <div>
                <input type="text" placeholder="Enter Your Coupon">
                <button class="normal">Apply</button>
            </div> -->
        </div>
        <div id="subtotal">
            <h3>Cart Totals</h3>
            <table>
                <tr>
                    <td>Cart Subtotal</td>
                    <td>&#8360; <?php echo $total;  ?></td>
                </tr>
                <tr>
                    <td>Shipping</td>
                    <td>Free</td>
                </tr>
                <tr>
                    <td><strong>Total</strong></td>
                    <td><strong>&#8360; <?php echo $total;  ?></strong></td>
                </tr>
            </table>
            <?php
            if (!isset($_SESSION['name'])) {
                echo '
    <a href="Login/index.php"><button class="normal"> Checkout</button></a>
    ';
            } else {
                echo '
    <a href="checkout.php"><button name=
    "checkout" class="normal"> Checkout</button></a>

    ';
            }
            ?>

        </div>

    </section>


    <!-- footer -->
    <footer class="section-p1">
        <div class="col">
            <img class="logo" src="./img/zaralogo.png" width="250px" alt="">
            <h4>Contact</h4>
            <p><strong>Address:</strong> <span> No 48, St Charles Lane, Willorawatta, Moratuwa.</span> </p>
            <p><strong>Phone :</strong> +94 778 181 347</p>
            <p><strong>Hours :</strong> 10:00 - 18:00, Mon - Sat</p>
            <div class="follow">
                <h4>Follow us</h4>
                <div class="icon">
                    <a href="https://www.facebook.com/myzarawidelk" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/myzarawidelk/" target="_blank"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>

        <div class="col">
            <h4>About</h4>
            <a href="./about.php">About us</a>
            <a href="./faq.php">Delivery Information</a>
            <a href="./faq.php">Privacy Policy</a>
            <a href="./admin/index.php">Admin</a>
            <a href="./contact.php">Contact Us</a>
        </div>

        <div class="col">
            <h4>My Account</h4>
            <a href="#">Profile</a>
            <a href="./Login/index.php">Sign In</a>
            <a href="./cart.php">View Cart</a>
            <a href="./contact.php">Help</a>
        </div>

        <div class="col install">

            <p>Secured Payment Gateways </p>
            <img src="./img/pay.png" alt="">
        </div>

        <div class="copyright">
            <p> Copyright-2022 - © Zara Wide </p>
        </div>

    </footer>
    <!-- 
<?php
foreach ($cart as $key => $value) {
    // echo $key . ":" . $value['quantity'] . "<br>";

    $sql = "SELECT * FROM product WHERE id=$key";
    $result_cart = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result)

?>
                   <form action="" method="post">
                       
                        <input type="text" name="title1"  value="<?php echo $row['title']   ?>">
                        <input type="text" name="price1"  value="<?php echo $row['price']   ?>">
                    
                        <input type="number" name="qtn1" value="<?php echo $value['quantity']   ?>" readonly>
                        </form>  
                    
                <?php

            }
                ?>




<?php
$user_email = $_SESSION['email'];
$title1 = $row['title'];
if (isset($_REQUEST['checkout'])) {
    echo $title1;
}
?> -->





    <script src="js/site.js"> </script>
</body>

</html>