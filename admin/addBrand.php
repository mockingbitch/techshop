<?php include 'inc/sidebar.php' ?>
<?php
include '../classes/brand.php';
$brand = new brand();
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['add'])){
    $addbrand = $brand->insert_brand($_POST);
}
?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 align="center" style="text-shadow: 1px 1px 5px grey;">Thêm thương hiệu</h1>
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
                                <h3 class="card-title"> <small><span><?php
                                            if(isset($addbrand)){
                                                echo $addbrand;
                                            }
                                            ?></span></small></h3>

                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="quickForm" action="" method="POST">

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="menu">Tên danh mục</label>
                                        <input type="text" name="brandName" class="form-control" id="menu"
                                               placeholder="Nhập tên thương hiệu">
                                    </div>
                                    <div class="form-group">
                                        <label>Mô tả ngắn</label>
                                        <textarea name="brandDes" class="form-control" cols="30" rows="10"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Trạng thái</label>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="active" name="active"
                                                   checked="" value="1">
                                            <label for="active" class="custom-control-label">Hiển thị</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="deactive" name="active"
                                                   checked="" value="0">
                                            <label for="no_active" class="custom-control-label">Ẩn</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" name="add" class="btn btn-primary">Thêm</button>
                                </div>

                            </form>
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
<?php include 'inc/footer.php' ?>