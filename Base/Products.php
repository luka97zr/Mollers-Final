<?php

include_once "dB.php";


class Product{
    public $id,$name,$desc,$short_desc,$price,$image,$footer,$quantity;

    function __construct($products){
        $this -> id = $products['id'];
        $this -> name = $products['name'];
        $this -> desc = $products['description'];
        $this -> short_desc = $products['short_desc'];
        $this -> footer = $products['description_footer'];
        $this -> price =  number_format($products['price'],0,"",".");
        $this -> image = $products['image'];
        $this -> quantity = $products['quantity'];
       
    }
    //products.php products
    function one_product(){?>
        <div class='shop_products'>
        <a href="/Mollers/detailed.php?id=<?=$this->id?>"><div class='shop_products--img'style="background:url('../Mollers/Base/product_img/<?=$this->image?>') no-repeat center / contain"></div></a>
            <h1><?=$this->name?></h1>
            <p><?=$this->short_desc?></p>
        </div>
  <?php  } 

        //shop.php products
        function one_product_shop(){?>
            <div class='shop_products product_aline'>
                <a href="/Mollers/shop_product.php?id=<?=$this->id?>"><div class='shop_products--img'style="background:url('../Mollers/Base/product_img/<?=$this->image?>') no-repeat center / contain"></div></a>
                <h1><?=$this->name?></h1>
                <p><?=$this->short_desc?></p>
                <div class="product_quantity">
                <?php if($this->quantity == 0){
                            echo "<div class='red'></div>";
                            echo" <span>Nema na stanju</span>";
                        }else{
                            echo "<div class='green'></div>";
                            echo "<span>Na stanju</span>";
                        }
                    ?>
                </div>
                <?php
                    $available = ($this->quantity == 0)? "not_available": ""; 
                ?>
                    <div class="product_price <?= $available?>">
                        <span class="price"><?=$this->price?></span><span class="currency">RSD</span>
                    </div>
                        <div class="shop_product-cart  <?= $available?>">
                            <div class="shop_product-cart--btn <?= $available?>"><img src="../Mollers/Design/shop/cart.png" alt="cart"></div>
                            <form action="Cart/change.php">
                                <input type="hidden" name="action" value="add">
                                <input type="hidden" name="product_id" value="<?=$this->id?>">
                                <?php if($available == "not_available"){?>
                                     <a href="#" class="add--btn <?=$available?>" id="btn-gray">Dodaj u korpu</a>
                               <?php }else{?>
                                    <input type="submit" class="add--btn" id="btn-gray" value="Dodaj u korpu">
                           <?php    } ?>
                               
                            </form>
                        </div>      
            </div>
  <?php      }
    //Contact form select
  function select_product(){?>
        <option value="<?=$this->name?>"><?= $this->name?></option>
    </div>
  <?php }
//Detailed.php
  function detailed_product(){?>
    <div class="product_wrapper product_wrapper--<?=$this->id?>">
       <img src="../Mollers/Base/product_img2/<?=$this->image?>" alt="" id="product_image">
            <div class="product_content">
                <div class="product_content--basicinfo">
                    <h2><?=$this->name?></h2>
                    <p><?= $this->short_desc?></p>
                </div>
                <div class="content_main--wrap">
                    <div class="product_content--main">
                        <?= $this-> desc ?>
                    </div>
                </div>
                <div class="product_content--footer"><?=$this->footer?></div>
                <div class="product_add-to-cart">
                    <form action="../Mollers/Cart/change.php">
                        <input type="hidden" name="action" value="add">
                        <input type="hidden" name="product_id" value="<?=$this->id?>">
                        <input type="submit" value="Dodaj u korpu">                           
                        <div class="detailed_product_amount--row ">
                            <h6>Količina</h6>
                            <div class="subBtn">-</div>
                            <div><input name="amount"type="text"class="counter" value="1" readonly></div>
                            <div class="addBtn">+</div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } 
    //One product shop
    function buy_shop_product(){?>
       <div class="product_wrapper--<?=$this->id?>">
            <div class="shop_product--row1">
                <div class="shop_product--row1-col1">
                    <img src="../Mollers/Base/product_img2/<?=$this->image?>" alt="">
                </div>
                <div class="shop_product--row1-col2">
                    <div class="shop_product-content--basicinfo">
                        <h2><?=$this->name?></h2>
                        <p><?= $this->short_desc?></p>
                    </div>
                    <div class="product_quantity">
                        <?php if($this->quantity == 0){
                                    echo "<div class='red'></div>";
                                    echo" <span>Nema na stanju</span>";
                                }else{
                                    echo "<div class='green'></div>";
                                    echo "<span>Na stanju</span>";
                                }
                            ?>
                     </div>
                     <?php   $available = ($this->quantity == 0)? "details_not_available": ""; 
                         if($available == "details_not_available")  {
                             ?>
                                <div class="availability_inform">
                                    <span>Želite da primite obaveštenje kada proizvod postane ponovo dostupan?</span>
                                    <a href="" data-modal-target="#detail_modal">Obavesti me</a>
                                </div>
                      <?php   }   ?>
                     <div class="shop_product--price <?=$available?>">
                         <span >Cena</span>
                        <span class="price"><?=$this->price?></span><span class="currency">RSD</span>
                    </div>
                    <div class="shop_product--amount  <?=$available?>">
                        <h6>Količina</h6>
                        <div class="product_amount--row  <?=$available?>">
                            <!-- Form starts -->
                            <form action="../Mollers/Cart/change.php">
                                <div id="form_row">
                                    <input type="hidden" name="action" value="add">
                                    <input type="hidden" name="product_id" value="<?= $this->id?>">
                                    <div class="subBtn">-</div>
                                    <?php if($available == "details_not_available"){ ?>
                                    <div><input name="amount"type="text" readonly value="" ></div>
                                    
                                <?php }else { ?>
                                    <div><input name="amount"type="text"class="counter" value="1" readonly ></div>
                            <?php    } ?>
                                   
                                    <div class="addBtn">+</div>
                                </div>
                           
                        </div>
                    </div> 
                    <div class="shop_product-row1-col2--bottom  <?=$available?>">
                        <span>Ukupno</span>
                        <span><?= $this->price?></span>
                        <span>RSD</span>
                        <div class="shop_product-cart product-cart  <?=$available?>">
                            <div class="shop_product-cart--btn"><img src="../Mollers/Design/shop/cart.png" alt="cart"></div>
                                <!-- Form ends -->
                                <?php if($available == "details_not_available"){ ?>
                                   <a href="">Dodaj u korpu</a>
                                    
                                <?php }else { ?>
                                    <input type="submit" id="submit" value="Dodaj u korpu">
                            <?php    } ?>
                                
                            </form>
                    </div>    
                    <a href="shop.php" id="back">Nazad na prodavnicu</a>  
                    </div>
                    
                </div>
            </div>
            <div class="shop_product--row2">
                <h5>Opis</h5>          
                <div class="product_content--main product_desc">
                        <?= $this-> desc ?>
                </div>     
                <div><?=$this->footer?></div>
            </div>
        </div>
        
   <?php }

   
}

class ListOfProducts{
    public $p;

    function __construct(){
        $this -> p = [];
    }

   
    function add_products($products){
        for($i=0; $i<count($products);$i++){
            $product = new Product($products[$i]);
            array_push($this->p, $product);
        }
    }

    function show_all_products(){
        foreach($this->p as $product)
            $product->one_product();
    }
    function show_four_products(){
        for($i=0;$i<4;$i++)
            $this->p[$i]->one_product();
        
    }
    function shop_products(){
        foreach($this->p as $product)
            $product ->  one_product_shop();
    }
    function contact_select_product(){
            foreach($this->p as $product)
            $product->select_product();
    }
    function one_product_detailed($id){
        for($i=0; $i<count($this->p); $i++){
            if($this->p[$i]->id == $id)
                $this->p[$i]->detailed_product();
        }
    }
    function buy_product_detailed($id){
        for($i=0;$i<count($this->p);$i++)
            if($this->p[$i]->id == $id)
                $this->p[$i]->buy_shop_product();
    }
    function recommended_products($id){
        for($i=0;$i<5;$i++)
            if($this->p[$i]->id == $id)
                continue;
            else
            $this->p[$i]->one_product();
    }
    function get_name($id){
        for($i=0;$i<count($this->p);$i++)
             if($this->p[$i]->id == $id)
                echo $this->p[$i]->name;
    }
    function get_img($id){
        for($i=0;$i<count($this->p);$i++)
             if($this->p[$i]->id == $id)
                echo $this->p[$i]->image;
    }
    function get_desc($id){
        for($i=0;$i<count($this->p);$i++)
             if($this->p[$i]->id == $id)
                echo $this->p[$i]->short_desc;
    }
    function get_crud_products(){?>
        <div class="admin_panel--top">
        <a href='index.php' id="back_home">Back to Home</a>
         <h3>Admin Panel</h3>
         <a href="admin/includes/log_out.php" id="log_out">Log Out</a>
       
        </div>
        <table>
            <thead>
                <tr>
                    <th>product id</th>
                    <th>name</th>
                    <th>short description</th>
                    <th>description</th>
                    <th>description footer</th>
                    <th>image</th>
                    <th>price</th>
                    <th>quantity</th>
                    <th colspan="2">actions</th>
                    
                </tr>
            </thead>
            <tbody>
              <?php  
                for($i=0;$i<count($this->p);$i++){  ?>
                    <tr>
                        <td><?= $this->p[$i]->id?></td>
                        <td><?= $this->p[$i]->name?></td>
                        <td><?= $this->p[$i]->short_desc?></td>
                        <td><?= $this->p[$i]->desc?></td>
                        <td><?= $this->p[$i]->footer?></td>
                        <td id="crud_product--img"><img src="../Mollers/Base/product_img2/<?=$this->p[$i]->image?>" alt="<?=$this->p[$i]->name?>"></td>
                        <td><?= $this->p[$i]->price?></td>
                        <td><?= $this->p[$i]->quantity?></td>
                        <td><a href="admin/change_product_form.php?id=<?=$this->p[$i]->id?>" id="edit">EDIT</a></td>
                        <td><a href="admin/includes/delete_product.php?id=<?=$this->p[$i]->id?>" id="delete" onclick="return confirm('Are you sure you want to Remove?');">REMOVE</a></td>
                   </tr>
         <?php  }     ?>                           
            </tbody>
        </table>
 <?php }
}

$lp = new ListOfProducts();
$lp -> add_products($products);

