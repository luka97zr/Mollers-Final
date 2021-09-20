<?php
include "header.php";
if(!isset($_GET['id'])){
        header("Location: products.php");
    }
    
   

    ?>

        <section class="section_detailed--product">
        <?php
        $id=$_GET['id'];
        include "Base/Products.php";
        $lp-> one_product_detailed($id);
        ?>
        </section>
        <section class="recommended_products margin-big-bottom">
            <h4>Preporučujemo za vas</h4>
            <div class="recommended_products--wrap">
                <?php
                    $lp-> recommended_products($id);
                ?>
            </div>
        </section>
      
    <?php include "section-social.php"?>
    <?php include "footer.php"?>
