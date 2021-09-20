<?php
include_once "../../Base/dB.php";
if(isset($_POST['submit'])){

    $id = $_POST['id'];
    $name= $b -> conn -> real_escape_string($_POST['name']);
    $short_desc=$b -> conn -> real_escape_string($_POST['short_desc']);
    $main_desc=$b -> conn -> real_escape_string($_POST['main_desc']);
    $footer_desc=$b -> conn -> real_escape_string($_POST['footer_desc']);
    $image=$_FILES['image']['name'];
    $price=$b -> conn -> real_escape_string($_POST['price']);
    $quantity=$b -> conn -> real_escape_string($_POST['quantity']);

    $target = "../../Base/product_img2/". basename($image);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
    }else{
        $msg = "Failed to upload image";
    }

    $b -> update_product($id,$name,$short_desc,$main_desc,$footer_desc,$image,$price,$quantity);
    header("Location: ../../panel.php?update=successful#msg");
}else{
    header("Location: ../../index.php");
}