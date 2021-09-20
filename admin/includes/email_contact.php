<?php

    if(!isset($_POST['subscription']))
        $sub = "I don't want to subscribe";
    else{ 
        $subscription= $_POST['subscription'];
        $sub = "I want to subscribe";
    }
  
    if(isset($_POST['contact-btn'])){
        $info_type= $_POST['info_type'];
        $product= $_POST['product'];
        $msg= $_POST['msg'];
        $name= $_POST['name'];
        $lname= $_POST['lname'];
        $address= $_POST['address'];
        $postal= $_POST['postal'];
        $city= $_POST['city'];
        $email= $_POST['email'];
        $phone= $_POST['phone-number'];
      

        $mailTo = "mollersc@mollers.co.rs";
        $headers = "From: " .$email;
        $txt = "You have recieved email from".$name." \n\n".$msg;

        mail($mailTo,$headers,$txt);
        header("Location: ../../contact.php?mailsend");

    }else{
        header("Location: ../../contact.php");

    }


   