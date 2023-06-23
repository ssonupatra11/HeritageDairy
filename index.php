<?php

require './vendor/autoload.php';
include("./src/Controller/Login.php");

use Sonu\HeritageDairy\Controller\ExitPage as ExitPage;
use Sonu\HeritageDairy\View\Home as Home;
use Sonu\HeritageDairy\View\Products as Products;
use Sonu\HeritageDairy\View\User as User;
use Sonu\HeritageDairy\Controller\Register as Register;
use Sonu\HeritageDairy\Model\Classes\AddProduct as AddProduct;
use Sonu\HeritageDairy\Model\Classes\DeleteProduct as DeleteProduct;
use Sonu\HeritageDairy\Model\Classes\UpdateProductName as UpdateProductName;
use Sonu\HeritageDairy\Model\Classes\UpdateProductPrice as UpdateProductPrice;
use Sonu\HeritageDairy\Model\Classes\UpdateUserAge as UpdateUserAge;
use Sonu\HeritageDairy\Model\Classes\UpdateUserEmail as UpdateUserEmail;
use Sonu\HeritageDairy\Model\Classes\UpdateUserGender as UpdateUserGender;
use Sonu\HeritageDairy\Model\Classes\UpdateUserName as UpdateUserName;
use Sonu\HeritageDairy\Model\Classes\UpdateUserPassword as UpdateUserPassword;
use Sonu\HeritageDairy\Model\Classes\UpdateUserPhone as UpdateUserPhone;
use Sonu\HeritageDairy\Model\Classes\CartAddProduct as CartAddProduct;
use Sonu\HeritageDairy\Controller\AdminLogin as AdminLogin;
use Sonu\HeritageDairy\Model\Classes\CartRemoveProduct as CartRemoveProduct;
use Sonu\HeritageDairy\Model\Classes\ViewAllOrderList as ViewAllOrderList;
use Sonu\HeritageDairy\Model\Classes\ViewAllProducts as ViewAllProducts;
use Sonu\HeritageDairy\Model\Classes\ViewUserCartHistory as ViewUserCartHistory;
use Sonu\HeritageDairy\Model\Classes\ViewUserOrderHistory as ViewUserOrderHistory;
use Sonu\HeritageDairy\Model\Classes\ViewUserProfile as ViewUserProfile;
use Sonu\HeritageDairy\Model\Classes\DeleteUser as DeleteUser;
use Sonu\HeritageDairy\Model\Classes\BuyProduct as BuyProduct;
use Sonu\HeritageDairy\Model\Classes\AddUser as AddUser;


/**
 * @global Home $GLOBALS['home']
 */
$GLOBALS['home']=new Home();

/**
 * @global ExitPage $GLOBALS['exit']
 */
$GLOBALS['exit']=new ExitPage('Thank you for comming!');

/**
 * @global Products $GLOBALS['product']
 */
$GLOBALS['product']=new Products();

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