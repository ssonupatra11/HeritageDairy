<?php

/**
 * This include AddUserInterface.php file in this file.
 */
 require("./Model/Interfaces/AddUserInterface.php");

 /**
 * This include LogMsgTrait.php file in this file.
 */
require("./Model/Classes/LogMsgTrait.php");

/**
* This include DeleteUserInterface.php file in this file.
*/
require("./Model/Interfaces/DeleteUserInterface.php");

/**
* This include UpdateUserEmailInterface.php file in this file.
*/
require("./Model/Interfaces/UpdateUserEmailInterface.php");

/**
* This include UpdateUserAgeInterface.php file in this file.
*/
require("./Model/Interfaces/UpdateUserAgeInterface.php");

/**
* This include UpdateUserGenderInterface.php file in this file.
*/
require("./Model/Interfaces/UpdateUserGenderInterface.php");

/**
* This include UpdateUserNameInterface.php file in this file.
*/
require("./Model/Interfaces/UpdateUserNameInterface.php");

/**
* This include UpdateUserPasswordInterface.php file in this file.
*/
require("./Model/Interfaces/UpdateUserPasswordInterface.php");

/**
* This include UpdateUserPhoneInterface.php file in this file.
*/
require("./Model/Interfaces/UpdateUserPhoneInterface.php");

/**
 * This include UpdateUserAge.php file in this file.
 */
require("./Model/Classes/UpdateUserAge.php");

/**
 * This include UpdateUserEmail.php file in this file.
 */
 require("./Model/Classes/UpdateUserEmail.php");

 /**
 * This include UpdateUserGender.php file in this file.
 */
require("./Model/Classes/UpdateUserGender.php");

/**
 * This include UpdateUserName.php file in this file.
 */
require("./Model/Classes/UpdateUserName.php");

/**
 * This include UpdateUserPassword.php file in this file.
 */
require("./Model/Classes/UpdateUserPassword.php");

/**
 * This include UpdateUserPhone.php file in this file.
 */
require("./Model/Classes/UpdateUserPhone.php");

/**
 * This include AddUser.php file in this file.
 */
require("./Model/Classes/AddUser.php");

/**
 * This include DeleteUser.php file in this file.
 */
require("./Model/Classes/DeleteUser.php");

/**
 * This include ViewData.php file in this file.
 */
require("./Model/Interfaces/ViewData.php");

/**
 * This include BuyProd.php file in this file.
 */
require("./Model/Interfaces/BuyProd.php");

/**
 * This include CartAddProd.php file in this file.
 */
require("./Model/Interfaces/CartAddProd.php");

/**
 * This include CartRemoveProd.php file in this file.
 */
require("./Model/Interfaces/CartRemoveProd.php");

/**
 * This include AddProd.php file in this file.
 */
require("./Model/AbstractClass/AddProd.php");

/**
 * This include UpdateProdName.php file in this file.
 */
require("./Model/Interfaces/UpdateProdName.php");

/**
 * This include UpdateProdPrice.php file in this file.
 */
require("./Model/Interfaces/UpdateProdPrice.php");

/**
 * This include DeleteProd.php file in this file.
 */
require("./Model/Interfaces/DeleteProd.php");

/**
 * This include UpdateProductName.php file in this file.
 */
require("./Model/Classes/UpdateProductName.php");

/**
 * This include UpdateProductPrice.php file in this file.
 */
require("./Model/Classes/UpdateProductPrice.php");

/**
 * This include AddProduct.php file in this file.
 */
require("./Model/Classes/AddProduct.php");

/**
 * This include DeleteProduct.php file in this file.
 */
require("./Model/Classes/DeleteProduct.php");

/**
 * This include CartAddProduct.php file in this file.
 */
require("./Model/Classes/CartAddProduct.php");

/**
 * This include CartRemoveProduct.php file in this file.
 */
require("./Model/Classes/CartRemoveProduct.php");

/**
 * This include ViewUserCartHistory.php file in this file.
 */
require("./Model/Classes/ViewUserCartHistory.php");

/**
 * This include ViewUserProfile.php file in this file.
 */
require("./Model/Classes/ViewUserProfile.php");

/**
 * This include ViewAllProducts.php file in this file.
 */
require("./Model/Classes/ViewAllProducts.php");

/**
 * This include ViewUserOrderHistory.php file in this file.
 */
require("./Model/Classes/ViewUserOrderHistory.php");

/**
 * This include Home.php file in this file.
 */
require("./View/Home.php");

/**
 * This include config.php file in this file.
 */
require("./config/config.php");

/**
 * This include Products.php file in this file.
 */
 require("./View/Products.php");

 /**
 * This include AdminLogin.php file in this file.
 */
require("./Controller/AdminLogin.php");

/**
 * This include Login.php file in this file.
 */
require("./Controller/Login.php");

/**
 * This include User.php file in this file.
 */
require("./View/User.php");

/**
 * This include DatabaseConnection.php file in this file.
 */
require("./Model/Classes/DatabaseConnection.php");

/**
 * This include ViewAllOrderList.php file in this file.
 */
require("./Model/Classes/ViewAllOrderList.php");

/**
 * This include AdminLoginFunctionality.php file in this file.
 */
require("./Model/Classes/AdminLoginFunctionality.php");


/**
 * This include CheckEmail.php file in this file.
 */
require("./Controller/CheckEmail.php");

/**
 * This include CheckPassword.php file in this file.
 */
require("./Controller/CheckPassword.php");

/**
 * This include ExitPage.php file in this file.
 */
require("./Controller/ExitPage.php");

/**
 * This include LoginFunctionality.php file in this file.
 */
require("./Model/Classes/LoginFunctionality.php");

/**
 * This include BuyProduct.php file in this file.
 */
require("./Model/Classes/BuyProduct.php");

/**
 * This include Register.php file in this file.
 */
require("./Controller/Register.php");

/**
 * This include MysqlQueryBuilder.php file in this file.
 */
require("./Model/Classes/MysqlQueryBuilder.php");




/**
 * Creating instance using arbitary expression.
 * @global Home $GLOBALS['home']
 */
$GLOBALS['home']=new ('Home');

/**
 * @global ExitPage $GLOBALS['exit']
 */
$GLOBALS['exit']=new ExitPage('Thank you for comming!');

/**
 * creating an instance using variable.
 * @global Products $GLOBALS['product']
 */
$classname='Products';
$GLOBALS['product']=new $classname();

/**
 * creating instance in another way.
 * @global Register $GLOBALS['register']
 */
$GLOBALS['register']=new Register;

/**
 * @global Login $GLOBALS['login']
 */
$GLOBALS['login']=$Login;

/**
 * @global AddProduct $GLOBALS['add_product']
 */
$GLOBALS['add_product']=new AddProduct();

/**
 * @global DeleteProduct $GLOBALS['delete_product']
 */
$GLOBALS['delete_product']=new DeleteProduct();

/**
 * @global UpdateProductName $GLOBALS['update_product_name']
 */
$GLOBALS['update_product_name']=new UpdateProductName();

/**
 * @global UpdateProductPrice $GLOBALS['update_product_price']
 */
$GLOBALS['update_product_price']=new UpdateProductPrice();

/**
 * @global AdminLogin $GLOBALS['admin']
 */
$GLOBALS['admin']=new AdminLogin();

/**
 * @global User $GLOBALS['user']
 */
$GLOBALS['user']=new User();

/**
 * @global CartAddProduct $GLOBALS['cart_add_product']
 */
$GLOBALS['cart_add_product']=new CartAddProduct();

/**
 * @global CartRemoveProduct $GLOBALS['cart_remove_product']
 */
$GLOBALS['cart_remove_product']=new CartRemoveProduct();

/**
 * @global ViewUserCartHistory $GLOBALS['cart']
 */
$GLOBALS['view_cart_history']=new viewUserCartHistory();

/**
 * @global ViewUserProfile $GLOBALS['cart']
 */
$GLOBALS['view_user_profile']=new ViewUserProfile();

/**
 * @global ViewAllProducts $GLOBALS['cart']
 */
$GLOBALS['view_all_products']=new ViewAllProducts();

/**
 * @global ViewUserOrderHistory $GLOBALS['view_user_order_history']
 */
 $GLOBALS['view_user_order_history']=new ViewUserOrderHistory();

 /**
 * @global BuyProduct $GLOBALS['buy_product']
 */
$GLOBALS['buy_product']=new BuyProduct();

/**
 * @global ViewAllOrderList $GLOBALS['view_all_order_list']
 */
$GLOBALS['view_all_order_list']=new ViewAllOrderList();

/**
 * @global AddUser $GLOBALS['add_user']
 */
$GLOBALS['add_user']=new AddUser();

/**
 * @global UpdateUserName $GLOBALS['update_user_name']
 */
$GLOBALS['update_user_name']=new UpdateUserName();

/**
 * @global UpdateUserEmail $GLOBALS['update_user_email']
 */
$GLOBALS['update_user_email']=new UpdateUserEmail();

/**
 * @global UpdateUserPhone $GLOBALS['update_user_phone']
 */
$GLOBALS['update_user_phone']=new UpdateUserPhone();

/**
 * @global UpdateUserAge $GLOBALS['update_user_age']
 */
$GLOBALS['update_user_age']=new UpdateUserAge();

/**
 * @global UpdateUserGender $GLOBALS['update_user_gender']
 */
$GLOBALS['update_user_gender']=new UpdateUserGender();

/**
 * @global UpdateUserPassword $GLOBALS['update_user_password']
 */
$GLOBALS['update_user_password']=new UpdateUserPassword();

/**
 * @global DeleteUser $GLOBALS['delete_user']
 */
$GLOBALS['delete_user']=new DeleteUser();






/**
 * This is an Anonymous function index() which calls home() using global variable.
 * 
 * @return void
 */
$index=function():void{
    $GLOBALS['home']->home();
};

$index();