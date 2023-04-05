<?php 
include_once("../modules/ProductFunctionality.php");
include_once("../modules/AdminFunctionality.php");
include_once("../modules/ExitPage.php");
class Products{
    function productOption(){
        echo "\n-------------------------\n";
            echo "Hello ".$_SESSION["name"]."!\n\n";
            echo "-------------------------\n\n";
            echo "1.Show Products\n";
            echo "2.Add new Product\n";
            echo "3.Update Product Name\n";
            echo "4.Update Product Price\n";
            echo "5.Delete Product\n";
            echo "6.allProdSoldTillDate\n";
            echo "6.ViewAllOrderHistory\n";
            echo "7.exit\n\n";
            $choice=readline("Enter the option : ");
            switch($choice){
                case 1:{
                    $prod=new ProductFunctionality();
                    $prod->retriveProduct();
                    break;
                }
                case 2:{
                    $prod=new ProductFunctionality();
                    $pname=readline("Enter product name : ");
                    $pprice=readline("Enter product price : ");
                    $prod->addNewProduct($pname,$pprice);
                    break;
                }
                case 3:{
                    $prod=new ProductFunctionality();
                    $old_name=readline("Enter product name to be renamed : ");
                    $new_name=readline("Enter new product name : ");
                    $prod->updateProductName($old_name,$new_name);
                    break;
                }
                case 4:{
                    $prod=new ProductFunctionality();
                    $pname=readline("Enter product name : ");
                    $new_pprice=readline("Enrer new product price : ");
                    $prod->updateProductPrice($pname,$new_pprice);
                    break;
                }
                case 5:{
                    $prod=new ProductFunctionality();
                    $pname=readline("Enter product name to be deleted : ");
                    $prod->deleteProduct($pname);
                    break;
                }
                case 6:{
                    $ord=new AdminFunctionality();
                    $ord->allProdSoldTillDate();
                    break;
                }
                case 6:{
                    $ord=new AdminFunctionality();
                    $ord->viewAllOrderHistory();
                    break;
                }
                case 7:{
                    $exit=new ExitPage();
                    $exit->exit();
                }
            }
    }  
}
?>