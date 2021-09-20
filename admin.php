<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <a href="index.php" id="back_home_admin">Back to Home</a>
    <div class="admin_form--wrapper">
        <form action="admin/includes/login_check.php" method="post">
            <input type="text" name="username" placeholder="username/email"required>
            <input type="password" name="password" placeholder="password" required>
            <input type="submit" value="Log in" name='submit'>
            <a href="admin/reset_pwd.php">Forgot your password?</a>
           
         </form>
         <?php
        if(isset($_GET['error'])&& $_GET['error'] == 'stmfailed'){
              echo "<p>Wrong username or password!</p>";         
        }
        if(isset($_GET['error'])&& $_GET['error'] == 'wronglogin'){
            echo "<p>Wrong username or password!</p>";         

        }
        if(isset($_GET['error'])&& $_GET['error']=='validation'){
            echo "<p>Validation could not be completed!</p>";
        }
       
        if(isset($_SESSION['user_id'])){
             header("location: panel.php");
             exit();
        }
        if(isset($_GET['newpwd'])&&$_GET['newpwd']=='passwordupdated'){
            echo "<p>Password has been changed</p>";
        }?>
    </div>
   
</body>
</html>