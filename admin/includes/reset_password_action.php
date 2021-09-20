<?php
session_start();
    require_once "../../Base/dB.php";
    if(isset($_POST['reset_password__submit'])){

        $selector = $_POST['selector'];
        $validator = $_POST['validator'];
        $password = $_POST['pwd'];
        $passwordRepat = $_POST['pwd-repeat'];


        if($password !== $passwordRepat){
            
            header("Location: ../create_new_password.php?error=pwdMatch");
            exit();

        }
        $currentDate = date("U");
        $b -> reset_pwd($currentDate,$selector,$validator,$password);
    }else
        header("Location: ../../index.php");