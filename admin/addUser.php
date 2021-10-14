<?php include 'inc/sidebar.php' ?>
<?php
include '../classes/admin.php';
$user = new admin();
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['add'])){
   $adduser = $user->insert_user($_POST);
}

if ($_SESSION['permission'] != 1) {
    echo "<script>window.location='denied.php'</script>";
}

?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 align="center" style="text-shadow: 1px 1px 5px grey;">Thêm admin user</h1>
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
                                            if(isset($adduser)){
                                                echo $adduser;
                                            }
                                            ?></span></small></h3>

                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="quickForm" action="" method="POST">

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="menu">Email người dùng</label>
                                        <input type="email" name="email" class="form-control"
                                               placeholder="Nhập email ">
                                    </div>
                                    <div class="form-group">
                                        <label for="menu">Tên người dùng</label>
                                        <input type="text" name="name" class="form-control"
                                               placeholder="Nhập tên người dùng ">
                                    </div>
                                    <div class="form-group">
                                        <label for="menu">Password</label>
                                        <input type="password" name="pass" class="form-control"
                                               placeholder="Nhập password ">
                                    </div>
                                    <div class="form-group">
                                        <label for="menu">Xác nhận password</label>
                                        <input type="password" name="confirmpass" class="form-control"
                                               placeholder="Xác nhận password ">
                                    </div>
<!--                                    <div class="form-group">-->
<!--                                        <label for="menu">Permission <small style="color: grey"><i>Mức độ phân quyền: 2-Moderator, 3-Editor</i></small> </label>-->
<!--                                        <input type="number" name="permission" class="form-control"-->
<!--                                               placeholder="Permission ">-->
<!--                                    </div>-->
                                    <div class="form-group">
                                        <label for="menu">Phân quyền:</label>
                                        <select name="permission" style="width:50%;height:50px;" class="select form-select-lg mb-3" aria-label=".form-select-lg example">
                                                    <option value="2">Moderator</option>
                                                    <option value="3">Editor</option>



                                        </select>
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