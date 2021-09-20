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
    <div class="reset_pwd--wrapper">
        
        <?php
               $selector = $_GET['selector'];
               $validator = $_GET['validator'];

               if(empty($selector) || empty($validator)){
                   header("Location: ../admin.php?error=validation");                 
               }elseif(ctype_xdigit($selector) !== false || ctype_xdigit($validator) !== false){ ?>

                    <form action="includes/reset_password_action.php" method="post">
                        <input type="hidden" name="selector" value="<?= $selector; ?>">
                        <input type="hidden" name="validator" value="<?= $validator; ?>">
                        <input type="password" name="pwd" placeholder="Enter a new password" required>
                        <input type="password" name="pwd-repeat" placeholder="Re-enter a new password" required>
                        <input type="submit" name="reset_password__submit" value="Reset password">
                
                    </form>

                <?php

               }

               
               

        ?>

    </div>
</body>
</html>