<?php
session_start();

if(isset($_GET['id'])){


    if(isset($_GET['quantity'])){
        $quantity=$_GET['quantity'];

    }else{
        $quantity=1;
    }

    if(isset($_GET['size'])){
        $size=$_GET['size'];

    }else{
        $size=1;
    }
    $id=$_GET['id'];

    $_SESSION['cart'][$id]=array('quantity'=> $quantity,'size'=> $size);
    // $_SESSION['cart'][$id]=array();
    header('location:cart.php');
}

?>
