
<?php include 'inc/sidebar.php' ?>
<?php include '../classes/product.php'; ?>
<?php
$product = new product();

if(isset($_GET['delproductid'])) {
    $id = $_GET['delproductid'];
    $delproductid = $product->delete_product($id);
}
?>
<style></style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3 align="center" style="text-shadow: 1px 1px 5px grey;">Danh sách sản phẩm</h3>
            <?php
            if(isset($delproductid)){
                echo $delproductid;
            }
            ?>

            <table class="table table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Mô tả sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Hình ảnh</th>
                    <th>Sửa</th>
                    <th>Xoá</th>
                </tr>
                </thead>
                <tbody>
                <?php

                $show_product= $product->show_product();
                if ($show_product) {
                    $i = 0;
                    while ($result=$show_product->fetch_assoc()) {
                        $i++;
                        ?>
                        <tr>
                            <td><?php echo $result['productid']; ?></td>
                            <td><?php echo $result['productName']; ?></td>
                            <td><?php echo $result['productDescription']; ?></td>
                            <td><?php echo $result['productPrice']; ?></td>
                            <td><?php echo $result['productQuantity']; ?></td>
                            <td><img width="100px" src="uploads/products/<?php echo $result['img']; ?>" alt=""></td>
                            <td align="left"><a href="editProduct.php?productid=<?php echo $result['productid']; ?>"><img width="25" src="dist/img/edit.png" alt=""></a></td>
                            <td align="left"><a onclick="return confirm('Bạn muốn xoá file này?');" href="?delproductid=<?php echo $result['productid']; ?>"><img width="25" src="dist/img/delete.png" alt=""></a></td>
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