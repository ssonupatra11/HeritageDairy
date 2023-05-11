<?php 
class Products{

    /**
     * @var int/null
     */
    private ?int $choice=null;

    public function productOption(){
        echo <<<EOT
            -------------------------
            Hello "$_SESSION[name]"!
            -------------------------
            1.Show Products
            2.Add new Product
            3.Update Product Name
            4.Update Product Price
            5.Delete Product
            6.View All order history
            7.exit
            \n
        EOT;
            $this->choice=(int)readline("Enter the option : ");
            switch($this->choice){
                case 1:{
                    $GLOBALS['product_functionality']->retriveProduct();
                    break;
                }
                case 2:{
                    $pname=(string)readline("Enter product name : ");
                    $pprice=(string)readline("Enter product price : ");
                    $prod_id=(string)readline("Enter product id : ");
                    $GLOBALS['product_functionality']->addNewProduct($prod_id,$pname,$pprice);
                    break;
                }
                case 3:{
                    $prod_id=(string)readline("Enter product id to be renamed : ");
                    $new_name=(string)readline("Enter new product name : ");
                    $GLOBALS['product_functionality']->updateProductName($prod_id,$new_name);
                    break;
                }
                case 4:{
                    $prod_id=(string)readline("Enter product id : ");
                    $new_pprice=(string)readline("Enter new product price : ");
                    $GLOBALS['product_functionality']->updateProductPrice($prod_id,$new_pprice);
                    break;
                }
                case 5:{
                    $p_id=(string)readline("Enter product id to be deleted : ");
                    $GLOBALS['product_functionality']->deleteProduct($p_id);
                    break;
                }
                case 6:{
                    $GLOBALS['admin_functionality']->viewAllOrderHistory();
                    break;
                }
                case 7:{
                    $GLOBALS['exit']->exit();
                }
                default:{
                    echo "Invalid Option! Enter the option again : ",PHP_EOL;
                    $GLOBALS['product']->productOption();
                }
            }
    }  
}
?>