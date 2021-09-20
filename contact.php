<?php include "header.php"?>
    <section class="section_contact margin-big-bottom" >
        <div class="contact_aside contact_img"></div>
        <div class="contact_content--wrapper">
                <div class="contact_content--header">
                    <h1>Kontaktirajte nas</h1>
                    <p>Ako imate pitanja, savete ili žalbu u vezi sa našim proizvodima, veb stranicom ili iz drugih razloga želite da nas kontaktirate, možete popuniti obrazac u nastavku.</p>
                </div>
                <div class="contact_content">
                    <div class="form-1 form">
                    <form action="admin/includes/email_contact.php" method="post">
                        <h4>Vrsta upita</h4>
                        <div class="contact_select--custom">
                            <select name="info_type" id="" >
                                <option selected disabled hidden>Povratna informacija</option>
                                <option value="complain">Kritika</option>
                                <option value="advice">Savet</option>
                                <option value="question">Pitanje</option>
                            </select>
                            <span class="contact_select--arow"></span>
                        </div>
                        <div class="contact_select--custom">
                            <select name="product" id="custom2">
                            <?php include "Base/Products.php";
                                        $lp ->contact_select_product();?>
                            </select>
                            <span class="contact_select--arow"></span>
                        </div>
                    </div>
                    <div class="form-2 form">
                            <h4>Šta želite da nam kažete?</h4>
                            <textarea id="msg" name="msg" placeholder="Vaša poruka" ></textarea>                       
                    </div>
                    <div class="form-3 form">
                        <h4>Vaše informacije</h4>
                            <input type="text" placeholder="Ime" name="name">
                            <input type="text"placeholder="Prezime" name="lname" >
                            <input type="text" placeholder="Adresa" name="address">
                            <input type="text" placeholder="Poštanski broj" name="postal">
                            <input type="text" placeholder="Grad" name="city">
                            <input type="email" placeholder="Email" id="email" name="email" required ><span id="validation_msg" ></span>
                            <input type="text" placeholder="Broj telefona" name="phone-number">
                      
                    </div>
                    <div class="form-4 form" id="border_none">
                    <h4>Saglasnost</h4>
                        <input type="checkbox" name="subscription" id="">
                        <p>Da li želite da se za vaš upit i ostatak prepiske pobrinemo za kasnije? Poznavanje vaše istorije omogućiće nam da sagledamo slučaj u kontekstu i pružimo bolju uslugu u slučaju kasnijeg upita.</p>                
                         <input type="submit" value="Pošaljite obrazac" class="contact_btn" id="validate" name="contact-btn" >
                         </form>
                         <?php
                            if(isset($_GET['mailsend']))
                                echo "<p id='contact_msg'>Hvala vam što ste nas kontaktirali!</p>";
                        ?>


                  
                    </div>
                </div>
        </div>
    </section>

<?php include "section-social.php"?>
<?php include "footer.php"?>
</main>

