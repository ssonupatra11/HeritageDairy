<?php 
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;
include("./Model/Classes/DatabaseConnection.php");
include("./Model/Interfaces/AddProd.php");
include("./Model/Classes/AddProduct.php");


final class AddProductTest extends TestCase{
    #[Test]
    public function addNewProduct(): void{
        $prodObj=new AddProduct();
        $this->assertObjectHasProperty('conn',$prodObj);
        $this->assertObjectHasProperty('sql',$prodObj);
    }

}
?>