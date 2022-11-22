<?php
error_reporting(0);
ini_set('display_errors', 0);
include_once("header.php");
include_once("../Login/Db.php");
if (isset($_REQUEST['Add'])) {
    if (($_REQUEST['category'] == "") || ($_REQUEST['title'] == "") || ($_REQUEST['price'] == "") || ($_REQUEST['desc'] == "") || ($_REQUEST['quantity'] == "")) {
        $msg = "All Field Required";
    } else {
        $cate = $_REQUEST['category'];
        $title = $_REQUEST['title'];
        $price = $_REQUEST['price'];
        $qtn = $_REQUEST['quantity'];
        $desc = $_REQUEST['desc'];
        $small = $_REQUEST['small'];
        $medium = $_REQUEST['medium'];
        $large = $_REQUEST['large'];
        $xl = $_REQUEST['xl'];
        $product_image = $_FILES['product_img']['name'];
        $product_image_temp = $_FILES['product_img']['tmp_name'];
        $img_folder = '../Images/product/' . $product_image;
        move_uploaded_file($product_image_temp, $img_folder);


        $sql = "INSERT INTO product(category,title,price,qtn,product_img,description,small,medium,large,xl)VALUES('$cate','$title','$price','$qtn','$img_folder','$desc','$small' ,'$medium','$large','$xl')";
        if ($conn->query($sql) == TRUE) {
            $msg = "Product Added Successfully";
        } else {
            $msg = "Product Added Failed";
        }
    }
}
?>

<link rel="stylesheet" href="../css/contact.css">

<section id="form-details">
    <form action="" method="POST" enctype="multipart/form-data">
        <!--- <span>LEAVE A MESSAGE</span>-->
        <h2>Add Product</h2>
        <?php if (isset($msg)) echo $msg; ?>
        <input type="text" placeholder="Category" name="category">
        <input type="text" placeholder="Title" name="title">
        <input type="text" placeholder="Price" name="price">
        <input type="text" placeholder="Quantity" name="quantity">

        <div style="width:200px;border-radius:6px;margin-top:-10px ">
            <table>
                <tr>
                    <td colspan="2">Select Sizes:</td>
                </tr>
                <tr>
                    <td>Small</td>
                    <td><input class="ch" type="checkbox" name="small" value="S"></td>
                </tr>
                <tr>
                    <td>Medium</td>
                    <td><input class="ch" type="checkbox" name="medium" value="M"></td>
                </tr>
                <tr>
                    <td>Large</td>
                    <td><input class="ch" type="checkbox" name="large" value="L"></td>
                </tr>
                <tr>
                    <td>XL</td>
                    <td><input class="ch" type="checkbox" name="xl" value="XL"></td>
                </tr>
                <tr>
                </tr>
            </table>
        </div>
        <!-- <input  class="ch" type="checkbox"  name="S" value="S">  <span> Small </span> 
        <input  class="ch" type="checkbox"  name="M" value="M"><label for="M"> Medium</label>
        <input class="ch"  type="checkbox"  name="L" value="L"><label for="L"> Large</label>
        <input  class="ch" type="checkbox"  name="XL" value="XL"><label for="XL"> XL</label>
        <input  class="ch" type="checkbox"  name="xxl" value="xxl"><label for="xxl"> XXL</label> -->
        <textarea id="" cols="30" rows="10" name="desc" placeholder="Description"></textarea>
        <input type="file" id="product_img" name="product_img">


        <button type="submit" name="Add" class="normal" id="">Add</button>
    </form>

</section>