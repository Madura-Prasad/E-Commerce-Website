<?php
include_once("Login/Db.php");
if (isset($_REQUEST['sent'])) {
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $subject = $_REQUEST['subject'];
    $msg = $_REQUEST['msg'];

    $sql="INSERT INTO contact(name, email, subj, msg) VALUES ('$name','$email','$subject','$msg')";

    if($conn->query($sql) == TRUE){

    }else{
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="icon" href="./img/titlelogo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/contact.css">
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
                <li><a class="active" href="#">Contact</a></li>
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

        <h2>#let's_talk</h2>
        <p>LEAVE A MESSAGE, We love to hear from you!</p>

    </section>

    <section id="contact-details" class="section-p1">
        <div class="details">
            <span>GET IN TOUCH</span>
            <h2>Visit our locations or contact us today</h2>
            <h3>Head Office</h3>
            <div>
                <li>
                    <i class="uil uil-map-marker"></i>
                    <p>No 48, St Charles Lane, Willorawatta, Moratuwa</p>
                </li>
                <li>
                    <i class="uil uil-envelope"></i>
                    <p>zarawide.lk@gmail.com</p>
                </li>
                <li>
                    <i class="uil uil-phone"></i>
                    <p>+94 778 181 347</p>
                </li>
                <li>
                    <i class="uil uil-clock-eight"></i>
                    <p>10:00 - 18:00, Mon - Sat</p>
                </li>
            </div>
        </div>

        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.860473031532!2d79.90034941523166!3d6.7868283219277625!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2456ea6c3cc6b%3A0xfa442bc4064c809!2s48%20St%20Charles%20Ln%2C%20Moratuwa!5e0!3m2!1sen!2slk!4v1648402009516!5m2!1sen!2slk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>


    <section id="form-details">
        <form action="" method="POST">
            <span>LEAVE A MESSAGE</span>
            <h2>We love to hear from you</h2>
            <input type="text" placeholder="Your Name" name="name" required>
            <input type="text" placeholder="E-mail" name="email" required>
            <input type="text" placeholder="Subject" name="subject" required>
            <textarea id="" cols="30" rows="10" name="msg" required placeholder="Your Message"></textarea>
            <button type="submit" name="sent" class="normal">Sent Message</button>
        </form>

        <div class="people">
            <div>
                <img src="./img/2.png" alt="">
                <p><span>Upeka Sanjeewani</span> Proprietor <br> Phone: + 94 123
                    040 77 88 <br>Email: zarawide.lk@gmail.com</p>
            </div>
            <div>
                <img src="./img/1.png" alt="">
                <p><span>Nuwan Perera</span> Senior Marketing Manager <br> Phone: + 94 123
                    050 77 88 <br>Email: zarawide.lk@gmail.com</p>
            </div>
            <div>
                <img src="./img/3.png" alt="">
                <p><span>Sarangi Imashini</span> Customer Support <br> Phone: + 94 123
                    060 77 88 <br>Email: zarawide.lk@gmail.com</p>
            </div>
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







    <script src="js/site.js"> </script>
</body>

</html>