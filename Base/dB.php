<?php  
//  session_start();

class dB{
    public $conn;

    function __construct($dB){
        $this -> conn = new mysqli('localhost','root','',$dB);
        $this -> conn->set_charset("utf8");

        if($this->conn ->connect_error)
            die("Error: ". $this->conn->connect_error);
        // else
        //     echo "Connected";
    }

    function make_select($inquiry){
        $data = $this -> conn -> query($inquiry);

        if($data == false)
            return['successful' => false , 'error'=>$this->conn->error];
        else{
            $row = $data -> fetch_all(MYSQLI_ASSOC);
            return['successful' => true , 'row' => $row];
        }
           
    }

    function make_inquiry($inquiry){
        $result = $this -> conn -> query($inquiry);
            if($result == false)
                die('Inquiry error:' .$this->conn->error);
            else    
                echo "Inquiry successful";
    }
    // SELECT * FROM `product_desc` join products ON products.id=product_desc.product_id; !!
    function get_products(){
        $result = $this-> make_select("SELECT * FROM products");
            if($result['successful'] == true)
                return $result['row'];
            else
                die("Inquiry error". $result['error']);
    }

    function get_product($id){
        $result = $this-> make_select("SELECT * FROM products WHERE id=$id;");
            if($result['successful'] == true)
                return $result['row'][0];
            else
                die("Inquiry error". $result['error']);
    }
    function save_cart($address,$name,$lName,$phone,$city,$postal,$total){
        $this-> make_inquiry("INSERT INTO `cart`(`address`, `name`, `last_name`, `phone`, `city`, `postal`, `total`) VALUES ('$address','$name','$lName','$phone','$city','$postal',$total)");

        return $this->conn->insert_id;

    }
    function save_cart_products($cart_id,$product_id,$price,$quantity){
        $this-> make_inquiry("INSERT INTO `cart_products`(`cart_id`, `product_id`, `price`, `quantity`) VALUES ($cart_id,$product_id,$price,$quantity) ");

    }
    function get_amount($id){
        $result=$this->make_select("SELECT quantity FROM products where id=$id");
        if($result['successful'] == true)
        return $result['row'];
    else
        die("Inquiry error". $result['error']);

    }
    function update_amount($amount,$id){      
        $this-> make_inquiry("UPDATE products SET quantity=$amount WHERE id=$id");

    }
    //ADMIN login
    function uidExists($username,$email){
        $sql = "SELECT * FROM admin WHERE username=? OR email=?;";
        $stmt = mysqli_stmt_init($this->conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){
                header("Location: ../../admin.php?error=stmfailed");
                exit();
            } else{
                mysqli_stmt_bind_param($stmt,"ss",$username,$email);
                mysqli_stmt_execute($stmt);

                $result = mysqli_stmt_get_result($stmt);
                    if($row = mysqli_fetch_assoc($result)){
                        return $row;
                    } else{
                        $result = false;
                        return $result;
                    }
            }
    }
    function get_user($username,$password){
        $uidExists = $this->uidExists($username,$username);

        if($uidExists === false){
            header("Location: ../../admin.php?error=wronglogin");
            exit();
        } else {
            $pwdHashed = $uidExists['password'];
            $pwdCheck = password_verify($password,$pwdHashed);

                if($pwdCheck === false){
                    header("Location: ../../admin.php?error=wronglogin ");
                    exit();
                } elseif($pwdCheck === true){
                    $id=$uidExists['id'];
                    $_SESSION['user_id']=$id;
                    header("Location: ../../panel.php");
                    exit();
                }

        }

              

    }
    //CRUD functions

    function add_new_product($name,$short_desc,$main_desc,$footer_desc,$image,$price,$quantity){
        $this-> make_inquiry("INSERT INTO `products`( `name`, `short_desc`, `description`, `description_footer`,`image`, `price`, `quantity`) VALUES('$name','$short_desc','$main_desc','$footer_desc','$image','$price','$quantity')");

    }
    function delete_product($id){
        $this-> make_inquiry("DELETE FROM `products` WHERE id=$id;");
    }
    function get_one_product($id){
        $result=$this->make_select("SELECT * FROM products WHERE id=$id");
        if($result['successful'] == true)
        return $result['row'][0];
    else
        die("Inquiry error". $result['error']);

    }
    function update_product($id,$name,$short_desc,$main_desc,$footer_desc,$image,$price,$quantity){
        $this-> make_inquiry("UPDATE `products` SET `name`='$name',`short_desc`='$short_desc',`description`='$main_desc',`description_footer`='$footer_desc',`image`='$image',`price`=$price,`quantity`=$quantity WHERE id=$id");
    }

    // Reset password functions
    function delete_token($email){
       $sql = "DELETE FROM `password_reset` WHERE pwdResetEmail=?;";
       $stmt = mysqli_stmt_init($this->conn);

       if(!mysqli_stmt_prepare($stmt,$sql)){
           echo "There was an error";
           exit();
       }else {
           mysqli_stmt_bind_param($stmt,"s",$email);
           mysqli_stmt_execute($stmt);
       }
       mysqli_stmt_close($stmt);

    }
    function create_token($userEmail,$selector,$token,$expires){
        $sql = "INSERT INTO `password_reset`(`pwdResetEmail`, `pwdResetSelector`, `pwdResetToken`, `pwdResetExpires`) VALUES (?,?,?,?)";
        $stmt = mysqli_stmt_init($this->conn);

        if(!mysqli_stmt_prepare($stmt,$sql)){
            echo "There was an error";
            exit();
        } else {
            $hashedToken = password_hash($token,PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt,"ssss", $userEmail,$selector,$hashedToken,$expires);
            mysqli_stmt_execute($stmt);
        }
        mysqli_stmt_close($stmt);
    }
    function reset_pwd($currentDate,$selector,$validator,$password){
        $sql = "SELECT * from password_reset WHERE pwdResetSelector=? && pwdResetExpires >= $currentDate;";
        $stmt = mysqli_stmt_init($this->conn);

            if(!mysqli_stmt_prepare($stmt,$sql)){
                echo "There was an error";
                exit();
            } else{
                mysqli_stmt_bind_param($stmt,"s",$selector);
                mysqli_stmt_execute($stmt);

                $result = mysqli_stmt_get_result($stmt);

                if(!$row = mysqli_fetch_assoc($result)){
                    echo "You need to re-submit your reset request";
                    exit();
                } else{
                    $tokenBin = hex2bin($validator);
                    $tokenCheck = password_verify($tokenBin, $row['pwdResetToken']);

                        if($tokenCheck === false){
                          echo "There was an error";
                        
                        
                } elseif($tokenCheck === true){
                    $tokenEmail = $row['pwdResetEmail'];

                    $sql = "SELECT * FROM admin WHERE email=?;";
                    $stmt = mysqli_stmt_init($this->conn);
                    if(!mysqli_stmt_prepare($stmt,$sql)){
                        echo "There was an error";
                        exit();
                    } else{
                        mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                        mysqli_stmt_execute($stmt);

                        $result = mysqli_stmt_get_result($stmt);
                        if(!$row = mysqli_fetch_assoc($result)){
                            echo "There was an errorr";
                            exit();
                        } else {
                            $sql = "UPDATE admin SET password=? WHERE email=?;";
                            $stmt = mysqli_stmt_init($this->conn);

                            if(!mysqli_stmt_prepare($stmt,$sql)){
                                echo "There was an error";
                                exit();
                            } else{
                                $newPwdHash = password_hash($password, PASSWORD_DEFAULT);
                                mysqli_stmt_bind_param($stmt,"ss",$newPwdHash,$tokenEmail);
                                mysqli_stmt_execute($stmt);

                                $sql = "DELETE FROM password_reset WHERE pwdResetEmail=?";
                                $stmt = mysqli_stmt_init($this->conn);
                                if (!mysqli_stmt_prepare($stmt, $sql)) {
                                  echo "There was an error!";
                                  exit();
                                } else {
                                  mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                                  mysqli_stmt_execute($stmt);
                                  header("Location: ../../admin.php?newpwd=passwordupdated");
                                }
                            }                          

                        }
                    }

                }
            }
        }
    }
}

$b = new dB('mollers');
$products = $b -> get_products();
