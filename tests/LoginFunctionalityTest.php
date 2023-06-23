<?php 
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;
use Sonu\HeritageDairy\Model\Classes\LoginFunctionality;


final class LoginFunctionalityTest extends TestCase{
    #[Test]
    public function checkLogin(): void{
        $login=new LoginFunctionality();
        $this->assertObjectHasProperty('conn',$login);
    }

}
?>