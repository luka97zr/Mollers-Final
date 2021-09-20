<?php
    include "../../Base/dB.php";
    if(isset($_GET['id'])){
        $id = ($_GET['id']);
        $b -> delete_product($id);
        header("Location: ../../panel.php?delete=successful#msg");
    }else{
        header("Location: ../../index.php");
    }
   