<?php
include("Login/Db.php");
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<style>
    a{
        color: black;
    }
</style>
<body>
    <!-- header / navbar -->

    <section id="header">
        <a href="home.php"> <img src="img/zaralogo.png" class="logo" alt="" width="160px"></a>

        <div>
            <ul id="navbar">
                <li><a href="home.php">Home</a></li>
                <li><a class="active" href="#">Shop</a></li>
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

    <!-- home banner -->
    <section id="page-header">


        <h2>#stayhome_staysafe</h2>
        <p> Shop Easy & Save Time</p>
    </section>
    <br><br><br>
    <div class="reveal">
        <input class="center-block" placeholder="Search" id="search_text" name="search_text">
    </div>

    <script>
        $(document).ready(function() {
            $('#search_text').keyup(function() {
                var txt = $(this).val();
                if (txt != '') {
                    $('#result').html('');
                    $.ajax({
                        url: "shop_fetch.php",
                        type: "post",
                        data: {
                            search: txt
                        },
                        dataType: "text",
                        success: function(data) {
                            $('#result').html(data);
                        }
                    });
                } else {}
            });
        });
    </script>


    <style>
        input{
            font-weight: 600;
            font-size: 16px;
        }
        .center-block {
            margin: auto;
            display: block;
            height: 32px;
            width: 300px;
            border: 1px;
            border-radius: 11px;
            text-align: center;
            box-shadow: 0px 20px 40px 0 rgba(11 2 5 /35%);
        }
        .center-block :active{
            box-shadow: 0px 20px 40px 0 rgba(11 2 5 /35%);
        }
    </style>
    <!-- popular products -->
    <section id="product1" class="section-p1 reveal">
        <div id="result"></div>
        <br><br><br><br><br><br><br><br><br>
        <div class="pro-container">
            <?php
            $sql = "SELECT * FROM product ";
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

    <section id="pagination" class="section-p1">

        <a href="#">1</a>
        <a href="#">2</a>
        <a href="#"><i class="uil uil-angle-double-right"></i></a>

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

if(isset($_REQUEST['email'])){
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function

// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
include ('vendor/autoload.php');

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
    if($mail->send()){
    echo 'Message has been sent';
    }else{
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
        //Animation Scroll
        function reveal() {
            var reveals = document.querySelectorAll(".reveal");

            for (var i = 0; i < reveals.length; i++) {
                var windowHeight = window.innerHeight;
                var elementTop = reveals[i].getBoundingClientRect().top;
                var elementVisible = 150;

                if (elementTop < windowHeight - elementVisible) {
                    reveals[i].classList.add("active");
                } else {
                    reveals[i].classList.remove("active");
                }
            }
        }

        window.addEventListener("scroll", reveal);
    </script>




    <script src="js/site.js"> </script>
</body>

</html>