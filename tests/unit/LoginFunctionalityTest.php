<?php 
use PHPUnit\Framework\TestCase;
include("./Model/LoginFunctionality.php");
final class LoginFunctionalityTest extends TestCase{
    public function testCheckLogin(): void{
        $login=new LoginFunctionality();
//        $this->assertTrue($login->checkLogin("ram@gmail.com","Ram@1234"));

    }

}
?>