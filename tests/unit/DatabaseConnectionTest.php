<?php 
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;
include("./config/config.php");
include("./Model/Classes/DatabaseConnection.php");

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