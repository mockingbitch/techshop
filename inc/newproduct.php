<!-- SECTION -->
<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Sản phẩm mới</h3>
							<div class="section-nav">
<!--								<ul class="section-tab-nav tab-nav">-->
<!--                                   -->
<!--									<li><a  data-toggle="tab" href="#tab1">--><?php //echo $result_cate['categoryName'] ?><!--</a></li>-->
<!--									<li><a data-toggle="tab" href="#tab1">Điện thoại</a></li>-->
<!--									<li><a data-toggle="tab" href="#tab1">Máy ảnh</a></li>-->
<!--									<li><a data-toggle="tab" href="#tab1">Phụ kiện</a></li>-->
<!--								</ul>-->
							</div>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="" class="tab-pane active tab" >
									<div class="products-slick" data-nav="#slick-nav-1">
										<!-- product -->
                                        <?php
                                        $show_product = $product->show_new_product();
                                        if ($show_product){
                                            while ($result = $show_product->fetch_assoc()){
                                        ?>
										<div class="product">
											<div class="product-img">
												<img src="/admin/uploads/products/<?php echo $result['img']; ?>" alt="">
												<div class="product-label">
<!--													<span class="sale">-30%</span>-->
													<span class="new">NEW</span>
												</div>
											</div>
											<div class="product-body">
<!--												<p class="product-category">--><?php //$result_cate['categoryName'] ?><!--</p>-->
												<h3 class="product-name"><a href="#"><?php echo $result['productName'];?></a></h3>
												<h4 class="product-price"><?php echo number_format($result['productPrice'],0,',','.');?>&nbsp;Đ</h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp"><a
                                                                    href="/product.php?q=<?php echo $result['productSlug'] ?>">Xem nhanh</a></span></button>
												</div>
											</div>
											<div class="add-to-cart">
                                                <button class="add-to-cart-btn" onclick="addCart(<?php echo $result['productid'] ?>)"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</button>
											</div>
										</div>
                                        <?php
                                            }
                                        }
                                        ?>
                                        
										<!-- /product -->
									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
<!--<script>-->
<!--    function openTab(tabName){-->
<!--        var i;-->
<!--        var x = document.getElementsByClassName("tab");-->
<!--        for (i=0;i<x.length;i++){-->
<!--            x[i].style.display = "none";-->
<!--        }-->
<!--        document.getElementById(tabName).style.display="block";-->
<!--    }-->
<!--</script>-->