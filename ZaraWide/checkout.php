<?php
session_start();
$cart =  $_SESSION['cart'];
include_once("Login/Db.php");
//print_r($cart);
$uemail = $_SESSION['email'];

?>
<!DOCTYPE html>
<html>

<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</head>
<?php
if (isset($_SESSION['cart'])) {
    $total = 0;
    foreach ($cart as $key => $value) {
        // echo $key . ":" . $value['quantity'] . "<br>";

        $sql = "SELECT * FROM product WHERE id=$key";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $total = $total + ($row['price'] * $value['quantity']);
    } ?>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>





    <body class="bg-dark">


        <div class="container text-light">

            <section id="content">
                <div class="content-blog">
                    <div class="page_header text-center py-5">
                        <h2>Zara Wide - Checkout</h2>
                    </div>

                    <form action="" method="post">
                        <div class="container ">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="billing-details">
                                        <h3 class="uppercase">Billing Details</h3>
                                        <div class="space30"></div>
                                        <form>
                                            <div class="clearfix space20"></div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>First Name </label>
                                                    <input class="form-control" placeholder="" value="" type="text" name="fname">
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Last Name </label>
                                                    <input class="form-control" placeholder="" value="" type="text" name="lname">
                                                </div>
                                            </div>
                                            <div class="clearfix space20 mt-3"></div>
                                            <label>Address </label>
                                            <input class="form-control" placeholder="Street address" value="" type="text" name="address">
                                            <br>
                                            <div class="clearfix space20"></div>
                                            <input class="form-control" placeholder="Apartment, suite, unit etc. (optional)" value="" type="text" name="address1">
                                            <div class="clearfix space20"></div>
                                            <div class="row mt-3">
                                                <div class="col-md-6">
                                                    <label>Town / City </label>
                                                    <input class="form-control" placeholder="Town / City" value="" type="text" name="city">
                                                </div>
                                                <!-- <div class="col-md-4">
                                                <label>County</label>
                                                <input class="form-control" value="" placeholder="State / County" type="text">
                                            </div> -->
                                                <div class="col-md-6">
                                                    <label>Postcode </label>
                                                    <input name="pcode" class="form-control" placeholder="Postcode / Zip" value="" type="text">
                                                </div>
                                            </div>
                                            <div class="clearfix space20 mt-3"></div>
                                            <label>Email Address </label>
                                            <input class="form-control" placeholder="" value="" type="text" name="email">
                                            <div class="clearfix space20 mt-3"></div>
                                            <label>Phone </label>
                                            <input class="form-control" id="billing_phone" placeholder="" value="" type="text" name="phone">
                                        </form>
                                        <div class="float-left ml-3 mt-3">
                                            <input type="checkbox" name="tick" value="tick">
                                            <label class="ml-2" for="">Ship to Same as Address</label>
                                        </div>
                                    </div>
                                </div>







                                <div class="col-md-6 tick box" id="myCheck">
                                    <div class="billing-details">
                                        <h3 class="uppercase">Ship to a different address?</h3>
                                        <div class="space30"></div>
                                        <form>
                                            <div class="clearfix space20"></div>
                                            <div class="row">
                                                <div class="col-md-6 ">
                                                    <label>First Name </label>
                                                    <input class="form-control" placeholder="" value="" type="text">
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Last Name </label>
                                                    <input class="form-control" placeholder="" value="" type="text">
                                                </div>
                                            </div>
                                            <div class="clearfix space20 mt-3"></div>
                                            <label>Address </label>
                                            <input class="form-control" placeholder="Street address" value="" type="text">
                                            <br>
                                            <div class="clearfix space20"></div>
                                            <input class="form-control" placeholder="Apartment, suite, unit etc. (optional)" value="" type="text">
                                            <div class="clearfix space20"></div>
                                            <div class="row mt-3">
                                                <div class="col-md-6">
                                                    <label>Town / City </label>
                                                    <input class="form-control" placeholder="Town / City" value="" type="text">
                                                </div>
                                                <!-- <div class="col-md-4">
                                                <label>County</label>
                                                <input class="form-control" value="" placeholder="State / County" type="text">
                                            </div> -->
                                                <div class="col-md-6">
                                                    <label>Postcode </label>
                                                    <input class="form-control" placeholder="Postcode / Zip" value="" type="text">
                                                </div>
                                                <div class="clearfix space20 mt-3 ml-2"></div>
                                                <label>Email Address </label>
                                                <input class="form-control ml-2" placeholder="" value="" type="text" name="email">
                                                <div class="clearfix space20 mt-3 ml-2"></div>
                                                <label>Phone </label>
                                                <input class="form-control" id="billing_phone" placeholder="" value="" type="text" name="phone">
                                            </div>
                                        </form>

                                    </div>

                                </div>


                                <script>
                                    $(document).ready(function() {
                                        $('input[type="checkbox"]').click(function() {
                                            var inputValue = $(this).attr("value");
                                            $("." + inputValue).toggle();
                                        });
                                    });
                                </script>
                            </div>

                            <div class="space30"></div>
                            <h4 class="heading mt-4">Your order</h4>
                            <table class="table table-bordered extra-padding bg-white text-dark">

                                <tbody>


                                    <tr>
                                        <th>Cart Subtotal</th>
                                        <td><span class="amount">&#8360; <?php echo $total;  ?></span></td>
                                    </tr>
                                    <tr>
                                        <th>Shipping and Handling</th>
                                        <td>
                                            Free Shipping
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Order Total</th>
                                        <td><strong><span class="amount">&#8360; <?php echo $total;  ?></span></strong> </td>
                                    </tr>
                                <?php

                            }
                                ?>
                                </tbody>
                            </table>

                            <div class="clearfix space30"></div>
                            <h4 class="heading mt-5">Payment Method</h4>
                            <div class="clearfix space20"></div>

                            <div class="payment-method mt-4 ml-3">

<script>
    function text(x){
        if(x==1) document.getElementById("card1").style.display="block";
        else document.getElementById("card1").style.display="none";
        return;
    }
</script>

                                <div class="row d-flex">

                                    <div class="col-md-6">
                                        <input name="payment1" class="btn btn-primary" value="COD" type="radio" onclick="text(0)">
                                        <span>Cash On delivery</span>
                                        <div class="space20" > </div>
                                        
                                    </div>
                                    <div class="col-md-6">
                                        <input name="payment" id="cardC" class="btn btn-primary text-primary" value="CARD" type="radio" onclick="text(1)" 
                                        checked>
                                    
<span>Card Payment</span>
<br><br>
<div id="card1">
    
<button class="btn btn-warning">GO</button></a>
<br><br>
<p style="color:red ; width:250px;">This Function is Under Developing! please go Cash On delivery Payment Method...</p>
</div>


                                        <div class="space20">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <button class="btn mt-5" name="pay" type="submit">Buy Now</button>

                                    </div>
                                </div>
                                <div class="space30"></div>
                                <div class="space30"></div>
                            </div>
                        </div>
                    </form>

                </div>
                <br><br>
            </section>
        </div>
    </body>

    <?php
    if (isset($_REQUEST['pay'])) {
        if (($_REQUEST['fname'] == "") || ($_REQUEST['lname'] == "") || ($_REQUEST['address'] == "") || ($_REQUEST['city'] == "") ||  ($_REQUEST['pcode'] == "") ||  ($_REQUEST['email'] == "") ||  ($_REQUEST['phone'] == "")) {
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2 text-center">All Fields Required</div>';
        } else {
            $fname = $_REQUEST['fname'];
            $lname = $_REQUEST['lname'];
            $address = $_REQUEST['address'];
            $address1 = $_REQUEST['address1'];
            $city = $_REQUEST['city'];
            $pcode = $_REQUEST['pcode'];
            $email = $_REQUEST['email'];
            $phone = $_REQUEST['phone'];
            // $method=$_REQUEST['payment1'];
            $method="COD";


            $sql = "INSERT INTO orderdetails(fname, lname, address, address1, city, pcode, email, phone,method) VALUES ('$fname','$lname','$address','$address1','$city','$pcode','$email','$phone','$method')";

            if ($conn->query($sql) == TRUE) {




                foreach ($cart as $key => $value) {

                    $sql_cart = "SELECT * FROM product WHERE id=$key";
                    $result_cart = mysqli_query($conn, $sql_cart);
                    $row_cart = mysqli_fetch_assoc($result_cart);

                    $title = $row_cart['title'];
                    $price = $row_cart['price'];
                    $qtn = $value['quantity'];
                    $size = $value['size'];
                    $sql_cart = "INSERT INTO orderitem( email, title, price, quantity,size) VALUES ('$uemail','$title','$price','$qtn','$size')";
                    if ($conn->query($sql_cart) == TRUE) {
                        echo "<script>setTimeout(()=>{window.location.href='popupbox.php';},0);</script>";
                    }
                }
            } else {
                $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Updated Failed</div>';
            }
        }
    }
    if (isset($msg)) {
        echo $msg;
    }



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
        $mail->Subject = 'Order Confirm';
        $mail->Body    = '<b>Thank you for Ordering From Us</b>';
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        // if ($mail->send()) {
        //     echo 'Message has been sent';
        // } else {
        //     echo "not";
        // }
    }
    ?>










</html>