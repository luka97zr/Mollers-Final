<?php include "header.php"?>

    <section class="products_header margin-medium-bottom">
        <div class="products_header--textbox">
                <h1>Naši proizvodi</h1>
                <span>Möller’s Omega-3 masne kiseline</span>
        </div>
    </section>
    <section class="products_info margin-big-bottom">
        <div class="products_info--row">
            <div class="products_info--col1 products_info--col">
            <p id="bold">Möller’s Vama i Vašoj porodici nudi bogate i zdrave Omega-3 proizvode, pune esencijalnih vitamina i
                to čini od 1854. godine.</p>
            </div>
            <div class="products_info--col2 products_info--col">
                <p>Norveški Omega-3 brend No1! Naš asortiman čine visokokvalitetni proizvodi za sve životne faze, od
                trudnoće i porodičnog života sa decom, do odrasle dobi i zdravog starenja. Razvili smo različite
                preparate u vidu tečnosti, kapsula i želea kako bi odgovarali Vašim ličnim potrebama.</p>
            </div>
            <div class="products_info--col3 products_info--col">
            <p>Čuvajte Vas i Vaše voljene uz zdrave svakodnevne navike tokom celog života!</p>
            </div>
        </div>
    </section>
    <section class="products_all_products margin-big-bottom">
        <div class="all_products--wrapper">
            <?php  include "Base/Products.php";
                    $lp -> show_all_products();
            ?>
        </div>
    </section>

<?php include "section-social.php"?>
<?php include "footer.php"?>
</main>