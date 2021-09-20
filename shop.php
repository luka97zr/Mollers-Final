<?php include "header.php"?>
<section class="section_shop">
    <div class="shop_products--container">
        <div class="section_shop--wrapper">  
            <div class="section_shop--header">
                <h4>Prodavnica</h4>
                <ul class="breadcrumbs">
                    <li><a href="index.php"><img src="Design/shop/home.png" alt="home"></a></li>
                    <li>Proizvodi</li>
                </ul>
            </div>
            <div class="section_shop--products">
                <?php
                    include "Base/Products.php";
                    $lp -> shop_products();
                ?>

            </div>
        </div>
    </div>
</section>

<?php include "section-social.php"?>
<?php include "footer.php"?>