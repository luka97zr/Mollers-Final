<?php
    if(!isset($_POST['country'])){
        header("Location: ../../country.php");
    }else{
        $url = $_POST['country'];

        header("Location: $url");
    }
  