<?php 
use PHPUnit\Framework\TestCase;
include_once("./config/config.php");
include_once("./modules/DatabaseConnection.php");
final class DatabaseConnectionTest extends TestCase{
    public function testGetConnection(): void{
        $conn=new DatabaseConnection();
        $this->assertTrue(!empty($conn));
    }
}
?>