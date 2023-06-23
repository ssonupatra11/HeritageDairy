<?php 
use PHPUnit\Framework\TestCase;
use Sonu\HeritageDairy\Model\Classes\DeleteProduct;

final class DeleteProductTest extends TestCase{
    public function testDeleteProduct(): void{
        $del=new DeleteProduct();
        $this->assertObjectHasProperty('conn',$del);
    }

}
?>