<?php
include 'inc/header.php';
?>

<div class="shopping-cart section">
    <div class="container">
        <div class="row">
            <div class="col-12" id="list-cart">
                <!-- Shopping Summery -->
                <?php if (isset($_SESSION['cart'])): ?>
                <?php
                    $subtotal = 0;
                    ?>
                <table class="table shopping-summery cart-change">
                    <thead>
                    <tr class="main-hading">
                        <th> </th>
                        <th>Ảnh sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th class="text-center">Đơn giá</th>
                        <th class="text-center">Số lượng</th>
                        <th class="text-center">Tổng</th>
                        <th class="text-center"><i class="ti-trash remove-icon"></i></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($_SESSION['cart'] as $key => $value ) : ?>
                    <tr>
                        <td><button onclick="removeCart(<?php echo $key;  ?>)">X</button></td>
                        <td class="image" data-title="No"><img width="100px" src="../admin/uploads/products/<?php echo $value['img'] ?>" alt="#"></td>
                        <td class="product-des" data-title="Description">
                            <p class="product-name"><a href="#"><?php echo $value['name'] ?></a></p>

                        </td>
                        <td align="center" class="price" data-title="Price"><span><?php echo number_format($value['price'],0,',','.');?> Đ </span></td>
                        <td class="qty" data-title="Qty" align="center"><!-- Input Order -->
                            <div class="input-group sm">
                                <input onchange="updateCart(<?php echo $key; ?>)" id="qty_<?php echo $key; ?>" type="number" name="quant[1]" class="input-number sm"    min="1" value="<?php echo $value['qty']; ?>">
                            </div>
                            <!--/ End Input Order -->
                        </td>
                        <td align="center" class="total-amount" data-title="Total"><span>
                                <?php
                                $total = $value['qty']*$value['price'];
                                echo number_format($total,0,',','.');
                                ?> Đ</span></td>
                        <td align="center" class="action" data-title="Remove"><a href="#"><i class="ti-trash remove-icon"></i></a></td>
                    </tr>
                    <?php $subtotal+= $total; ?>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <?php else: ?>
                    <p>Không tồn tại giỏ hàng!!</p>
                <?php endif; ?>
                <!--/ End Shopping Summery -->
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <!-- Total Amount -->
                <div class="total-amount">
                    <div class="row">
                        <div class="col-lg-8 col-md-5 col-12">
                            <div class="left">
                                <div class="coupon">
                                    <form action="#" target="_blank">
                                        <input name="Coupon" placeholder="Enter Your Coupon">
                                        <button class="btn">Apply</button>
                                    </form>
                                </div>
                                <div class="checkbox">
                                    <label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox"> Shipping (+10$)</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-7 col-12" id="sub" >
                            <div class="right sub-change" >
                                <ul>
                                    <li><h4 >Thành tiền: <span><?php echo number_format($subtotal,0,',','.');?> Đ</span></h4></li>
                                    <li>Vận chuyển<span>Free</span></li>
<!--                                    <li>You Save<span>$20.00</span></li>-->Tổng: &emsp; &emsp; <span style="color: red;font-size: 30px;font-weight: bold"><?php echo number_format($subtotal,0,',','.');?> Đ</span>
                                     <li class="last"></li>
                                </ul>
                                <div class="button5">
                                    <div class="row">
                                        <button class="btn btn-danger col-md-5"><a href="checkout.php" class="btn"><h4>Thanh toán</h4></a></button>
                                        <button style="margin-left: 10px" class="btn btn-default col-md-5"><a href="/" class="btn"><h4>Tiếp tục mua</h4></a></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ End Total Amount -->
            </div>
        </div>
    </div>
</div>
<script>
    function updateCart(id){
        num = $("#qty_"+id).val();
        $.post('updatecart.php',{'id':id,'num':num},function(data){
            $("#list-cart").load("http://techshop.test/viewcart.php .cart-change");
            $("#sub").load("http://techshop.test/viewcart.php .sub-change");
        });
    }
    function removeCart(id){
        $.post('updatecart.php',{'id':id,'num':0},function(data){
            $("#list-cart").load("http://techshop.test/viewcart.php .cart-change");
            $("#sub").load("http://techshop.test/viewcart.php .sub-change");

        });
    }
</script>
<?php
    include 'inc/footer.php';
?>
