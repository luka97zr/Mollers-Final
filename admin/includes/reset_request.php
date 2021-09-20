<?php
    require_once "../../Base/dB.php";
    if(isset($_POST['reset-submit'])){
        $selector = bin2hex(random_bytes(8));
        $token = random_bytes(32);
        

        $url="http://www.mollers.co.rs/Mollers/admin/create_new_password.php?selector=".$selector."&validator=". bin2hex($token);
        $expires = date("U") + 900;

        $userEmail = $_POST['email'];
        $b -> delete_token($userEmail);
        $b -> create_token($userEmail,$selector,$token,$expires);



        $to = $userEmail;
        
        $subject = "Reset your password";

        $message = '<p>We recieved a password reset request. The link to reset your password is below. ';
        $message .= 'If you did not make this request, you can ignore this email</p>';
        $message .= '<p>Here is your password reset link: </br>';
        $message .= '<a href="' . $url . '">' . $url . '</a></p>';

        $headers = "From: Moller's <mollersc@mollers.co.rs>\r\n";
        $headers .= "Reply-To: mollersc@mollers.co.rs\r\n";
        $headers .= "Content-type: text/html\r\n";

         mail($to, $subject, $message, $headers);

         header("Location: ../reset_pwd.php?reset=success");

        

    } else {
        header("Location: ../../index.php");
    }
