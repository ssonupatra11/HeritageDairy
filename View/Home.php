<?php
session_start();
$_SESSION["email"]=null;
$_SESSION["name"]=null;
$_SESSION["type"]=null;
class Home{

    /**
     * @var int/null
     */
    private ?int $choice=null;

    public function home(){
        if(!isset($_SESSION["email"]) && !isset($_SESSION["type"])){
            echo <<<EOT
          -------------------------
            WELCOME TO HERITAGE DAIRY
            -------------------------
            Hello User!
            1.User Login
            2.User Register
            3.Show Products
            4.Admin Login
            5.exit
            \n
        EOT;

            $this->choice=(int)readline("Enter the option : ");
            switch($this->choice){
                case 1:{
                    $GLOBALS['login']->readLoginData();
                    break;
                }
                case 2:{
                    $GLOBALS['register']->addNewUser();
                    break;
                }
                case 3:{
                    $GLOBALS['product_functionality']->retriveProduct();
                    break;
                }
                case 4:{
                    $GLOBALS['admin']->readAdminLoginData();
                    break;
                }
                case 5:{
                    $GLOBALS['exit']->exit();
                }
                default:{
                    echo "Invalid Option! Enter the option again : ",PHP_EOL;
                    $GLOBALS['home']->home();
                }
            }
        }
        elseif(isset($_SESSION["email"]) && $_SESSION["type"]==="user"){
            echo <<<EOT
            -------------------------
            Hello "$_SESSION[name]"!
            -------------------------
            1.Show Products
            2.Update User
            3.Add product to cart
            4.Remove product from cart
            5.View Cart
            6.Buy product
            7.View Order History
            8.View Profile
            9.exit
            \n
        EOT;
            $this->choice=(int)readline("Enter the option : ");
            switch($this->choice){
                case 1:{
                    $GLOBALS['product_functionality']->retriveProduct();
                    break;
                }
                case 2:{
                    $GLOBALS['user']->showUserOption();
                    break;
                }
                case 3:{
                    $ema=$_SESSION["email"];
                    $pid=(string)readline("Enter product id : ");
                    $GLOBALS['cart']->addProductsToCart($ema,$pid);
                    break;
                }
                case 4:{
                    $email=$_SESSION["email"];
                    $pid=(string)readline("Enter product id to be removed : ");
                    $GLOBALS['cart']->removeProduct($email,$pid);
                    break;
                }
                case 5:{
                    $GLOBALS['cart']->viewUserCartHistory($_SESSION["email"]);
                    break;
                }
                case 6:{
                    $pid=(string)readline("Enter prod_id to buy from cart : ");
                    $GLOBALS['order']->buyProduct($_SESSION["email"],$pid);
                    break;
                }
                case 7:{
                    $GLOBALS['order']->viewUserOrderHistory($_SESSION["email"]);
                    break;
                }
                case 8:{
                    $GLOBALS['user_functionality']->viewProfile($_SESSION["email"]);
                    break;
                }
                case 9:{
                    $GLOBALS['exit']->exit();
                }
                default:{
                    echo "Invalid Option! Enter the option again :",PHP_EOL;
                    $GLOBALS['home']->home();
                }
            }
        }
        elseif(isset($_SESSION["email"]) && $_SESSION["type"]==="admin"){
            echo <<<EOT
            -------------------------
            Hello "$_SESSION[name]"!
            -------------------------
            1.Show Products Options
            2.exit
            \n
        EOT;
        $this->choice=(int)readline("Enter the option : ");
            switch($this->choice){
                case 1:{
                    $GLOBALS['product']->productOption();
                    break;
                }
                case 2:{
                    $GLOBALS['exit']->exit();
                }
                default:{
                    echo "Invalid Option! Enter the option again : ",PHP_EOL;
                    $GLOBALS['home']->home();
                }
            }
        }

    }
      

}
?>