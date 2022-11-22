<?php
include_once("header.php");
include_once("../Login/Db.php");
?>
<div class="products" style="margin-top: 100px;" >


<!-- <?php
$email=$_REQUEST['email'];
    if (isset($_REQUEST['view'])) {
        $sql = "SELECT * FROM orderdetails WHERE email='$email'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }



    ?>
<input type="hidden" name="email" value=<?php if (isset($row['email'])) {
                                                                                                echo $row['email'];
                                                                                            } ?>> -->



<?php
$sql="SELECT * FROM orderitem WHERE email='$email'";
$result=$conn->query($sql);
if($result->num_rows>0){

?>
<table width="100%">
                <thead>
                    <tr>
                        <!-- <th scope="col">Email</th> -->
                        <th scope="col">Title</th>
                        <th scope="col">Price</th>
                        <th scope="col">Size</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Action</th>
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
                        echo '<td>';
                        echo '
                        <form action="" method="POST">
                            <input type="hidden" name="id" value='.$row["id"].'>
                            <button type="submit" name="delete" value="Delete"> 
                            <i class="uil uil-trash-alt"></i>
                                </button>
                        </form>
                        </td>
                        </tr>';
                    }
                        ?>  
                </tbody>
            </table>
            <?php } 
            if(isset($_REQUEST['delete'])){
                $sql="DELETE FROM orderitem WHERE id={$_REQUEST['id']}";
                if($conn->query($sql)==TRUE){
                    echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
                }
                else{
                    echo "Deleted Failed";
                }
            }
            ?>