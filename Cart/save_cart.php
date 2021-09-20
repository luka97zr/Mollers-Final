<?php
include "../Base/dB.php";
include "../Cart/Cart.php";

if(!isset($_POST['checkout'])){
    header("Location : ../index.php");
}
$address=$_POST['address'];
$name=$_POST['name'];
$lName=$_POST['lName'];
$phone=$_POST['phone'];
$city=$_POST['city'];
$postal=$_POST['postal'];
 $total = $k -> total();
 $cart_id = $b -> save_cart($address,$name,$lName,$phone,$city,$postal,$total);

 for($i=0;$i<count($_SESSION['cart_products']);$i++){
     $product_id =   $_SESSION['cart_products'][$i]['id'];
     $quantity =$_SESSION['cart_products'][$i]['quantity'];
     $price =$_SESSION['cart_products'][$i]['price'];
     $b -> save_cart_products($cart_id,$product_id,$price,$quantity);

     $amount = $b -> get_amount($product_id);
     for($j=0;$j<count($amount);$j++){
        $a = (int)$amount[$j]['quantity'];
     }
      
    $new_amount = $a - $quantity;
     $b -> update_amount($new_amount, $product_id);
 }
 unset($_SESSION['cart_products']);
 header("Location: ../cart.php");