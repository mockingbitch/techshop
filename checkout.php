<?php include 'inc/header.php'; ?>
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <div class="col-md-7">
                <!-- Billing Details -->
                <div class="billing-details">
                    <div class="section-title">
                        <h3 class="title">Thông tin nhận hàng</h3>
                    </div>
                    <div class="form-group">
                        <input class="input" type="text" name="customername" placeholder="Họ tên người nhận">
                    </div>
                    <div class="form-group">
                        <input class="input" type="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input class="input" type="text" name="city" placeholder="Tỉnh/Thành phố">
                    </div>
                    <div class="form-group">
                        <input class="input" type="text" name="addressdetail" placeholder="Đường / Xã / Quận">
                    </div>
                    <div class="form-group">
                        <input class="input" type="tel" name="sdt" placeholder="Số điện thoại">
                    </div>
<!--                    <div class="form-group">-->
<!--                        <div class="input-checkbox">-->
<!--                            <input type="checkbox" id="create-account">-->
<!--                            <label for="create-account">-->
<!--                                <span></span>-->
<!--                                Tạo tài khoản?-->
<!--                            </label>-->
<!--                            <div class="caption">-->
<!--                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>-->
<!--                                <input class="input" type="password" name="password" placeholder="Enter Your Password">-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
                </div>


                <!-- Order notes -->
                <div class="order-notes">
                    <textarea class="input" name="note" placeholder="Ghi chú"></textarea>
                </div>
                <!-- /Order notes -->
            </div>

            <!-- Order Details -->
            <div class="col-md-5 order-details">
                <div class="section-title text-center">
                    <h3 class="title">Đơn hàng của bạn</h3>
                </div>
                <div class="order-summary">
                    <div class="order-col">
                        <div><strong>Sản phẩm</strong></div>
                        <div><strong>Tổng</strong></div>
                    </div>
                    <div class="order-products">
                        <div class="order-col">
                            <div>1x Product Name Goes Here</div>
                            <div>$980.00</div>
                        </div>

                    </div>
                    <div class="order-col">
                        <div>Shiping</div>
                        <div><strong>FREE</strong></div>
                    </div>
                    <div class="order-col">
                        <div><strong>Tổng thanh toán</strong></div>
                        <div><strong class="order-total">$2940.00</strong></div>
                    </div>
                </div>
                <div class="payment-method">
                    <div class="input-radio">
                        <input type="radio" name="payment" id="payment-1">
                        <label for="payment-1">
                            <span></span>
                            Direct Bank Transfer
                        </label>
                        <div class="caption">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                    <div class="input-radio">
                        <input type="radio" name="payment" id="payment-2">
                        <label for="payment-2">
                            <span></span>
                            Cheque Payment
                        </label>
                        <div class="caption">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                    <div class="input-radio">
                        <input type="radio" name="payment" id="payment-3">
                        <label for="payment-3">
                            <span></span>
                            Paypal System
                        </label>
                        <div class="caption">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                </div>
                <div class="input-checkbox">
                    <input type="checkbox" id="terms">
                    <label for="terms">
                        <span></span>
                        I've read and accept the <a href="#">terms & conditions</a>
                    </label>
                </div>
                <a href="#" class="primary-btn order-submit">Xác nhận đơn hàng</a>
            </div>
            <!-- /Order Details -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<?php include 'inc/footer.php'; ?>
