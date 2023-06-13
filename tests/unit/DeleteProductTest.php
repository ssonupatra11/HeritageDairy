<?php 
use PHPUnit\Framework\TestCase;
include("./Model/Classes/DatabaseConnection.php");
include("./Model/Interfaces/DeleteProd.php");
include("./Model/Classes/DeleteProduct.php");
final class DeleteProductTest extends TestCase{
    public function testDeleteProduct(): void{
        $del=new DeleteProduct();
        $this->assertObjectHasProperty('conn',$del);
    }

}
?>