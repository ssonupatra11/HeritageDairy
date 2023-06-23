<?php 
use PHPUnit\Framework\TestCase;
use Sonu\HeritageDairy\Controller\CheckEmail;

final class CheckEmailTest extends TestCase{
    public function testCheckEmailFormat(): void{
        $check_email_obj=new CheckEmail();
        $this->assertEquals(0,$check_email_obj->checkEmailFormat("ram@gmail.com"));
        $this->assertNotEquals(1,$check_email_obj->checkEmailFormat("sonu@gmail.com"));
        $this->assertEquals(1,$check_email_obj->checkEmailFormat("eam.com"));
    }
}
?>