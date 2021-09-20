<?php
    $meta = ["index.php"=>"Početna","about.php"=>"Masne kiseline","vitamins.php"=>"Vitamini A-D-E","dha.php"=>"DHA","omega3.php"=>"Omega-3","history.php"=>"Istorijat","cart.php"=>"Korpa","detailed.php"=>"Proizvod-Detaljnije","country.php"=>"Države","faq.php"=>"Često postavljena pitanja","products.php"=>"Naši proizvodi","shop.php"=>"Šop","contact.php"=>"Kontakt","shop_product.php"=>"Proizod detaljnije"];
   
    foreach($meta as $key => $value){
        $meta_tag="";
        if(strpos($_SERVER['REQUEST_URI'], $key) !== false){
            $meta_tag = $value;
            return $meta_tag;
        }
       
    }
    