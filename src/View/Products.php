<?php 

namespace Sonu\HeritageDairy\View;

/**
 * This class has a functionality to display product choices for admin.
 */
class Products{

    /**
     * @access private

     * @var int|null
     */
    private ?int $choice=null;

    /**
     * This productOption() display's choices to select for products.
     * 
     * @access public

     * @return void
     */
    public function productOption():void{
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
                    $GLOBALS['view_all_products']->view();
                    break;
                }
                case 2:{
                    /**
                     * @var string
                     */
                    $pname=(string)readline("Enter product name : ");
                    /**
                     * @var string
                     */
                    $pprice=(string)readline("Enter product price : ");
                    /**
                     * @var string
                     */
                    $prod_id=(string)readline("Enter product id : ");
                    $GLOBALS['add_product']->addNewProduct($prod_id,$pname,$pprice);
                    break;
                }
                case 3:{
                    /**
                     * @var string
                     */
                    $prod_id=(string)readline("Enter product id to be renamed : ");
                    /**
                     * @var string
                     */
                    $new_name=(string)readline("Enter new product name : ");
                    $GLOBALS['update_product_name']->updateProductName($prod_id,$new_name);
                    break;
                }
                case 4:{
                    /**
                     * @var string
                     */
                    $prod_id=(string)readline("Enter product id : ");
                    /**
                     * @var string
                     */
                    $new_pprice=(string)readline("Enter new product price : ");
                    $GLOBALS['update_product_price']->updateProductPrice($prod_id,$new_pprice);
                    break;
                }
                case 5:{
                    /**
                     * @var string
                     */
                    $p_id=(string)readline("Enter product id to be deleted : ");
                    $GLOBALS['delete_product']->deleteProduct($p_id);
                    break;
                }
                case 6:{
                    $GLOBALS['view_all_order_list']->view();
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