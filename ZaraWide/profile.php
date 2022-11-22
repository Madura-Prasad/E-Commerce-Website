<?php
include_once("Login/Db.php");
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link rel="icon" href="./img/titlelogo.png" type="image/x-icon">
  
  <link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'><link rel="stylesheet" href="css/profile.css">
    <script src="https://kit.fontawesome.com/256e5a61f4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/home.css">
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
                <li id="lg-bag"><a class="active" href="cart.php"><i class="fa-solid fa-bag-shopping"></i></a></li>
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
            <a href="#"><i class="fa-solid fa-bag-shopping"></i></a>
            <a href="./Login/index.php"><i class="uil uil-user"></i></a>
            <i id="bar" class="fas fa-outdent"></i>

        </div>
    </section>
<!-- partial:index.partial.html -->
<div class=" profile">
  <div class="row-fluid">
    <div class="col-sm-4 col-md-4 col-md-offset-3 user-details">
      <div class="user-image">
        <img alt="" class="img-circle" height="100" src="profile.jpg" title="" width="100" />
      </div>


      <?php

        $sql = "SELECT * FROM  users WHERE name='$_SESSION[name]'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    
    ?>


      <div class="user-info-block">
        <div class="user-heading">
          <h3><?php echo $row['name']; ?></h3>
          <span class="help-block">Recent Orders</span>
        </div>
        <ul class="navigation">
          <li class="active">
            <a href="#information" data-toggle="tab">
              <span class="glyphicon glyphicon-user"></span>
            </a>
          </li>
          <li>
            <a href="#settings" data-toggle="tab">
              <span class="glyphicon glyphicon-cog"></span>
            </a>
          </li>
          <li>
            <a href="#history" data-toggle="tab">
              <span class="glyphicon glyphicon-list-alt"></span>
            </a>
          </li>
          <li>
            <a href="#help" data-toggle="tab">
              <span class="glyphicon glyphicon-question-sign"></span>
            </a>
          </li>
        </ul>
        <div class="user-body">
          <div class="tab-content">
            <div id="information" class="tab-pane active">
              <div class="general-info">
                <h4 class="account-info"><strong>Email:</strong><br><?php echo $row['email']; ?></h4>
                <hr>
                
                <hr>
                <h4 class="account-info"><strong>Phone Number:</strong><br><?php echo $row['phone']; ?></h4>
              </div>
              <a href="logout.php"> <button type="submit" name="update" class="btn btn-default btn btn-primary btn-block">Log Out</button></a>
            </div>
            
            <div id="settings" class="tab-pane">
              <!-- <div class="container"> -->
              <div class="row user-edit-info">
                <div class="col-sm-8">
                  <h4 class="page-header">Edit Your Info<hr>
            <br>
<?php
if (isset($_REQUEST['update'])) {
      $name = $_REQUEST['name'];
      $email = $_REQUEST['email'];
      $phone = $_REQUEST['phone'];
      $password = $_REQUEST['password'];
      
      $sql = "UPDATE users SET name='$name',email='$email',phone='$phone',password='$password' WHERE email='$email'";
      

      if ($conn->query($sql) == TRUE) {
          $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Updated Successfully</div>';
      } else {
          $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Updated Failed</div>';
      }
  }

?>
    <form role="form" class="simple_form new_user" id="new_user"  accept-charset="UTF-8" method="post"><input name="utf8" type="hidden" value="&#x2713;" /><input type="hidden" name="_method" value="patch" /><input type="hidden" name="authenticity_token" value="J6PtTSnx7qA8Xl1MphvloStu55BtpuwBre3d/Wu5u4qy108/WQsJ8XEDlEVF9Rm1TQj8gkXniWVaBTi9nfqQNw==" />

        <div class="form-group float-label-control label-top">
          <div class="form-group string required user_first_name"><label class="string required control-label" for="user_first_name"><abbr title="required">*</abbr> Name</label><input class="string required form-control form-control" type="text" name="name" id="user_first_name"  value="<?php echo $row['name'];?>"/></div>
        </div>
        <div class="form-group float-label-control label-top">
          <div class="form-group email required user_email"><label class="email required control-label" for="user_email"><abbr title="required">*</abbr> Email</label><input class="string email required form-control form-control" name="email" value="<?php echo $row['email']; ?>" /></div>
        </div>
        <div class="form-group float-label-control label-top">
          <div class="form-group tel required user_phone"><label class="tel required control-label" for="user_phone"><abbr title="required">*</abbr> Phone</label><input class="string tel required form-control form-control"name="phone" value="<?php echo $row['phone']; ?>" /></div>
        </div>
        <div class="form-group float-label-control label-top">
          <div class="form-group password optional user_password"><label class="password optional control-label" for="user_password">Password</label><input class="password optional form-control form-control" name="password" value="<?php echo $row['password']; ?>"  /></div>
        </div>

        <button type="submit" name="update" class="btn btn-default btn btn-primary btn-block">Save</button>
</form>
        </div>
    </div>


    <?php
    $email=$_SESSION['email'];
$sql="SELECT * FROM orderitem WHERE email='$email'";
$result=$conn->query($sql);
if($result->num_rows>0){

?>
            </div>
            <div id="history" class="tab-pane">
              <h4>Purchase History</h4>
                  <hr>
                  <br>
                  <table width="100%" style="align-items:center ;">
                    <thead>
                    <tr>
                      <th scope="col">Title</th>
                        <th scope="col">Price</th>
                        <th scope="col">Size</th>
                        <th scope="col">Quantity</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php while($row=$result->fetch_assoc()){
                        echo '<tr>';
                        // echo '  <td> '.$row['email'].' </td>';
                        echo '  <td> '.$row['title'].' </td>';
                        echo '  <td> '.$row['price'].' </td>';
                        echo '  <td> '.$row['size'].' </td>';
                        echo '  <td> '.$row['quantity'].' </td>';
                        echo '</tr>';
                    }
                        ?>  
                    </tbody>
                  </table>
                  <?php } ?>
                </div>
                <div id="help" class="tab-pane user-edit-info">
                  <h4>Ask a Question</h4>
                  <hr>
                  <br>
                  <form role="form">
                    <div class="form-group float-label-control label-top">
                      <label for="">Your question...</label>
                      <textarea class="form-control" placeholder="Your question..." rows="3"></textarea>
                    </div>
                    <button class="btn btn-primary btn-block">
                      Send <span class="glyphicon glyphicon-send"> </span>
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


<!-- ==== FOOTER ==== -->
<!-- <footer class="section-p1">
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
            <a href="#">About us</a>
            <a href="#">Delivery Information</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms & Conditions</a>
            <a href="#">Contact Us</a>
        </div>

        <div class="col">
            <h4>My Account</h4>
            <a href="#">Sign In</a>
            <a href="#">View Cart</a>
            <a href="#">Help</a>
        </div>

        <div class="col install">

            <p>Secured Payment Gateways </p>
            <img src="./img/pay.png" alt="">
        </div>

        <div class="copyright">
            <p> Copyright-2022 - © Zara Wide </p>
        </div>

    </footer> -->
<!-- partial -->
  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>
</body>
</html>
