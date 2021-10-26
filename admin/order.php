
<?php include 'inc/sidebar.php' ?>
<?php include '../classes/cart.php'; ?>
<?php
$order = new cart();

if(isset($_GET['delorderid'])) {
    $id = $_GET['delorderid'];
    $delorder = $order->delete_order($id);
}
if(isset($_GET['activate'])){
    $id = $_GET['activate'];
    $activate = $order->activate($id);
}
if(isset($_GET['deactivate'])){
    $id = $_GET['deactivate'];
    $deactivate = $order->deactivate($id);
}


?>
<style></style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3 align="center" style="text-shadow: 1px 1px 5px grey;">Danh sách danh mục</h3>
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
                    <th>Thành phố</th>
                    <th>SĐT</th>
                    <th>Tổng đơn</th>
                    <th>Trạng thái</th>
                    <th>Xem</th>
                    <th>Xoá</th>
                </tr>
                </thead>
                <tbody>
                <?php

                $show_order= $order->show_order();
                if ($show_order) {
                    $i = 0;
                    while ($result=$show_order->fetch_assoc()) {
                        $i++;
                        ?>
                        <tr>
                            <td><?=$result['cartid'] ?></td>
                            <td><?=$result['customername'] ?></td>
                            <td><?=$result['city'] ?></td>
                            <td><?=$result['sdt'] ?></td>
                            <td><?=$result['subtotal'] ?></td>
                            <td align="left">
                                <div  class="switch demo3">
                                    <input  type="checkbox" value="<?php echo $result['cartid']; ?>" <?php if ($result['status']==1){
                                        echo "name='deactivate' checked  ";
                                    }
                                    elseif($result['status']==0){
                                        echo "name='activate'";
                                    }
                                    ?>>
                                    <label><i></i></label>
                                </div></td>
                            <td align="left"><a href="order-view.php?orderid=<?php echo $result['cartid']; ?>"><img width="25" src="dist/img/edit.png" alt=""></a></td>
                            <td align="left"><a onclick="return confirm('Bạn muốn xoá mục này?');" href="?delorderid=<?php echo $result['cartid']; ?>"><img width="25" src="dist/img/delete.png" alt=""></a></td>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("input[name='activate']").change(function(){
            let id = $(this).attr('value');

            $.ajax({
                url: '?activate=' + id,
                type: 'GET',
                success:function(response) {
                    window.location.reload()
                    alert('Đã kích hoạt')

                }
            })
        });
        $("input[name='deactivate']").change(function(){
            let id = $(this).attr('value');
            $.ajax({
                url: '?deactivate=' + id,
                type: 'GET',
                success:function(response) {
                    window.location.reload()
                    alert('Huỷ kích hoạt')
                }
            })
        });
    });

</script>

<?php include 'inc/footer.php'; ?>