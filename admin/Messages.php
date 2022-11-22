<?php
include_once("header.php");
include_once("../Login/Db.php");
?>

<br>
<br>
<h3 class="i-name">Messages</h3>
<div style="margin-top: 100px;" class="products">
    <table width="100%">
        <thead>
            <tr>
                <td>Name</td>
                <td>Email</td>
                <td>Subject</td>
                <td>Message</td>

            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM contact ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <tr>
                    <?php
                    echo '
                    <td>' . $row['name'] . ' </td>
                    <td>' . $row['email'] . ' </td>
                            <td>' . $row['subj'] . ' </td>
                            <td>' . $row['msg'] . ' </td>
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
