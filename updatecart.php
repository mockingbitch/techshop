<?php
session_start();
if(isset($_POST['id']) && isset($_POST['num'])){
    $id = $_POST['id'];
    $num = $_POST['num'];
    $cart = $_SESSION['cart'];
    if(array_key_exists($id,$cart)){
        $cart[$id]=array(
            'name' => $cart[$id]['name'],
            'qty' => $num,
            'price'=> $cart[$id]['price'],
            'img'=>$cart[$id]['img']
        );
        $_SESSION['cart']=$cart;
    }
}
?>