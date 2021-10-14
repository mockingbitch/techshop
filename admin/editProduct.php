<?php include 'inc/sidebar.php' ?>
<?php
include '../classes/product.php';
include '../classes/category.php';
include '../classes/brand.php';
$product = new product();
if(!isset($_GET['productid']) || $_GET['productid'] == NULL) {
    echo "<script>window.location='listProduct.php'</script>";
}
else{
    $id = $_GET['productid'];
}
if($_SERVER['REQUEST_METHOD'] =='POST'){

    $updateProduct = $product->update_product($_POST,$_FILES,$id);
}
?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 align="center" style="text-shadow: 1px 1px 5px grey;">Sửa sản phẩm</h1>

                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                            <li class="breadcrumb-item active">Menu</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- jquery validation -->
                        <div class="card ">
                            <div class="card-header">
                                <h3 class="card-title"> <small><span> <?php
                                            if(isset($updateProduct)){
                                                echo $updateProduct;
                                            }
                                            ?></span></small></h3>

                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
        <?php
            $get_product_by_id = $product->getproductbyId($id);
            if ($get_product_by_id) {

            while ($result_product = $get_product_by_id->fetch_assoc()) {
                ?>
                            <form id="quickForm" action="" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="card-body col-md-8">
                                        <div class="form-group">
                                            <label for="menu">Tên sản phẩm</label>
                                            <input type="text" name="productName" class="form-control" id="menu"
                                                   value="<?php echo $result_product['productName'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Mô tả ngắn</label>
                                            <textarea name="productDes" class="form-control" cols="30" rows="10"><?php echo $result_product['productDescription'] ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Mô tả chi tiết</label>
                                            <textarea id="editor1" name="content" class="form-control" cols="30" rows="10"><?php echo $result_product['content'] ?></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="menu">Giá sản phẩm</label>
                                            <input type="number" name="productPrice" class="form-control"
                                                  value="<?php echo $result_product['productPrice'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="menu">Số lượng</label>
                                            <input type="number" name="productQuantity" class="form-control"
                                               value="<?php echo $result_product['productQuantity'] ?>" >
                                        </div>
                                        <div class="form-group">
                                            <label for="menu">Hình ảnh sản phẩm</label>
                                            <input type="file" name="img" class="form-control"
                                                   placeholder="Nhập hình ảnh">
                                            <img width="200px" src="uploads/products/<?php echo $result_product['img'] ?>" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-4" style="margin: 50px auto" >
                                        <div class="form-group">
                                            <label for="menu">Danh mục:</label>
                                            <select name="cateid" style="width:50%;height:50px;margin-left:17px " class="select form-select-lg mb-3" aria-label=".form-select-lg example">
                                                <option>-----------Danh mục---------</option>
                                                <?php
                                                $cate = new category();
                                                $cateList = $cate->show_category();
                                                if ($cateList) {
                                                    while ($result = $cateList->fetch_assoc()) {
                                                        ?>
                                                        <option
                                                            <?php
                                                            if($result['cateid']==$result_product['cateid']) {
                                                                echo 'selected';
                                                            }
                                                            ?>
                                                                value="<?php echo $result['cateid']; ?>"><?php echo $result['categoryName']; ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="menu">Thương hiệu:</label>
                                            <select name="brandid" style="width:50%;height:50px;" class="select form-select-lg mb-3" aria-label=".form-select-lg example">
                                                <option>-----------Thương hiệu---------</option>
                                                <?php
                                                $brand = new brand();
                                                $brandList = $brand->show_brand();
                                                if ($brandList) {
                                                    while ($result = $brandList->fetch_assoc()) {
                                                        ?>
                                                        <option
                                                            <?php
                                                            if($result['brandid']==$result_product['brandid']) {
                                                                echo 'selected';
                                                            }
                                                            ?>
                                                                value="<?php echo $result['brandid']; ?>"><?php echo $result['brandName']; ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" name="add" class="btn btn-primary">Sửa</button>
                                </div>

                            </form>
                <?php
            }
            }
                ?>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <script>

        CKEDITOR.replace( 'editor1' );

    </script>
<?php include 'inc/footer.php' ?>