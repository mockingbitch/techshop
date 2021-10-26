
<?php include 'inc/sidebar.php' ?>
<?php include '../classes/cart.php'; ?>
<?php
$cart = new cart();

if(isset($_GET['delorderid'])) {
    $id = $_GET['delorderid'];
    $delorderid = $cart->delete_order($id);
}
?>
<style></style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3 align="center" style="text-shadow: 1px 1px 5px grey;">Danh sách đơn hàng</h3>
            <?php
            if(isset($delorderid)){
                echo $delorderid;
            }
            ?>

            <table class="table table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên khách hàng</th>
                    <th>Trạng thái</th>
                    <th>Ngày đặt</th>
                    <th>Sửa</th>
                    <th>Xoá</th>
                </tr>
                </thead>
                <tbody>
                <?php

                $show_order= $cart->show_order();
                if ($show_order) {
                    $i = 0;
                    while ($result=$show_order->fetch_assoc()) {
                        $i++;
                        ?>
                        <tr>
                            <td><?php echo $result['id']; ?></td>
                            <td><?php echo $result['username']; ?></td>
                            <td><?php echo $result['status']; ?></td>
                            <td><?php echo $result['date']; ?></td>
                            <td align="left"><a href="editorder.php?orderid=<?php echo $result['id']; ?>"><img width="25" src="dist/img/edit.png" alt=""></a></td>
                            <td align="left"><a onclick="return confirm('Bạn muốn xoá file này?');" href="?delorderid=<?php echo $result['id']; ?>"><img width="25" src="dist/img/delete.png" alt=""></a></td>
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