
<?php include 'inc/sidebar.php' ?>
<?php include '../classes/brand.php'; ?>
<?php
$brand = new brand();

if(isset($_GET['delbrandid'])) {
    $id = $_GET['delbrandid'];
    $delbrandid = $brand->delete_brand($id);
}
if(isset($_GET['activate'])){
    $id = $_GET['activate'];
    $activate = $brand->activate($id);
}
if(isset($_GET['deactivate'])){
    $id = $_GET['deactivate'];
    $deactivate = $brand->deactivate($id);
}

?>
<style></style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3 align="center" style="text-shadow: 1px 1px 5px grey;">Danh sách thương hiệu</h3>
            <?php
            if(isset($delbrandid)){
                echo $delbrandid;
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

                $show_brand= $brand->show_brand();
                if ($show_brand) {
                    $i = 0;
                    while ($result=$show_brand->fetch_assoc()) {
                        $i++;
                        ?>
                        <tr>
                            <td><?php echo $result['brandid']; ?></td>
                            <td><?php echo $result['brandName']; ?></td>
                            <td><?php echo $result['brandDescription']; ?></td>
                            <td align="left">
                                <div  class="switch demo3">
                                    <input  type="checkbox" value="<?php echo $result['brandid']; ?>" <?php if ($result['status']==1){
                                        echo "name='deactivate' checked  ";
                                    }
                                    elseif($result['status']==0){
                                        echo "name='activate'";
                                    }
                                    ?>>
                                    <label><i></i></label>
                                </div></td>
                            <td align="left"><a href="editBrand.php?brandid=<?php echo $result['brandid']; ?>"><img width="25" src="dist/img/edit.png" alt=""></a></td>
                            <td align="left"><a onclick="return confirm('Bạn muốn xoá file này?');" href="?delbrandid=<?php echo $result['brandid']; ?>"><img width="25" src="dist/img/delete.png" alt=""></a></td>
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