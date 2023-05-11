<?php 
use PHPUnit\Framework\TestCase;
include("./config/config.php");
include("./Model/DatabaseConnection.php");
final class DatabaseConnectionTest extends TestCase{
    public function testGetConnection(): void{
        $conn=new DatabaseConnection();
        $this->assertTrue(!empty($conn));
    }
}
?>