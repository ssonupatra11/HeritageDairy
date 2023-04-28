<?php 
use PHPUnit\Framework\TestCase;
include_once("./modules/CheckPassword.php");
final class CheckPasswordTest extends TestCase{
    public function testPasswordFormat(): void{
        $check_pass_obj=new CheckPassword();
        $this->assertEquals(1,$check_pass_obj->checkPasswordFormat("daaedad"));
        $this->assertEquals(0,$check_pass_obj->checkPasswordFormat("Ramu@1234"));
    }

    public function testMatchPassword(): void{
        $check_pass_obj=new CheckPassword();
        $this->assertEquals(0,$check_pass_obj->matchPassword("ramu@123","Samu@12"));
        $this->assertNotEquals(0,$check_pass_obj->matchPassword("Roshni@123","Roshni@123"));
    }
}
?>