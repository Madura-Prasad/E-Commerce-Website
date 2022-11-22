<?php
include("Login/Db.php");

$output='';
$sql="SELECT * FROM product WHERE title LIKE '%".$_POST["search"]."%'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_array($result)){
        $output .='
        <section id="product1" class="section-p1">

        <div class="pro-container">
        <a class="proselect" href="singlepro.php?id='.$row["id"].'">
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
        <a href="addtocart.php?id=' . $row["id"] . '"><i class="uil uil-shopping-cart cart"></i></a>
        </div>
        </a>
        ';
    }
    echo $output;?>
    

<?php }else{ echo "<p class='text-dark p-2 fw-bolder'>Product Not Found. </p>";} 

?>
<link rel="stylesheet" href="css/shop.css">

