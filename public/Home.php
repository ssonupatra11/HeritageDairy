<?php
session_start();
$_SESSION["email"]=null;
$_SESSION["name"]=null;
$_SESSION["type"]=null;
include_once("Login.php");
include_once("AdminLogin.php");
include_once("User.php");
include_once("Products.php");
include_once("../modules/ExitPage.php");
include_once("../modules/CartFunctionality.php");
include_once("../modules/Order.php");
include_once("../modules/UserFunctionality.php");
include_once("../modules/AdminFunctionality.php");
include_once("../modules/ProductFunctionality.php");
include_once("../modules/Register.php");
class Home{
     function home(){
        if($_SESSION["email"]==null && $_SESSION["type"]==null){
            echo "\n-------------------------\n";
            echo "WELCOME TO HERITAGE DAIRY\n";
            echo "-------------------------\n\n";
            echo "Hello User!\n\n";
            echo "1.User Login\n";
            echo "2.User Register\n";
            echo "3.Show Products\n";
            echo "4.Admin Login\n";
            echo "5.exit\n\n";
            $choice=readline("Enter the option : ");
            switch($choice){
                case 1:{
                    $login=new Login();
                    $login->readLoginData();
                    break;
                }
                case 2:{
                    $register=new Register();
                    $register->addNewUser();
                    break;
                }
                case 3:{
                    $produ=new ProductFunctionality();
                    $produ->retriveProduct();
                    break;
                }
                case 4:{
                    $admin=new AdminLogin();
                    $admin->readAdminLoginData();
                    break;
                }
                case 5:{
                    $exit=new ExitPage();
                    $exit->exit();
                }
            }
        }
        elseif($_SESSION["email"]!=null && $_SESSION["type"]=="user"){
            echo "\n-------------------------\n";
            echo "Hello ".$_SESSION["name"]."!\n";
            echo "-------------------------\n";
            echo "1.Show Products\n";
            echo "2.Update User\n";
            echo "3.Add product to cart\n";
            echo "4.Remove product from cart\n";
            echo "5.View Cart\n";
            echo "6.View Order History\n";
            echo "7.View Profile\n";
            echo "8.exit\n\n";
            $choice=readline("Enter the option : ");
            switch($choice){
                case 1:{
                    $prod=new ProductFunctionality();
                    $prod->retriveProduct();
                    break;
                }
                case 2:{
                    $user=new User();
                    $user->showUserOption();
                    break;
                }
                case 3:{
                    $cart=new CartFunctionality();
                    $nam=$_SESSION["name"];
                    $pho=readline("Enter phone number : ");
                    $ema=$_SESSION["email"];
                    $pnam=readline("Enter product name : ");
                    $ppri=readline("Enter prod price : ");
                    $cart->addProductsToCart($nam,$ema,$pho,$pnam,$ppri);
                    break;
                }
                case 4:{
                    $cart1=new CartFunctionality();
                    $ema1=$_SESSION["email"];
                    $pnam1=readline("Enter product name : ");
                    $cart1->removeProduct($ema1,$pnam1);
                    break;
                }
                case 5:{
                    $cart_fun=new CartFunctionality();
                    $cart_fun->viewUserCartHistory($_SESSION["email"]);
                    break;
                }
                case 6:{
                    $ord=new Order();
                    $ord->viewUserOrderHistory($_SESSION["email"]);
                    break;
                }
                case 7:{
                    $ufun=new UserFunctionality();
                    $ufun->viewProfile($_SESSION["email"]);
                    break;
                }
                case 8:{
                    $exit=new ExitPage();
                    $exit->exit();
                }
            }
        }
        elseif($_SESSION["email"]!=null && $_SESSION["type"]=="admin"){
            echo "\n-------------------------\n";
            echo "Hello ".$_SESSION["name"]."!\n";
            echo "-------------------------\n";
            echo "1.Show Products Options\n";
            echo "2.exit\n\n";
            $choice=readline("Enter the option : ");
            switch($choice){
                case 1:{
                    $prohome=new Products();
                    $prohome->productOption();
                    break;
                }
                case 2:{
                    $exit=new ExitPage();
                    $exit->exit();
                }
            }
        }

    }
      

}
$val=new Home();
$val->home();
?>