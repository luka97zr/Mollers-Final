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
    <?php
        session_start();
        if(!isset($_SESSION['user_id'])){
            header("Location: ../index.php");
        }
    ?>
    <div class="add_product--wrapper">
    <a href="../panel.php">GO BACK</a>
        <form action="includes/add_product.php" method="post" enctype="multipart/form-data">
            <div>
                <label for="name">Product Name</label>
                <input type="text" placeholder="Product Name" name="name" id="name">
            </div>
            <div>
                <label for="short_desc">Short Description</label>
                <input type="text" placeholder="Short Description" name="short_desc" id="short_desc">
            </div>
            <div>
                <label for="main_desc">Main Description</label>
                <textarea placeholder="Main Description" cols="30" rows="10" name="main_desc" id="main_desc">
                    <p class="main_paragraph">Prednost ulja jetre bakalara nad ostalim oblicima je njegova stabilnost, bolja i brža apsorpcija, bolja iskorišćenost EPA i DHA u odnosu na ulja bogata Omega-3 masnim kiselinama iz drugih izvora.</p>
                        <span class="bold">Prirodno ulje jetre bakalara sadrži:</span>
                        <ul>
                            <li>1,2 g prirodnih omega 3 masnih kiselina</li>
                            <li>EPA i DHA za normalan rad srca, stabilan pritisak i normalne vrednosti masnoće u krvi</li>
                            <li>Vitamin D i E za dobar imunitet i jake kosti</li>
                            <li>Vitamin A za dobar vid i poboljšanu oštrinu</li>
                            <li>Prijatnog ukusa limuna ili jabuke</li>
                        </ul>
                        <span><span class="bold">Preporučena doza:</span> Jedna mala kašika (5ml) odgovara 600mg DHA i 400mg EPA (što odgovara oko 500g svežeg bakalara)</span>
                        <span class="green_bold">Möller’s Omega-3 Dokazana zaštita zdravlja cele porodice.</span>

                </textarea>
            </div>
            <div>
                <label for="footer_desc">Footer Description</label>
                <textarea placeholder="Footer Description" name="footer_desc" id="footer_desc">
                    <span class="product_footer">Jedna mala kašika (5ml) odgovara 600mg DHA i 400mg EPA (što odgovara oko 500g svežeg bakalara)</span>
                </textarea>
            </div>
            <div>
                <label for="image">Image</label>
                <input type="hidden" name="size" value="10000000">
                <input type="file" id="image" name="image">
            </div>
            <div>
                <label for="price">Price</label>
                <input type="number" placeholder="Price" name="price" id="price">
            </div>
            <div>
                <label for="quantity">Quantity</label>
                <input type="number" placeholder="Quantity" name="quantity" id="quantity">
            </div>
            <input type="submit" value="ADD" name="submit">
        </form>
    </div>
</body>
</html>