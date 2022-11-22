<?php
include_once("header.php");
include_once("../Login/Db.php");
?>

<div class="products" style="margin-top: 100px;" >
<?php
$sql="SELECT * FROM orderdetails";
$result=$conn->query($sql);
if($result->num_rows>0){

?>

<br>

<h3 style="margin-top:10px; " class="i-name">order</h3>
<br>
            <table width="100%">
                <thead>
                    <tr>
                        <th scope="col" >Customer ID</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">City</th>
                        <th scope="col">Email</th>
                        <th scope="col">Method</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row=$result->fetch_assoc()){
                        echo '<tr>';
                        echo '<th scope="row">'.$row['id'].'</th>';
                        echo '  <td> '.$row['fname'].' </td>';
                        echo '  <td> '.$row['address'].' </td>';
                        echo '  <td> '.$row['city'].' </td>';
                        echo '  <td> '.$row['email'].' </td>';
                        echo '  <td> '.$row['method'].' </td>';
                        echo '<td>';
                        echo '
                        <form action="" method="POST">
                            <input type="hidden" name="id" value='.$row["id"].'>
                            <button type="submit" name="delete" value="Delete"> 
                            <i class="uil uil-trash-alt"></i>
                                </button>
                        </form>
                        <form action="ViewItem.php" method="POST">
                        <input type="hidden" name="id" value='.$row["id"].'>
                        <input type="hidden" name="email" value='.$row["email"].'>
                        <button type="submit" name="view" value="view"> 
                        <i style="color:green;" class="uil uil-eye"></i>
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
                $sql="DELETE FROM orderdetails WHERE id={$_REQUEST['id']}";
                if($conn->query($sql)==TRUE){
                    echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
                }
                else{
                    echo "Deleted Failed";
                }
            }
            ?>
        </div>