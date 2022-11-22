<?php
include_once("header.php");
include_once("../Login/Db.php");
?>


<link rel="stylesheet" href="../css/contact.css">

<?php
if (isset($_REQUEST['Update'])) {
    
        $id = $_REQUEST['id'];
        $category = $_REQUEST['category'];
        $title = $_REQUEST['title'];
        $price = $_REQUEST['price'];
        $quantity = $_REQUEST['quantity'];
        $small = $_REQUEST['small'];
        $medium = $_REQUEST['medium'];
        $large = $_REQUEST['large'];
        $xl = $_REQUEST['xl'];
        $desc = $_REQUEST['desc'];

        $sql = "UPDATE product SET id='$id',category='$category',title='$title',price='$price',qtn='$quantity',description='$desc',small='$small',medium='$medium',large='$large',xl='$xl' WHERE id='$id'";

        if ($conn->query($sql) == TRUE) {
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Updated Successfully</div>';
            echo "<script>setTimeout(()=>{window.location.href='dashboard.php';},0);</script>";
        } else {
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Updated Failed</div>';
        }
    
}
?>



<section id="form-details">
    <form action="" method="POST" enctype="multipart/form-data">
        <!--- <span>LEAVE A MESSAGE</span>-->
        <h2>Update Product</h2>

        <?php
        if (isset($_REQUEST['view'])) {
            $sql = "SELECT * FROM product WHERE id={$_REQUEST['id']}";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
        }
        ?>


        <?php if (isset($msg)) echo $msg; ?>
        <label for="">ID</label>
        <input type="text" placeholder="ID" name="id" value="<?php if (isset($row['id'])) {
                                                                        echo $row['id'];
                                                                    } ?>" readonly>
        <label for="">Category</label>
        <input type="text" placeholder="Category" name="category" value="<?php if (isset($row['category'])) {
                                                                                echo $row['category'];
                                                                            } ?>">
        <label for="">Title</label>
        <input type="text" placeholder="Title" name="title" value="<?php if (isset($row['title'])) {
                                                                        echo $row['title'];
                                                                    } ?>">
        <label for="">Price</label>
        <input type="text" placeholder="Price" name="price" value="<?php if (isset($row['price'])) {
                                                                        echo $row['price'];
                                                                    } ?>">
        <label for="">Quantity</label>
        <input type="text" placeholder="Quantity" name="quantity" value="<?php if (isset($row['qtn'])) {
                                                                                echo $row['qtn'];
                                                                            } ?>">
        <label for="">Small</label>
        <input type="text" placeholder="Small" name="small" value="<?php if (isset($row['small'])) {
                                                                        echo $row['small'];
                                                                    } ?>">
        <label for="">Medium</label>
        <input type="text" placeholder="Medium" name="medium" value="<?php if (isset($row['medium'])) {
                                                                            echo $row['medium'];
                                                                        } ?>">
        <label for="">large</label>
        <input type="text" placeholder="Large" name="large" value="<?php if (isset($row['large'])) {
                                                                        echo $row['large'];
                                                                    } ?>">
        <label for="">Xl</label>
        <input type="text" placeholder="Xl" name="xl" value="<?php if (isset($row['	xl'])) {
                                                                    echo $row['	xl'];
                                                                } ?>">



        <label for="">Description</label>
        <textarea id="" cols="30" rows="10" name="desc" placeholder="Description"><?php if (isset($row['description'])) {
                                                                                        echo $row['description'];
                                                                                    } ?></textarea>
        <img style="height: 300px; width:400px;" src="<?php if (isset($row['product_img'])) {
                                                            echo $row['product_img'];
                                                        } ?>" alt="" class="img-thumbnail">


        <button type="submit" name="Update" class="normal" id="">Update</button>
    </form>

</section>