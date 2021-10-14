
<?php include 'inc/sidebar.php' ?>
<?php include '../classes/admin.php'; ?>
<?php
$user = new admin();
if(isset($_GET['deluserid'])) {
    $id = $_GET['deluserid'];

    $deluserid = $user->delete_user($id,$_SESSION);
}
?>
<?php
if ($_SESSION['permission'] != 1){
    echo "<script>window.location='denied.php'</script>";
}
?>
<style></style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3 align="center" style="text-shadow: 1px 1px 5px grey;">Danh sách admin</h3>
            <?php
            if(isset($deluserid)){
                echo $deluserid;
            }
            ?>

            <table class="table table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Tên User</th>
                    <th>Quyền</th>
                    <th>Xoá</th>
                </tr>
                </thead>
                <tbody>
                <?php

                $show_user= $user->show_user();
                if ($show_user) {
                    $i = 0;
                    while ($result=$show_user->fetch_assoc()) {
                        $i++;
                        ?>
                        <tr>
                            <td><?php echo $result['id']; ?></td>
                            <td><?php echo $result['adminUser']; ?></td>
                            <td><?php echo $result['adminName']; ?></td>

                            <td><?php if( $result['permission']==1){
                                    echo "Master";
                                }elseif ($result['permission']==2){
                                echo "Moderator";
                                }
                                elseif ($result['permission']==3){
                                echo "Editor";
                                }
                                ?></td>
                            <td align="left"><a onclick="return confirm('Bạn muốn xoá file này?');" href="?deluserid=<?php echo $result['id']; ?>"><img width="25" src="dist/img/delete.png" alt=""></a></td>
                        </tr>
                        <?php
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'inc/footer.php'; ?>