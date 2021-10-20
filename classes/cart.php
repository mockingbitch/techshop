<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
include_once ($filepath.'/../lib/session.php');
?>
<?php
class cart
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function add_to_cart($data){
        if (!isset($_SESSION['cart'])) $_SESSION['cart']=[];
        $id = $data['productid'];
        $query = "SELECT * FROM tbl_product WHERE productid ='$id'";
        $value = $this->db->select($query);
        if ($value){
            $result = $value->fetch_assoc();
            if (isset($_SESSION['cart'])){
                if(isset($_SESSION['cart'][$id])){
                    $_SESSION['cart'][$id]['id'] = $result['productid'];
                    $_SESSION['cart'][$id]['qty'] += 1;
                    $_SESSION['cart'][$id]['name'] = $result['productName'];
                    $_SESSION['cart'][$id]['price'] = $result['productPrice'];
                    $_SESSION['cart'][$id]['img'] = $result['img'];
                }
                else{
                    $_SESSION['cart'][$id]['qty']=1;
                    $_SESSION['cart'][$id]['name'] = $result['productName'];
                    $_SESSION['cart'][$id]['price'] = $result['productPrice'];
                    $_SESSION['cart'][$id]['img'] = $result['img'];
                }
                $_SESSION['success']='Thêm thành công';

            }
            else{
                $_SESSION['cart'][$id]['qty']=1;
                $_SESSION['cart'][$id]['name'] = $result['productName'];
                $_SESSION['cart'][$id]['price'] = $result['productPrice'];
                $_SESSION['cart'][$id]['img'] = $result['img'];
                $_SESSION['success']='Thêm thành công';
            }
//            $value = $result->fetch_assoc();
//            $img = $value['img'];
//            $productname = $value['productName'];
//            $price = $value['productPrice'];
//            $quantity = 1;
//            $cart =  [$productname,$price,$img,$quantity];
//            $_SESSION['cart'][]=$cart;
           var_dump($_SESSION['cart']);

        }else{
            $_SESSION['error']='Không tồn tại sản phẩm';
        }

    }
    public function show_cart(){
        if (isset($_SESSION['cart']) && (is_array($_SESSION['cart']))){
            for ($i = 0; $i < sizeof($_SESSION['cart']) ; $i++){
                $total = $_SESSION['cart'][$i]['2'] * $_SESSION['cart'][$i]['4'];
                echo '<tr>
                        <td class="image" data-title="No"><img src="../admin/uploads/products/'.$_SESSION['cart'][$i][3].'" alt="#"></td>
                        <td class="product-des" data-title="Description">
                            <p class="product-name"><a href="#">'.$_SESSION['cart'][$i][0].'</a></p>
                           
                        </td>
                        <td class="price" data-title="Price"><span>'.$_SESSION['cart'][$i][1].' </span></td>
                        <td class="qty" data-title="Qty"><!-- Input Order -->
                            <div class="input-group">
                                <div class="button minus">
                                    <button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                                        <i class="ti-minus"></i>
                                    </button>
                                </div>
                                <input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="100" value="1">
                                <div class="button plus">
                                    <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
                                        <i class="ti-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <!--/ End Input Order -->
                        </td>
                        <td class="total-amount" data-title="Total"><span>'.$total.'</span></td>
                        <td class="action" data-title="Remove"><a href="#"><i class="ti-trash remove-icon"></i></a></td>
                    </tr>';
            }
            print_r($_SESSION['cart']);
        }
    }
}
?>