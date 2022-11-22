<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ</title>
    <link rel = "icon" href ="./img/titlelogo.png" type = "image/x-icon">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/faq.css">
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
                  <li><a class="active" href="#">FAQ</a></li>
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
            
      <h2>#FAQ</h2>
      <p>Frequently Asked Question</p>
      
  </section>

   
  <section class="faqs reveal">

        
        <div class="container faqs__container">
            <article class="faq">
                <div class="faq__icon"><i class="uil uil-plus"></i></div>
                <div class="question__answer ">
                    <h4>How does your shipping service work?</h4>
                    <p> We know how important it is to receive your goods when you expect them, especially if you have ordered something for a specific occasion, and we use large network of courier to deliver goods from Zarawide to all over Sri Lanka.</p>
                </div>
            </article>

            <article class="faq">
                <div class="faq__icon"><i class="uil uil-plus"></i></div>
                <div class="question__answer ">
                    <h4>Our Shipping Information?</h4>
                    <p>Courier Company: CityPak.

                    Your parcel will arrive within 2-3 working days (excluding weekends and public holidays) after you place your order.

                    Orders must be placed before 2pm to benefit from the 24 to 48 working hours delivery service.

                    Delivery apart from Colombo 1 – 15 & suburbs will be delivered within 2 – 4 working days.

                    Your order will be delivered by CityPak and a signature will be required on receipt of your order.

                    If you’re not in when your parcel arrives, a card will be left telling you how to pick up your order or rearrange delivery.

                    Deliveries are not made on Public & Mercantile holidays, so you can expect your order to arrive the next working day.

                    Do not accept parcel if the seal is broken.

                    Cash on Delivery will have an additional set fee due to maintenance purposes.</p>
                </div>
            </article>

            <article class="faq">
                <div class="faq__icon"><i class="uil uil-plus"></i></div>
                <div class="question__answer ">
                    <h4>Do you deliver to work addresses?</h4>
                    <p>We can deliver to your permanent residential address or your place of employment. If you want your delivery to reach
                        you at work, you need to be confident that someone will be there to take receipt of the goods as the courier will
                        deliver to the place not the person. </p>
                </div>
            </article>

            <article class="faq">
                <div class="faq__icon"><i class="uil uil-plus"></i></div>
                <div class="question__answer ">
                    <h4>Is my order on its way to me?</h4>
                    <p>You’ll receive a confirmation email from our customer care team once your order is on its way, including the expected
                        delivery date.

                        If your order is trackable, there will be a tracking link on the email. Simply click on your tracking link to view the up-to-
                        date tracking.

                        Make sure you check the expected delivery date on your email before contacting us about your order.</p>
                </div>
            </article>

            <article class="faq">
                <div class="faq__icon"><i class="uil uil-plus"></i></div>
                <div class="question__answer ">
                    <h4>Can I track my order?</h4>
                    <p>For Express shipping tracking is available via the tracking link on your confirmation email. </p>
                </div>
            </article>

            <article class="faq">
                <div class="faq__icon"><i class="uil uil-plus"></i></div>
                <div class="question__answer ">
                    <h4>What happens if I’m not in when my order arrives?</h4>
                    <p>If you’re not in when your parcel arrives, a card will be left telling you how to pick up your order or rearrange delivery. </p>
                </div>
            </article>

            <article class="faq">
                <div class="faq__icon"><i class="uil uil-plus"></i></div>
                <div class="question__answer ">
                    <h4>Can I amend my delivery details?</h4>
                    <p>We are unable to amend any part of your order or change the delivery or payment method once your order is complete. </p>
                </div>
            </article>


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
    $mail->Body    = 'Thank You For Subscribe';
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
        <p><strong>Address:</strong> <span>  No 48, St Charles Lane, Willorawatta, Moratuwa.</span> </p>
        <p><strong>Phone  :</strong> +94 778 181 347</p>
        <p><strong>Hours  :</strong> 10:00 - 18:00, Mon - Sat</p>
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