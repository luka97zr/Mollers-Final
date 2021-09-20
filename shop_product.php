<?php include "header.php";
 include "Base/Products.php";
if(!isset($_GET['id']))
    header("Location: products.php");
else
    $id=$_GET['id'];
?>
    <section class="section_shop-product">
        <div class="section_shop-product--wrapper">
            <div class="section_shop--header margin_top">
                <h4>Prodavnica</h4>
                <ul class="breadcrumbs">
                    <li><a href="#"></a><img src="Design/shop/home.png" alt="home"></li>
                    <li><a href="shop.php" >Proizvodi</a></li>
                    <li><?=$lp->get_name($id)?></li>
                </ul>
            </div>
                <?php
                    $lp-> buy_product_detailed($id);
                    ?>
        </div>
        
    </section>
    <div class="product_availability--popup detail_modal" id="detail_modal">
            <div>
                <h3>Obaveštenje o dostupnosti proizvoda</h3>
                <p>Molimo vas za email adresu na koju vam možemo poslati informaciju o dostupnostu željenog prozvoda</p>
                <form action="">
                    <input type="email" name="" id="" placeholder="e-mail adresa">
                    <input type="submit" value="U redu">
                </form>
            </div>
        </div>
        <div class="overlay" id="detail_overlay"></div>

<?php include "section-social.php"?>
<?php include "footer.php"?>
