<?php
include_once("Login/Db.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link rel="icon" href="./img/titlelogo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/shop.css">
    <script src="https://kit.fontawesome.com/256e5a61f4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css">
</head>
<style>
    a{
        color: black;
    }
</style>
<body>
    <!-- header / navbar -->

    <section id="header">
        <a href="#"> <img src="img/zaralogo.png" class="logo" alt="" width="160px"></a>

        <div>
            <ul id="navbar">
                <li><a href="home.php">Home</a></li>
                <li><a class="active" href="shop.php">Shop</a></li>
                <li><a href="faq.php">FAQ</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li id="lg-bag"><a href="cart.php"><i class="fa-solid fa-bag-shopping"></i></a></li>
                <?php
                session_start();
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
            <a href="cart.php"><i class="fa-solid fa-bag-shopping"></i></a>
            <a href="./Login/index.php"><i class="uil uil-user"></i></a>
            <i id="bar" class="fas fa-outdent"></i>
        </div>
    </section>



    <section id="prodetails" class="section-p1">
        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM product WHERE id='$id'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
        }
        ?>


        <div class="single-pro-image img-zoom-container">
            <img src="<?php echo str_replace('..', '.', $row['product_img']) ?>" width="100%" id="MainImg myresult" alt="">
            <div id="myresult" class="img-zoom-result"></div>
        </div>

<?php
if(isset($_POST["sizes"])){
$size=$_POST["size"];
}
// echo $size;
?>

        <div class="single-pro-details">
            <h6><?php echo $row['category'] ?> </h6>
            <h4><?php echo $row['title'] ?> </h4>
            <h2>&#8360; <?php echo $row['price'] ?></h2>
            <br>
            <form action="" method="POST">
            <select name="size">
                <option value="none">Select Size</option>
                <option value="<?php echo $row['small']; ?>"><?php echo $row['small'] ?></option>
                <option value="<?php echo $row['medium']; ?>"><?php echo $row['medium'] ?></option>
                <option value="<?php echo $row['large']; ?>"><?php echo $row['large'] ?></option>
                <option value="<?php echo $row['xl']; ?>"><?php echo $row['xl'] ?></option>
            </select>
            <button name="sizes" class="btn-primary">Select Size</button>
            </form>
            <br>
            <br>
            <form action="addtocart.php">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input type="hidden" name="size" value="<?php echo $size ?>">
                <input type="number" value="1" name="quantity">
                <a href="addtocart.php?id=<?php echo $id ?>"><button class="normal">Add To Cart</button></a>
                <br><br>
                
                <h4>Product Details</h4>
                <span><?php echo $row['description'] ?></span>
                </form>
                <br>
                <a target="_blank" href="Size-Guide-Online-ladies.pdf"><button class="normal">Size Guide</button></a>
        </div>
    </section>

    <section style="margin-top:100px" ; id="product1" class="section-p1">
        <h2>Featured Products</h2>
        <p>Summer Collection New Morden Design</p>
        <div class="pro-container">
        <?php
            $sql = "SELECT * FROM product LIMIT 4";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $id = $row['id'];
                    echo '
                    <a class="proselect" href="singlepro.php?id=' . $id . '">
                    <div class="pro">
                    <img src="' . str_replace('..', '.', $row['product_img']) . '" >
                <div class="des">
                        <span> ' . $row['category'] . '</span>
                        <h5>' . $row['title'] . '</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                            <h4>&#8360;' . $row['price'] . '</h4>
                    </div>
                    <a href="addtocart.php?id=' . $id . '"><i class="uil uil-shopping-cart cart"></i></a>
                    </div>
                    </a>
                    ';
                }
            }
            ?>

        </div>
    </section>

    <!-- news -->
    <section id="newsletter" class="section-p1 section-m1">
        <div class="newstext">
            <h4>Sign Up For Newsletters</h4>
            <p>Get E-mail updates about our latest shop and <span>special offers.</span>
            </p>
        </div>
        <?php

        use PHPMailer\PHPMailer\PHPMailer;

        if (isset($_REQUEST['email'])) {
            //Import PHPMailer classes into the global namespace
            //These must be at the top of your script, not inside a function

            // use PHPMailer\PHPMailer\SMTP;
            // use PHPMailer\PHPMailer\Exception;

            //Load Composer's autoloader
            include('vendor/autoload.php');

            include 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer();


            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'zarawide.lk@gmail.com';                     //SMTP username
            $mail->Password   = 'zara@123';                               //SMTP password
            $mail->SMTPSecure = "tls";            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('zarawide.lk@gmail.com', 'ZARA-WIDE');
            $mail->addAddress($_POST["email"]);     //Add a recipient              //Name is optional
            

            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            // //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Zara-Wide';
            $mail->Body    = 'Thank you For Subscribe';
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            // $mail->send();
            if ($mail->send()) {
                echo 'Message has been sent';
            } else {
                echo "not";
            }
        }
        ?>


        <form action="" method="post">
            <div class="form">
                <input style="width: 200px;" type="text" name="email" placeholder="Your email address">
                <button class="normal">Sign Up </button>
            </div>
        </form>
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

    <script>
        var MainImg = document.getElementById("MainImg");
        var smallimg = document.getElementsByClassName("small-img");
        smallimg[0].onclick = function() {
            MainImg.src = smallimg[0].src;
        }
        smallimg[1].onclick = function() {
            MainImg.src = smallimg[1].src;
        }
        smallimg[2].onclick = function() {
            MainImg.src = smallimg[2].src;
        }
        smallimg[3].onclick = function() {
            MainImg.src = smallimg[3].src;
        }
    </script>







    <script src="js/site.js"> </script>
</body>

</html>