<?php 
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;
include("./Controller/Register.php");

final class RegisterTest extends TestCase{

    #[Test]
    public function addNewUser(): void{
        $registerObj=new Register();
        $this->assertObjectHasProperty('name',$registerObj);
        $this->assertObjectHasProperty('email',$registerObj);
        $this->assertObjectHasProperty('phone',$registerObj);
        $this->assertObjectHasProperty('age',$registerObj);
        $this->assertObjectHasProperty('gender',$registerObj);
        $this->assertObjectHasProperty('password',$registerObj);
        $this->assertObjectHasProperty('confirm_password',$registerObj);
        $this->assertInstanceOf('Register',$registerObj);
//        $this->assertNotInstanceOf('Register',$registerObj);
    }
}
?>