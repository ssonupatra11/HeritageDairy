<?php 
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;
include("./Model/Classes/DatabaseConnection.php");
include("./Model/Classes/LoginFunctionality.php");


final class LoginFunctionalityTest extends TestCase{
    #[Test]
    public function checkLogin(): void{
        $login=new LoginFunctionality();
        $this->assertObjectHasProperty('conn',$login);
    }

}
?>