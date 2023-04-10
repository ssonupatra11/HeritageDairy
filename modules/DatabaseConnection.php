<?php
include_once("../config/config.php"); 
class DatabaseConnection{
    //Function to create connection with database
    function getConnection(){
        // Creating connection
        $conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"],"ecommerce",3306);

        // Checking connection
        if ($conn->connect_error) {
            die("\nDatabase Connection failed: " . $conn->connect_error."\n");
        } 
        else{
            echo "\nDatabase Connected successfully\n";
            return $conn;
        }
    }
}
?>