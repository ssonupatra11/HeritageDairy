<?php 
use PHPUnit\Framework\TestCase;
include_once("./modules/LoginFunctionality.php");
final class LoginFunctionalityTest extends TestCase{
    public function testCheckLogin(): void{
        $login=new LoginFunctionality();
//        $this->assertTrue($login->checkLogin("ram@gmail.com","Ram@1234"));

    }

}
?>