<?php

/**
 * Singleton class
 */
class DatabaseConnection{

    /**
    * private and static instance variable to store DatabaseConnection class instance 
    */
    private static $db_conn_instance=null;

    /**
     * constructor should always be private to prevent direct construction calls using `new` keyword 
     */

    private function __construct(){}
    

    //static function to set db connection null
    public static function setConnection() : void{

        //setting connection to null
        self::$db_conn_instance=null;
    }

    //Static function to return db connection instance
    public static function getConnection() : PDO{
        // Creating connection
        if(!isset(self::$db_conn_instance)){
            try {
            self::$db_conn_instance = new PDO("mysql:host=$GLOBALS[servername];dbname=ecommerce", $GLOBALS["username"], $GLOBALS["password"]);
            
            // set the PDO error mode to exception
            self::$db_conn_instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Database connected successfully",PHP_EOL;
            }
            catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage(),PHP_EOL;
              }
        }
        
        return self::$db_conn_instance;
    }
}
?>