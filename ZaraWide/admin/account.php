<?php
include_once("header.php");
include_once("../Login/Db.php");
if (isset($_REQUEST['Add'])) {
    if (($_REQUEST['email'] == "") || ($_REQUEST['password'] == "")) {
        $msg = "All Field Required";
    } else {
        $email = $_REQUEST['email'];
        $pass = $_REQUEST['password'];
        


        $sql = "INSERT INTO admin(email,password)VALUES('$email','$pass')";
        if ($conn->query($sql) == TRUE) {
            $msg = "Admin Added Successfully";
        } else {
            $msg = "Admin Added Failed";
        }
    }
}
?>

<link rel="stylesheet" href="../css/contact.css">

<section id="form-details">
    <form action="" method="POST" enctype="multipart/form-data">
        <!--- <span>LEAVE A MESSAGE</span>-->
        <h2>Add Admin</h2>
        <?php if (isset($msg)) echo $msg; ?>
        <input type="text" placeholder="Email Address" name="email">
        <input type="text" placeholder="Password" name="password">


        <button type="submit" name="Add" class="normal" id="">Add</button>
    </form>

</section>