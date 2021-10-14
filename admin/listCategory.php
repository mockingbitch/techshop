
<?php include 'inc/sidebar.php' ?>
<?php include '../classes/category.php'; ?>
<?php
$cate = new category();

if(isset($_GET['delcateid'])) {
    $id = $_GET['delcateid'];
    $delcateid = $cate->delete_category($id);
}
if(isset($_GET['activate'])){
    $id = $_GET['activate'];
    $activate = $cate->activate($id);
}
if(isset($_GET['deactivate'])){
    $id = $_GET['deactivate'];
    $deactivate = $cate->deactivate($id);
}


?>
<style></style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3 align="center" style="text-shadow: 1px 1px 5px grey;">Danh sách danh mục</h3>
            <?php
            if(isset($delcateid)){
                echo $delcateid;
            }
            ?>

            <table class="table table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên danh mục</th>
                    <th>Mô tả danh mục</th>
                    <th>Trạng thái</th>
                    <th>Sửa</th>
                    <th>Xoá</th>
                </tr>
                </thead>
                <tbody>
                <?php

                $show_cate= $cate->show_category();
                if ($show_cate) {
                    $i = 0;
                    while ($result=$show_cate->fetch_assoc()) {
                        $i++;
                        ?>
                        <tr>
                            <td><?php echo $result['cateid']; ?></td>
                            <td><?php echo $result['categoryName']; ?></td>
                            <td><?php echo $result['categoryDescription']; ?></td>
                            <td align="left">
                                <div  class="switch demo3">
                                    <input  type="checkbox" value="<?php echo $result['cateid']; ?>" <?php if ($result['status']==1){
                                        echo "name='deactivate' checked  ";
                                    }
                                    elseif($result['status']==0){
                                        echo "name='activate'";
                                    }
                                        ?>>
                                    <label><i></i></label>
                                </div></td>
                            <td align="left"><a href="editCategory.php?cateid=<?php echo $result['cateid']; ?>"><img width="25" src="dist/img/edit.png" alt=""></a></td>
                            <td align="left"><a onclick="return confirm('Bạn muốn xoá file này?');" href="?delcateid=<?php echo $result['cateid']; ?>"><img width="25" src="dist/img/delete.png" alt=""></a></td>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("input[name='activate']").change(function(){
            let id = $(this).attr('value');

            $.ajax({
                url: '?activate=' + id,
                type: 'GET',
                success:function(response) {
                    window.location.reload()
                    alert('Đã kích hoạt')

                }
            })
        });
        $("input[name='deactivate']").change(function(){
                    let id = $(this).attr('value');
                    $.ajax({
                        url: '?deactivate=' + id,
                        type: 'GET',
                        success:function(response) {
                            window.location.reload()
                            alert('Huỷ kích hoạt')
                        }
                    })
                });
    });

</script>

<?php include 'inc/footer.php'; ?>