<?php 
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;
use Sonu\HeritageDairy\Model\Classes\AddProduct;


final class AddProductTest extends TestCase{
    #[Test]
    public function addNewProduct(): void{
        $prodObj=new AddProduct();
        $this->assertObjectHasProperty('conn',$prodObj);
        $this->assertObjectHasProperty('sql',$prodObj);
    }

}
?>