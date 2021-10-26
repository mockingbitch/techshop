<?php include 'inc/sidebar.php' ;
if(!isset($_GET['orderid']) || $_GET['orderid'] == NULL) {
    echo "<script>window.location='order.php'</script>";
}
else{
    $id = $_GET['orderid'];
}
?>
    <div class="content-wrapper">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="../css/bootstrap.min.css"/>

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="../css/slick.css"/>
    <link type="text/css" rel="stylesheet" href="../css/slick-theme.css"/>

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="../css/nouislider.min.css"/>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="../css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="../css/style.css"/>
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <form action="" method="POST">

                    <div class="col-md-7">
                        <!-- Billing Details -->
                        <div class="billing-details">
                            <div class="section-title">
                                <h3 class="title">Thông tin chi tiết đơn hàng</h3>
                            </div>
                            <?php
                                include '../classes/cart.php';
                                $order = new cart();
                                $show_order = $order->show_order_detail($id);
                                if ($show_order){
                                    while ($result = $show_order->fetch_assoc()){
                                        $subtotal = $result['subtotal'];
                            ?>
                                            <div>
                                <div class="form-group">
                                    <input class="input" type="text" name="customername" value="<?= $result['customername'] ?>" disabled readonly>
                                </div>
                                <div class="form-group">
                                    <input class="input" type="email" name="email" value="<?= $result['email'] ?>"readonly disabled>
                                </div>
                                <div class="form-group">
                                    <input class="input" type="text" name="city" value="<?= $result['city'] ?>" readonly disabled>
                                </div>
                                <div class="form-group">
                                    <input class="input" type="text" name="addressdetail" value="<?= $result['addressdetail'] ?>"readonly disabled>
                                </div>
                                <div class="form-group">
                                    <input class="input" type="tel" name="sdt" value="<?= $result['sdt'] ?>" readonly disabled>
                                </div>
                                <!-- Order notes -->
                                <div class="order-notes">
                                    <textarea class="input" name="note" ><?= $result['note'] ?></textarea>
                                </div>
                                <!-- /Order notes -->
                                            </div>
                                        <?php
                                    }
                                }
                                        ?>
                        </div>



                    </div>

                    <!-- Order Details -->
                    <div class="col-md-5 order-details">
                        <div class="section-title text-center">
                            <h3 class="title">Đơn hàng</h3>
                        </div>

                            <div class="order-summary">
                                <div class="order-col">
                                    <div><strong>Sản phẩm</strong></div>
                                    <div><strong>Tổng</strong></div>
                                </div>
                                <div class="order-products">
                                    <?php
                                    $show_item_order = $order->show_order_item($id);
                                    while ($value=$show_item_order->fetch_assoc()){
                                        ?>
                                    <div class="order-col">
                                        <div><?= $value['productQuantity'] ?> x <?= $value['productName'] ?></div>
                                        <div><?php $total = $value['productQuantity']*$value['productPrice'];
                                            echo number_format($total,0,',','.');
                                            ?> Đ</div>
                                    </div>
                                    <?php
                                    }
                                    ?>

                                </div>
                                <div class="order-col">
                                    <div>Shipping</div>
                                    <div><strong>FREE</strong></div>
                                </div>
                                <div class="order-col">
                                    <div><strong>Tổng thanh toán</strong></div>
                                    <div><strong class="order-total"><?php echo number_format($subtotal,0,',','.');?> Đ</strong></div>
                                </div>
                            </div>
                        <button class="primary-btn order-submit" type="submit">
                            <a href="order.php" style="color: white;font-weight: bold">Trở về</a></button>
                    </div>
                </form>
                <!-- /Order Details -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    </div>
<?php include 'inc/footer.php' ;?>