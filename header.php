<!DOCTYPE html>
<html lang="en" >
<head>
    <?php include "config.php"?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css?ver=<?php echo date('U');?>">
    <link rel="stylesheet" href="css/lazy.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <title>Möller's - <?= $meta_tag?></title>
</head>
<body >
    <?php
        include_once "Cart/Cart.php";
        $br = $k -> get_cart_amount();?>
    <!-- Navigation bar -->
       <nav class="nav">
        <div class="nav_logo--box nav_col-1">
            <a href="index.php"><img src="Design/home/logo.png" alt="logo"></a>
        </div>
        <div class="nav_col-2">
            <ul class="nav_shop">
                <li class="nav_shop--btn"><a href="shop.php" >PRODAVNICA</a></li>
                <li class="nav_shop--cart"><a href="cart.php" ><img src="Design/home/cart.svg" alt="shopping_cart"><span><?=$br?></span></a></li>
            </ul>
            <ul class="nav_social">
                <li class="nav_social--fb"><a href="https://www.facebook.com/mollerssrbija/" target="blanc"><img src="Design/home/facebook.svg" alt="facebook"></a></li>
                <li class="nav_social--inst"><a href="https://www.instagram.com/mollerssrbija/" target="blanc" ><img src="Design/home/instagram.svg" alt="instagram"></a></li>
            </ul>
            <div class="nav_burger open " id="mySidenav" onclick="void(0)"><a href="" onclick="void(0)"></a></div>
            <div class="navigation nav-btn" id="nav">
                <div class="navigation-items" id="nav_items">
                    <div class="navigation-header">
                        <h6>Menu</h6>
                        <a class="navigation_exit--btn close" id="close">+</a>
                    </div>
                    
                    <ul>
                        <li><a href="index.php">Početna strana</a></li>
                        <li><a href="about.php">Sve što bi trebalo da znate o Moller’s uljima jetre bakalara</a></li>
                        <li><a href="vitamins.php">Vitamini A - D - E</a></li>
                        <li><a href="omega3.php">Šta je Omega-3?</a></li>
                        <li><a href="dha.php">DHA - EPA</a></li>
                        <li><a href="history.php">Istorijat</a></li>
                        <li><a href="products.php">Naši proizvodi</a></li>
                    </ul>
                </div>
                <div class="navigation-footer" id="nav_footer">
                    <ul>
                        <li><a href="country.php">Izaberi zemlju</a></li>
                        <li><a href="contact.php">Kontaktiraj nas</a></li>
                        <li><a href="faq.php">Pitanja i odgovori</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
         