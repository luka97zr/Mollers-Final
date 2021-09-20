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
        <form action="includes/reset_request.php" method="post">
            <h3>Reset your password</h3>
            <p>An email will be send to you with instructions to reset your password</p>
            <input type="text" placeholder="Enter your e-mail addres" name="email">
            <input type="submit" value="RECIVE NEW PASSWORD" name="reset-submit">
            <?php
                if(isset($_GET['reset'])&&$_GET['reset']== 'success')
                    echo "<p id=reset_msg>Check your e-mail!</p>";
            ?>
        </form>
       

    </div>
</body>
</html>