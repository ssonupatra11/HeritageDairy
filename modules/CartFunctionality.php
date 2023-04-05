<?php 
$cart_data_path="C:\Users\Dell\Desktop\HeritageDairy\modules\cartdata.txt";
include_once("../public/Home.php");
class CartFunctionality{

    function addProductsToCart(String $uname,String $email,String $phone,String $pname,String $pprice){
        $cart_file=fopen($GLOBALS["cart_data_path"],"a");
        fwrite($cart_file,$uname);
        fwrite($cart_file," ");
        fwrite($cart_file,$email);
        fwrite($cart_file," ");
        fwrite($cart_file,$phone);
        fwrite($cart_file," ");
        fwrite($cart_file,$pname);
        fwrite($cart_file," ");
        fwrite($cart_file,date("Y/m/d"));
        fwrite($cart_file," ");
        fwrite($cart_file,$pprice);
        fwrite($cart_file,",");
        fclose($cart_file);
        (new Home())->home();
    }

    function removeProduct(String $email,String $pname){
        $cart_file=fopen($GLOBALS["cart_data_path"],"r");
        if(filesize($GLOBALS["cart_data_path"])>0){
            $content=explode(",",fread($cart_file,filesize($GLOBALS["cart_data_path"])));
        }
        fclose($cart_file);

       $cart_file=fopen($GLOBALS["cart_data_path"],"w");
        foreach($content as $val){
            
            if(strlen($val)>0){
                $n=explode(" ",$val);
                if($n[1]!=$email && $n[3]!=$pname){
                    fwrite($cart_file,$n[0]);
                    fwrite($cart_file," ");
                    fwrite($cart_file,$n[1]);
                    fwrite($cart_file," ");
                    fwrite($cart_file,$n[2]);
                    fwrite($cart_file," ");
                    fwrite($cart_file,$n[3]);
                    fwrite($cart_file," ");
                    fwrite($cart_file,$n[4]);
                    fwrite($cart_file," ");
                    fwrite($cart_file,$n[5]);
                    fwrite($cart_file,",");
                }
            }
        }
        fclose($cart_file);
        (new Home())->home();
    }
     
    function viewUserCartHistory(String $email){
        $cart_file=fopen($GLOBALS["cart_data_path"],"r");
        if(filesize($GLOBALS["cart_data_path"])>0){
            $content=explode(",",fread($cart_file,filesize($GLOBALS["cart_data_path"])));
        }
        foreach($content as $val){
            if(strlen($val)>0){
                $n=explode(" ",$val);
                if($n[1]===$email){
                    echo $val."\n";
                }
            }
        }
        fclose($cart_file);
       (new Home())->home();
    }

    
}

$val=new CartFunctionality();
//$val->addProductsToCart("Roshni","roshni@gmail.com","927273687","milk","20");
//$val->removeProduct("abc@gmail.com","curd");
//$val->viewUserOrderHistory("abc@gmail.com");
?>  