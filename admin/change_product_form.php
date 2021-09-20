<?php
include_once "../Base/dB.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $product = $b -> get_one_product($id);
}else
    header("Location: ../panel.php");

?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>
<body>
<div class="change_product--wrapper">
        <a href="../panel.php">GO BACK</a>
         <form action="includes/update_product.php" method="post" enctype="multipart/form-data">
            <div>
                <input type="hidden" name="id" value="<?=$product['id']?>">
                <label for="name">Product Name</label>
                <input type="text" placeholder="Product Name" name="name" id="name" value="<?=$product['name']?>">
            </div>
            <div>
                <label for="short_desc">Short Description</label>
                <input type="text" placeholder="Short Description" name="short_desc" id="short_desc"  value="<?=$product['short_desc']?>">
            </div>
            <div>
                <label for="main_desc">Main Description</label>
                <textarea placeholder="Main Description" cols="30" rows="10" name="main_desc" id="main_desc"><?=$product['description']?></textarea>
            </div>
            <div>
                <label for="footer_desc">Footer Description</label>
                <textarea placeholder="Footer Description" name="footer_desc" id="footer_desc"><?=$product['description_footer']?></textarea>
            </div>
            <div>
                <label for="image">Image</label>
                <input type="hidden" name="size" value="10000000">
                <input type="file" id="image"  name="image">
            </div>
            <div>
                <label for="price">Price</label>
                <input type="number" placeholder="Price" name="price" id="price"  value="<?=$product['price']?>">
            </div>
            <div>
                <label for="quantity">Quantity</label>
                <input type="number" placeholder="Quantity" name="quantity" id="quantity"  value="<?=$product['quantity']?>">
            </div>
            <input type="submit" value="UPDATE" name="submit">
           
        </form>
    </div>
    
</body>
</html>


    