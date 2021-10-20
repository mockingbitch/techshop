<?php
include_once 'lib/session.php';
ob_start();
session_start();
include_once 'classes/cart.php';
$cart = new cart();
if (isset($_POST['productid'])){
    $addtocart = $cart->add_to_cart($_POST);
}
?>
<?php
echo '<prev>';
print_r($_SESSION['cart']);
var_dump($_SESSION)
?>
