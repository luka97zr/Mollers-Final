<?php include "header.php"?>
    <section class="country_header">
        <div class="select_wrapper">
            <div class="custom_select">
                <form action="admin/includes/country_select.php" method="post">
                        <select name="country" id="">
                            <option selected disabled hidden>Izaberi zemlju</option>
                            <option value="https://www.mollers.com/fr/">France</option>
                            <option value="https://www.mollers.com/es/">Spain</option>
                            <option value="https://www.mollers.com/de/">Germany</option>
                            <option value="https://www.mollers.com/by/">Belarus</option>
                            <option value="https://www.mollers.com/ge/">Georgia</option>
                            <option value="https://www.mollers.com/ru/">Russian</option>
                            <option value="https://www.mollers.com/it/">Italian</option>
                            <option value="https://www.mollers.com/se/">Sweden</option>
                            <option value="https://www.mollers.com/dk/">Denmark</option>
                            <option value="https://www.mollers.com/hr/">Croatia</option>
                        </select>
                        <span class="custom_arrow"></span>
                        <div>
                       <button id="page_select" >Idi na stranu</button>        
                    </div>
                        
                </form>
                     
            </div>         
  </section>

<?php include "footer.php"?>
</main>
