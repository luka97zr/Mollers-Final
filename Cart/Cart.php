<?php
session_start();

    if(!isset($_SESSION['cart_products']))
        $_SESSION['cart_products'] = [];

class Cart{
    public $cart_products;

    function __construct(){
        $this -> cart_products = $_SESSION['cart_products'];
    }
    function get_cart_amount(){
        return count($this->cart_products);
    }
    function add_to_cart($id,$name,$price,$quantity,$desc,$image){
        $exists = false;
        for($i=0;$i<count($this->cart_products);$i++)
            if($this->cart_products[$i]['id'] == $id){
                $this-> change_amount($id,$quantity);
                $exists = true;
                break;
            }
            if($exists == false){
                $new_item = ['id'=>$id,'name'=>$name,'price'=>$price,'quantity'=>$quantity,'short_desc'=>$desc,'image'=>$image];
                array_push($this->cart_products,$new_item);
            }
        $_SESSION['cart_products']=$this->cart_products;
    }
   
    function change_amount($id,$quantity){
        for($i=0;$i<count($this->cart_products);$i++){
            if($this->cart_products[$i]['id'] == $id){
                $this->cart_products[$i]['quantity'] += $quantity;
                if($this->cart_products[$i]['quantity'] <=0 )
                    $this-> drop_product($id);
                break;
            }
        }
        $_SESSION['cart_products'] = $this->cart_products;
    }

    function drop_product($id){
        for($i=0;$i<count($this->cart_products);$i++){
            if($this->cart_products[$i]['id']==$id)
                array_splice($this->cart_products,$i,1);
        }

        $_SESSION['cart_products'] = $this->cart_products;
    }

    function total(){
        $t = 0;
            for($i=0;$i<count($this->cart_products);$i++){
                $s = $this->cart_products[$i]['price'] * $this->cart_products[$i]['quantity'];
                $t += $s;
            }
            return $t;
            // =number_format($t, 2, ',', ' ');
    }

    function cart(){
        if(($_SESSION['cart_products'])!== []){ ?>
           <div class='cart_wrapper'>
           <div class="section_shop--header">
                <h4>Moja korpa</h4>
                <ul class="breadcrumbs">
                    <li><a href="#"></a><img src="Design/shop/home.png" alt="home"></li>
                    <li>Provera porudžbine</li>
                </ul>
            </div>
            <?php
           
            for($i=0; $i<count($this->cart_products); $i++){
               $this->total();
                ?>
                <div class="cart_product">
                    <div class="cart_product-col1">
                        <img src="Base/product_img/<?=$this->cart_products[$i]['image']?>">
                    </div>
                    <div class="cart_product-col2">
                        <div>
                            <h3><?=$this->cart_products[$i]['name']?></h3>
                            <span><?=$this->cart_products[$i]['short_desc']?></span>
                        </div>
                         <a href="Cart/change.php?action=drop&product_id=
                         <?=$this->cart_products[$i]['id']?>">Ukloni</a>
                    </div>
                    <div class="cart_product-col3">
                        <div>
                            <span class="price"><?=$this->cart_products[$i]['price']?></span>
                            <span class="currency">RSD</span>
                        </div>
                        <div class="shop_product--amount cart_product--amount">
                            <h6>Količina</h6>
                            <div class="product_amount--row amount--row">
                                <a href="Cart/change.php?action=reduce&product_id=<?=$this->cart_products[$i]['id']?>">-</a>
                                <div id="counter"><?=$this->cart_products[$i]['quantity']?></div>
                                <a href="Cart/change.php?action=add&product_id=<?=$this->cart_products[$i]['id']?>">+</a>
                            </div>
                        </div> 
                    </div>
                </div>

        <?php    } ?>
          <div class="cart_sum">
              <span>Očekivano vreme dostave: 3 do 5 radnih dana</span>
              <div>
                  <span>Ukupno</span>
                  <span><?=number_format($this->total(),0,"",".")?></span>
                  <span>RSD</span>
              </div>
          </div> 
          <div  id="order">
            <a data-modal-target="#modal" id="order" href="#">Naruči</a>
          </div>
           <!-- <a href="../shop.php#shop">Back to Shop</a>
           <a href="snimi_korpu.php">Proceed to Checkout</a> -->
           </div>
      <?php  }else{ ?>
            <div class="empty_cart--wrapper">
                <div class="empty_cart--img">
                    <img src="Cart/cart.png" alt="cart">
                    <div class="cart_counter"><?= count($this->cart_products)?></div>
                </div>
                <div class="empty_cart--content">
                    <span>Korpa je prazna</span>
                    <span>Istraži našu online prodavnicu</span>
                    <a href="shop.php">Kreni u kupovinu</a>
                </div>
           </div>
           

   <?php }

}
}


$k = new Cart();