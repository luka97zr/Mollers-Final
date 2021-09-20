<?php 
session_start();
include_once "Base/Products.php"; 
include_once "Base/dB.php"; 
if(!isset($_SESSION['user_id']))
    header("Location: admin.php");
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/5d1f5fc735.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class="crud_panel--wrapper">
        <?php 
             $lp ->get_crud_products();
             if(isset($_GET['delete'])&& $_GET['delete']=='successful')
                echo "<p id='msg'>Product has been successfully deleted</p>";
              if(isset($_GET['update'])&& $_GET['update']=='successful')
              echo "<p id='msg'>Product has been successfully updated</p>";
              if(isset($_GET['add'])&& $_GET['add']=='successful')
              echo "<p id='msg'>New product has been successfully added</p>";
             
       ?>
    </div>
    <a href="admin/add_form.php" id="add_new">ADD NEW</a>
</body>
</html>
