<?php 
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;
use Sonu\HeritageDairy\Model\Classes\DatabaseConnection;

include("./config/config.php");


final class DatabaseConnectionTest extends TestCase{
    #[Test]
    public function testGetConnection(): void{
        $conn=DatabaseConnection::getConnection();
        $this->assertNotEmpty($conn);
        $this->assertNotNull($conn);
        $this->assertTrue(!is_null($conn));
        $this->assertInstanceOf('PDO',$conn);
    }
}
?>