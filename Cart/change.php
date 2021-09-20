<?php
session_start();
include "../Base/Products.php";
include "Cart.php";

if(isset($_GET['action']) && ($_GET['amount']) && $_GET['action']=='add' && $_GET['amount'] !== 1){
$id=$_GET['product_id'];
$amount=$_GET['amount'];
$product = $b -> get_product($id);
    $k -> add_to_cart($id,$product['name'],$product['price'],$amount,$product['short_desc'],$product['image']);
}else{
    if(isset($_GET['action']) && $_GET['action']=='add'){
        $id=$_GET['product_id'];
        $product = $b -> get_product($id);
        $k -> add_to_cart($id,$product['name'],$product['price'],1,$product['short_desc'],$product['image']);
    }
}
if(isset($_GET['action']) && $_GET['action']=='reduce'){
    $id=$_GET['product_id'];
    $k -> change_amount($id,-1);
}
if(isset($_GET['action']) && $_GET['action']=='drop'){
    $id=$_GET['product_id'];
    $k ->drop_product($id);
}

header("Location: ../cart.php");