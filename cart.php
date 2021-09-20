<?php
include_once "header.php";
?>

        <section class="section_cart--wrapper margin-big-bottom">
        <?php $k -> cart();?>
        </section>
        <div  class="checkout_form modal" id="modal">
                <form action="Cart/save_cart.php" method="post">
                        <span>Vaše informacije</span>
                        <div class="name">
                                <input type="text" placeholder="Ime" name="name" required>
                                <input type="text" placeholder="Prezime" name="lName"required>
                        </div>
                        <div class="city">
                                <input type="text" placeholder="Grad" name="city"required>
                                <input type="text" placeholder="Poštanski broj" name="postal"required>
                        </div>
                        <input type="text" placeholder="Adresa" id="shipping" name="address"required>
                        <input type="text" placeholder="Broj telefona" id="phone" name="phone"required>

                        <textarea name="comment" id="" cols="30" rows="4" placeholder="Vaš komentar"></textarea>
                        <div class="payment">
                                <span>Način plaćanja</span>
                                <div class="credit">
                                        <input type="radio" name="payment_method" id="credit">
                                        <label for="credit">Kreditna/Debitna Kartica</label>
                                </div>
                                <div class="cash">
                                        <input type="radio" name="payment_method" id="cash">
                                        <label for="cash">Plaćanje pouzećem</label>
                                </div>
                        </div>
                        <div class="total_amount">
                                <span>Ukupno za plaćanje:<span class="bold"><?= $k -> total();?></span>
                                rsd</span>
                                <input type="submit" value="Plati" name="checkout">
                        </div>               
                </form>
                
        </div>
        <div class="overlay" id="overlay"></div>
        </main>
<?php include "section-social.php"?>
<?php include "footer.php"?>
