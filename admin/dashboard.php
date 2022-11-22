<?php
include_once("header.php");
include_once("../Login/Db.php");


$sql="SELECT * FROM users";
$result=$conn->query($sql);
$tot_users=$result->num_rows;

$sql="SELECT * FROM orderdetails";
$result=$conn->query($sql);
$tot_orders=$result->num_rows;

$sql="SELECT * FROM orderitem";
$result=$conn->query($sql);
$tot_sells=$result->num_rows;

$sql="SELECT SUM(price*quantity)
FROM orderitem";
$result=$conn->query($sql);
$tot_sell=$result->num_rows;
echo $tot_sell;
?>


<h3 class="i-name">Dashboard</h3>
<div class="values">
    <div class="val-box">
        <span class="las la-users"></span>
        <div>
            <h3><?php echo $tot_users;?></h3>
            <p>New Users</p>
        </div>
    </div>
    <div class="val-box">
        <span class="las la-shopping-cart"></span>
        <div>
            <h3><?php echo $tot_orders;?></h3>
            <p>Total Orders</p>
        </div>
    </div>
    <div class="val-box">
        <span class="las la-clipboard"></span>
        <div>
            <h3><?php echo $tot_sells;?></h3>
            <p>Product Sell</p>
        </div>
    </div>
    <div class="val-box">
        <span class="las la-wallet"></span>
        <div>
            <h3><?php echo $tot_sell;?></h3>
            <p>This Month</p>
        </div>
    </div>
</div>
<br><br>
<div class="products">
    <table width="100%">
        <thead>
            <tr>
                <td>Item Name</td>
                <td>Status</td>
                <td>Quantity</td>
                <td>Action</td>

            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM product ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $s_img = $row['product_img'];
                    $n_img = str_replace('..', '.', $s_img);
                    $cat  = $row['category'];
                    $tit = $row['title'];
                    $qtn = $row['qtn'];
            ?>
                    <tr>
                    <?php
                    echo '
                        <td class="dress">
                            <img src="' . $row['product_img'] . '" alt="">
                            <div class="dress-de">
                            <h5> ' . $row['category'] . '</h5>
                            </div>
                        </td>

                        <td class="enable"><p>Enable</p></td>
                        
                        <td class="qty">
                            <h5>' . $row['qtn'] . '</h5>
                        </td>
                        <td>
                        <form action="editProduct.php" method="POST" class="d-inline">
                        <input type="hidden" name="id" value='.$row["id"].'>
                        <button type="submit" class="btn-info" name="view" value="View"><i style="color:black;" class="uil uil-pen"></i></button>
                        </form> 
                        
                        <form action="" method="POST" class="d-inline">
                            <input type="hidden" name="id" value=' . $row["id"] . '>
                            <button type="submit" name="delete" value="Delete"> 
                            <i class="uil uil-trash-alt"></i>
                                </button>
                        </form></td>
                        
                    </tr>   ';
                } ?>



        </tbody>
    </table>
<?php }
            if (isset($_REQUEST['delete'])) {
                $sql = "DELETE FROM product WHERE id={$_REQUEST['id']}";
                if ($conn->query($sql) == TRUE) {
                    echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
                } else {
                    echo "Deleted Failed";
                }
            } ?>

</div>
</section>