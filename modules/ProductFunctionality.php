<?php 
$prod_data_path="C:\Users\Dell\Desktop\HeritageDairy\modules\productsdata.txt";
include_once("../public/User.php");
include_once("../public/Products.php");
include_once("../public/Home.php");
class ProductFunctionality{
    function addNewProduct(String $pname,String $pprice){
        $pro_file=fopen("C:\Users\Dell\Desktop\HeritageDairy\modules\productsdata.txt","a");
        fwrite($pro_file,$pname);
        fwrite($pro_file," ");
        fwrite($pro_file,$pprice);
        fwrite($pro_file,",");
        fclose($pro_file);
        (new Products())->productOption();
    }
    function updateProductName(String $old_pname,String $new_pname){
        $pro_file=fopen($GLOBALS["prod_data_path"],"r");
        if(filesize($GLOBALS["prod_data_path"])>0){
            $content=explode(",",fread($pro_file,filesize($GLOBALS["prod_data_path"])));
        }
        fclose($pro_file);

       $pro_file=fopen($GLOBALS["prod_data_path"],"w");
        foreach($content as $val){
            
            if(strlen($val)>0){
                $n=explode(" ",$val);
                if($n[0]===$old_pname){
                    fwrite($pro_file,$new_pname);
                    fwrite($pro_file," ");
                    fwrite($pro_file,$n[1]);
                    fwrite($pro_file,",");
                }
                else{
                    fwrite($pro_file,$n[0]);
                    fwrite($pro_file," ");
                    fwrite($pro_file,$n[1]);
                    fwrite($pro_file,",");
                }
            }
        }
        fclose($pro_file);
        (new Products())->productOption();
    }

    function updateProductPrice(String $old_pname,String $new_pprice){
        $pro_file=fopen($GLOBALS["prod_data_path"],"r");
        if(filesize($GLOBALS["prod_data_path"])>0){
            $content=explode(",",fread($pro_file,filesize($GLOBALS["prod_data_path"])));
        }
        fclose($pro_file);

       $pro_file=fopen($GLOBALS["prod_data_path"],"w");
        foreach($content as $val){
            
            if(strlen($val)>0){
                $n=explode(" ",$val);
                if($n[0]===$old_pname){
                    fwrite($pro_file,$n[0]);
                    fwrite($pro_file," ");
                    fwrite($pro_file,$new_pprice);
                    fwrite($pro_file,",");
                }
                else{
                    fwrite($pro_file,$n[0]);
                    fwrite($pro_file," ");
                    fwrite($pro_file,$n[1]);
                    fwrite($pro_file,",");
                }
            }
        }
        fclose($pro_file);
        (new Products())->productOption();
    }

    function retriveProduct(){
        $pro_file=fopen($GLOBALS["prod_data_path"],"r");
        if(filesize($GLOBALS["prod_data_path"])>0){
            $content=explode(",",fread($pro_file,filesize($GLOBALS["prod_data_path"])));
        }
        foreach($content as $val){
            echo $val."\n";
        }
        fclose($pro_file);
        if($_SESSION["type"]=="admin")
        {
            (new Products())->productOption();
        }
        else{
            (new Home())->home();
        }
    }

    function deleteProduct(String $name){
        $pro_file=fopen($GLOBALS["prod_data_path"],"r");
        if(filesize($GLOBALS["prod_data_path"])>0){
            $content=explode(",",fread($pro_file,filesize($GLOBALS["prod_data_path"])));
        }
        fclose($pro_file);

       $pro_file=fopen($GLOBALS["prod_data_path"],"w");
        foreach($content as $val){
            
            if(strlen($val)>0){
                $n=explode(" ",$val);
                if($n[0]!=$name){
                    fwrite($pro_file,$n[0]);
                    fwrite($pro_file," ");
                    fwrite($pro_file,$n[1]);
                    fwrite($pro_file,",");
                }
            }
        }
        fclose($pro_file);
        (new Products())->productOption();
    }
}

//$val=new ProductFunctionality();
//$val->addNewProduct("buttermilk","25");
//$val->updateProductName("curd","misty");
//$val->retriveProduct();
//$val->deleteProduct("misty");
//$val->updateProductPrice("buttermilk","40");
?>