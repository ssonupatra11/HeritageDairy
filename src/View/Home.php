<?php

namespace Sonu\HeritageDairy\View;

session_start();
$_SESSION["email"]=null;
$_SESSION["name"]=null;
$_SESSION["type"]=null;
/**
 * This class has functionality to display home page.
 */
class Home{

    /**
     * @access private
     * @var int|null
     */
    private ?int $choice=null;

    /**
     * This function will display choices based on condition.
     * @access public
     * @return void
     */
    public function home():void{
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
                    /**
                     * Accessing readLoginData() method using nullsafe operator '?->'.
                     */
                    $GLOBALS['login']->readLoginData();
                    break;
                }
                case 2:{
                    /**
                     * Accessing addNewUser() method using nullsafe operator '?->'.
                     */
                    $GLOBALS['register']?->addNewUser();
                    break;
                }
                case 3:{
                    /**
                     * Accessing retriveProduct() method using nullsafe operator '?->'.
                     */
                    $GLOBALS['view_all_products']?->view();
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
                    $GLOBALS['view_all_products']->view();
                    break;
                }
                case 2:{
                    $GLOBALS['user']->showUserOption();
                    break;
                }
                case 3:{
                    /**
                     * @var mixed
                     */
                    $ema=$_SESSION["email"];
                    /**
                     * @var string
                     */
                    $pid=(string)readline("Enter product id : ");
                    $GLOBALS['cart_add_product']->addProductsToCart($ema,$pid);
                    break;
                }
                case 4:{
                    /**
                     * @var mixed
                     */
                    $email=$_SESSION["email"];
                    /**
                     * @var string
                     */
                    $pid=(string)readline("Enter product id to be removed : ");
                    $GLOBALS['cart_remove_product']->removeProduct($email,$pid);
                    break;
                }
                case 5:{
                    $GLOBALS['view_cart_history']->view();
                    break;
                }
                case 6:{
                    /**
                     * @var string
                     */
                    $pid=(string)readline("Enter prod_id to buy from cart : ");
                    $GLOBALS['buy_product']->buyProduct($_SESSION["email"],$pid);
                    break;
                }
                case 7:{
                    $GLOBALS['view_user_order_history']->view();
                    break;
                }
                case 8:{
                    $GLOBALS['view_user_profile']->view();
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