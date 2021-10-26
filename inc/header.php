<?php
include_once 'lib/session.php';
//Session::checkSession();
ob_start();
session_start();
include_once 'classes/product.php';
include_once 'classes/category.php';
$product = new product();
$cate = new category();
if (isset($_GET['logout'])){
    Session::destroy();
}
?>
<?php
if(isset($_GET['action']) && $_GET['action']=='logout'){
    Session::destroy();
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Tech Shop</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="css/slick.css"/>
		<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="css/style.css"/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
	<body>
		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i> +0123456789</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> phongtq1@smartosc.com</a></li>
						<li><a href="#"><i class="fa fa-map-marker"></i> 250 Kim Giang</a></li>
					</ul>
					<ul class="header-links pull-right">
                        <?php
                            if (isset($_SESSION['username'])){?>
                                <li>
                                    <div class="dropdown">
                                        <button > <i class="fa fa-user-o"></i><?= $_SESSION['username'] ?></button>
                                        <div class="dropdown-content">
                                            <a href="userinfo.php" style="color: black"><i class="fa fa-user-o"></i>Thông tin</a>
                                            <hr>
                                            <a href="?logout" style="color: red">Đăng xuất</a>
                                        </div>
                                    </div>
                                </li>
                        <?php
                            }
                            else{?>
                                <li><a href="login.php"><i class="fa fa-user-o"></i> Tài khoản</a></li>
                        <?php
                            }
                            ?>
					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="/" class="logo">
                                    <img src="../admin/dist/img/logo.svg" width="60%" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form>
									<select class="input-select">
										<option value="0">All Category</option>
										<option value="1">Category 01</option>
										<option value="1">Category 02</option>
									</select>
									<input class="input" placeholder="Tìm kiếm">
									<button class="search-btn">Tìm kiếm</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<!-- Wishlist -->
								<div>
									<a href="#">
										<i class="fa fa-heart-o"></i>
										<span>Yêu thích</span>
										<div class="qty">2</div>
									</a>
								</div>
								<!-- /Wishlist -->

								<!-- Cart -->
								<div class="dropdown"   >
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>Giỏ hàng</span>
										<div class="qty">3</div>
									</a>
									<div class="cart-dropdown">
										<div class="cart-list"  >
<!--                                            cart-->
                                            <?php if (isset($_SESSION['cart'])) : ?>
                                            <?php $subtotal = 0; ?>
                                            <?php foreach ($_SESSION['cart'] as $key => $value): ?>
											<div class="product-widget">
												<div class="product-img">
													<img width="50px" src="/admin/uploads/products/<?php echo $value['img'] ?>" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#"><?php echo $value['name'] ;?></a></h3>
													<h4 class="product-price"><span class="qty"><?php echo $value['qty'] ;?>x</span><?php echo $total = $value['price']*$value['qty'] ?> Đ</h4>
												</div>
                                                <?php $subtotal = $subtotal+$total;

                                                ?>
												<button class="delete" onclick="removeCart(<?php echo $key; ?>)"><i class="fa fa-close"></i></button>
											</div>

                                            <?php endforeach; ?>
                                            <?php else:?>
                                                <p>Chưa có sản phẩm nào trong giỏ hàng!</p>
                                            <?php endif; ?>
<!--                                            cart-->
										</div>
										<div class="cart-summary">
<!--											<small>3 Item(s) selected</small>-->
                                            <?php
                                                if (isset($_SESSION['cart'])){
                                                    ?>
                                                    <h5>Tổng tiền: <?php echo number_format($subtotal,0,',','.'); ?> Đ</h5>
                                            <?php
                                            }else{
                                                    echo '';
                                                }
                                            ?>
                                        </div>
										<div class="cart-btns">
											<a href="/viewcart.php">Giỏ hàng</a>
											<a href="/checkout.php">Thanh toán  <i class="fa fa-arrow-circle-right"></i></a>
										</div>
									</div>
								</div>
								<!-- /Cart -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li class="active"><a href="/">Trang chủ</a></li>
                        <?php
                        $show_category = $cate->show_category();
                        if ($show_category){
                            while ($result_cate = $show_category->fetch_assoc()){
                        ?>
						<li><a href="/category.php?p=<?php echo $result_cate['categorySlug'] ?>"><?php echo $result_cate['categoryName']; ?></a></li>
                        <?php
                            }
                        }
                        ?>

					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->
    <script>
        function removeCart(id){
            $.post('removecart.php',{'id':id},function(data){
                $("#listcart").load("http://techshop.test/viewcart.php #cart");
            });
        }
    </script>