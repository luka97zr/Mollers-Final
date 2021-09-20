<?php
require "../../Base/dB.php";
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $pass = $_POST['password'];
    $b ->uidExists($username,$username);
    $b ->get_user($username,$pass);
}else{
    header("Location: ../../index.php");
}






