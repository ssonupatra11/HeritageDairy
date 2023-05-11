<?php

require("./View/Home.php");
require("./config/config.php");
require("./View/Products.php");
require("./Controller/AdminLogin.php");
require("./Controller/Login.php");
require("./View/User.php");
require("./Model/DatabaseConnection.php");
require("./Model/AdminFunctionality.php");
require("./Model/AdminLoginFunctionality.php");
require("./Model/CartFunctionality.php");
require("./Controller/CheckEmail.php");
require("./Controller/CheckPassword.php");
require("./Controller/ExitPage.php");
require("./Model/LoginFunctionality.php");
require("./Model/Order.php");
require("./Model/ProductFunctionality.php");
require("./Controller/Register.php");
require("./Model/UserFunctionality.php");


//global instance variables
$home=new Home();
$exit=new ExitPage();
$product=new Products();
$register=new Register();
$login=new Login();
$product_functionality=new ProductFunctionality();
$admin=new AdminLogin();
$user=new User();
$cart=new CartFunctionality();
$order=new Order();
$admin_functionality=new AdminFunctionality();
$user_functionality=new UserFunctionality();

//Anonymous function index
$index=function(){
    $GLOBALS['home']->home();
};

$index();
?>