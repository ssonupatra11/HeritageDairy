<?php 
$order_data_path="C:\Users\Dell\Desktop\HeritageDairy\modules\order.txt";
class AdminFunctionality{
    function viewAllOrderHistory(){
        $cart_file=fopen($GLOBALS["order_data_path"],"r");
        if(filesize($GLOBALS["order_data_path"])>0){
            $content=explode(",",fread($cart_file,filesize($GLOBALS["order_data_path"])));
        }
        foreach($content as $val){
            echo $val."\n";
        }
        fclose($cart_file);
    }
    function allProdSoldTillDate(){
        $order_file=fopen($GLOBALS["order_data_path"],"r");
        if(filesize($GLOBALS["order_data_path"])>0){
            $content=explode(",",fread($order_file,filesize($GLOBALS["order_data_path"])));
        }
        foreach($content as $val){
            $n=explode(" ",$val);
            echo $n[3]." ".$n[4]." ".$n[5]."\n";
        }
        fclose($order_file);
    }
}
$val=new AdminFunctionality();
//$val->viewAllOrderHistory();

?>