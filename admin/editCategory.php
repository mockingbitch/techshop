<?php
include 'inc/sidebar.php';
?>
<?php include '../classes/category.php'; ?>
<?php
$cate = new category();
if(!isset($_GET['cateid']) || $_GET['cateid'] == NULL) {
    echo "<script>window.location='listBrand.php'</script>";
}
else{
    $id = $_GET['cateid'];
}
if($_SERVER['REQUEST_METHOD'] =='POST'){

    $updateCate = $cate->update_category($_POST,$id);
}

?>

    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 align="center" style="text-shadow: 1px 1px 5px grey;">Thêm danh mục</h1>
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
                                        if(isset($updateCate)){
                                            echo $updateCate;
                                        }
                                        ?></span></small></h3>

                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="quickForm" action="" method="POST">
                        <?php
                        $data = $cate->getcatebyId($id);
                        if($data){
                            while ($result = $data->fetch_assoc()){

                        ?>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="menu">Tên danh mục</label>
                                    <input type="text" name="cateName" class="form-control" id="menu"
                                           value="<?php echo $result['categoryName']?>">
                                </div>
                                <div class="form-group">
                                    <label>Mô tả ngắn</label>
                                    <textarea name="cateDes" class="form-control" cols="30" rows="10"><?php echo $result['categoryDescription']?></textarea>
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" name="add" class="btn btn-primary">Sửa</button>
                            </div>
                                <?php
                                }
                                }
                        ?>

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
<?php include('inc/footer.php'); ?>