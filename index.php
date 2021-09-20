<?php
include "header.php"
?>
        <!-- Header slider -->

        <section class="home_header--slider ">
            <div class="slide1 slider  show_slides">
                <img src="Design/Slider/slide1.png" class="lazy" alt="" >
            </div>
            <div class="slide2  slider">
               <video src="Design/Slider/DJI_0299.mov" type="mp4/mov" autoplay loop muted id="slider_video" poster="Design/Slider/video.png"></video>
            </div>
            <div class="slide3 slider">
                <img src="Design/Slider/slide2.png" class="lazy" alt="">
            </div>
            <div class="slider_content">
                <h1 class="slide_headline">Esencijalne masne <br> kiseline</h1>
                <a href="about.php" id="slider_link">Saznaj više</a>
                <div class="slider_navigation"></div>       
        </div>
        
        <img src="Design/home/flag.png" alt="Norway flag" id="slider_flag">
        </section>
        <!-- Section products -->
        <section class="home_products margin-medium-top">
            <div class="home_products--container">
                <div class="home_products--wrapper">
                    <?php
                        include "Base/Products.php";
                        $lp -> show_four_products();
                    ?>
                </div>
            </div>
            <a href="products.php" class="all_products--btn">Svi proizvodi</a>
        </section>
        <!-- Section man standing parallax -->
        <section class="home_parallax_man margin-medium-top">
            <div class="man_standing--parallax intersect " id="man">
                <img src="Design/parallax/man_single.webp" alt="" id="man_single"class="man_single lazy">
                <img src="Design/parallax/background_layer.webp" alt="" id="background" class="background lazy">
                <div class="man_standing--content" id="man_standing--content">
                    <p>Sve što bi trebalo da znate o Möller’s uljima jetre bakalara</p>
                    <p>Möller’s ulje jetre norveškog arktičkog bakalara predstavlja izvor Omega-3 masnih kiselina EPA i DHA i vitamina A, D i E. Prednost ulja jetre bakalara nad ostalim oblicima jeste njegova stabilnost, bolja i brža apsorpcija.</p>
                    <a href="about.php">Saznaj više</a>
                </div>
            </div>
        </section>

        <!-- Section vitamins -->
        <section class="home_vitamins margin-big-top home_parallax--second">
            <div class="home_vitamins--row">
                <div class="col-1 col intersect" id="home_vitamins-col-1">
                    <div class="col-1-img col-img vitamin_img">
                        <span class="img-txt">A</span>
                        <img src="Design/home/A_circle.png" alt="vitamin info" class="lazy">
                    </div>
                        <h2>Vitamin A</h2>
                        <span class="home_vitamins-col-desc">Vitamin A za dobar vid i poboljšanu oštrinu vida</span><br>
                        <a href="/Mollers/vitamins.php#vit_a" class="home_vitamins-btn">Saznaj više</a>
                </div>
                <div class="col-2 col intersect" id="home_vitamins-col-2">
                    <div class="col-2-img col-img vitamin_img">
                        <span class="img-txt">D</span>
                        <img src="Design/home/D_circle.png" alt="vitamin info" class="lazy">
                    </div>
                        <h2>Vitamin D</h2>
                        <span class="home_vitamins-col-desc">Kosti dece zahtevaju vitamin D za zdrav rast i razvoj</span><br>
                        <a href="/Mollers/vitamins.php#vit_d"class="home_vitamins-btn">Saznaj više</a>
                </div>
                <div class="col-3 col intersect" id="home_vitamins-col-3">
                    <div class="col-3-img col-img vitamin_img">
                        <span class="img-txt">E</span>
                        <img src="Design/home/E_circle.png" alt="vitamin info" class="lazy">
                    </div>
                        <h2>Vitamin E</h2>
                        <span class="home_vitamins-col-desc">Vitamin E doprinosi jačanju imuniteta</span><br>
                        <a href="/Mollers/vitamins.php#vit_e"class="home_vitamins-btn">Saznaj više</a>
                </div>
            </div>
        </section>
        <!-- Section familly parallax -->
        <section class="home_familly margin-medium-top home_parallax--third intersect" id="home_familly-section">
            <div class="home_familly--parallax" id="home_familly--parallax">
            <img src="Design/home/family_long.png" alt="familly" class="lazy" id="familly">
                <div class="familly--content">
                    <span>Šta je Omega-3?</span>
                    <p>Omega-3 masne kiseline su opšti pojam za grupu polinezasićenih masnih kiselina. Njihovo ime potiče
                        od dvostrukih veza koje se nalaze na trećem atomu računajući od metilnog kraja (2,3). Omega-3 alfalinoleinska kiselina je prekurzor drugih Omega-3 masnih kiselina (3,4) i obično se može naći u uljima
                        najčešće konzumirane biljke poput kanole i semena lana (2,5). To je zapravo Omega-3 masna kiselina
                        iz morskih izvora, o kojoj se mogu pronaći na hiljade studija koje dokazuju njene zdravstvene efekte.</p>
                    <a href="omega3.php" class="home_vitamins-btn">Saznaj više</a>
                </div>
            </div>
        </section>
        <section class="home_dha" >
            <div class="home_dha--cover">
                <div class="home_dha--cover-textbox">
                    <h3 class="dha-title" id="dha-title-1">DHA</h3>
                    <h3 class="dha-title" id="dha-title-2">EPA</h3>
                    <p class="dha-text" id="dha-text-1">Dokozaheksaenoinska kiselina (DHA) je Omega-3 masna kiselina koja je primarna strukturna komponenta ljudskog moždanog cerebralnog korteksa. Doprinosi normalnom razvoju mozga i očiju kod dece.</p>
                    <p class="dha-text" id="dha-text-2">Eikozapentaenoinska kiselina (EPA) i njeni metaboliti deluju u telu putem njihovih interakcija sa
                        metabolitima arahidonske kiseline. Kao i DHA, EPA kiselina ima veliki značaj pri normalnom razvoju
                        mozga i očiju kod dece.</p>
                    <a href="/Mollers/dha.php" class="home_vitamins-btn">Saznaj više</a>
                    <div class="home_dha--radiobtn">
                        <div onclick="dha_izbor(1)" id="dha-button-1"></div>
                        <div onclick="dha_izbor(2)" id="dha-button-2"></div>
                    </div>
                </div>
                <script>
					var dha_cur=0;
					function dha_izbor(id)
					{
						if(dha_cur!=id)
						{
							$("h3.dha-title").hide();
							$("p.dha-text").hide();
							if(dha_cur>0)
							{
								$("div#dha-button-"+dha_cur).removeClass('aktivan');
							}
							dha_cur=id;
							$("div#dha-button-"+dha_cur).addClass('aktivan');
							$("h3#dha-title-"+dha_cur).fadeIn(240);
							$("p#dha-text-"+dha_cur).fadeIn(240);
						}
					}
					dha_izbor(1);
				</script>
            </div>
        </section>
    
    <?php include "section-social.php"?>
   <?php include "footer.php"?>
   </main>
   