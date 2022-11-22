<?php

session_start();
include("Db.php");
$errors=[];


if(isset($_POST['login'])){

    $sigInEmail=$_POST['email2'];
    if(empty($sigInEmail)){
        $error_msg['Email2'] = "Email Address is Required";
    }
    
    $signInPassword=$_POST['password2'];
        if(empty($signInPassword)){
            $error_msg['Password2'] = "Password is Required";
        }
    

    if($sigInEmail && $signInPassword){
    // $signInPassword=md5($signInPassword);
    $sql="SELECT * FROM users WHERE email='".$sigInEmail."' AND password='".$signInPassword."'";
    if($user_data=$conn->query($sql)){
        if($user_data->num_rows > 0){
            $user=mysqli_fetch_assoc($user_data);
            $_SESSION['id']=$user['id'];
            $_SESSION['email']=$user['email'];
            $_SESSION['name']=$user['name'];
            header("Location: ../home.php");
            exit;
            //success login
        }else{
            $errors[]="Recheck Email & Password";
        }
    }else{
        $errors[]="Logging Failed";
    }
}
}
include("index.php");
?>