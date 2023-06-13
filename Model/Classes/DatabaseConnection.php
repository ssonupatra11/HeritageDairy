<?php

/**
 * Singleton class.
 */
class DatabaseConnection{

    /**
    * private and static instance variable to store DatabaseConnection class instance.
    * @access private
    *
    * @var mixed db_conn_instance
    *
    * @staticvar PDO|null $db_conn_instance
    */
    private static $db_conn_instance=null;

    /**
     * constructor should always be private to prevent direct construction calls using `new` keyword.
     * @return void
     */

    private function __construct(){}
    

    /**
     * This static function used to set db connection null.
     * 
     * @access public 
     * 
     * @return void
     * 
     * @static
     */
    public static function setConnection() : void{

        //setting connection to null
        self::$db_conn_instance=null;
    }

    /**
     * This static function used to return db connection instance.
     * 
     * @access public
     * 
     * @return PDO
     * 
     * @static
     */
    public static function getConnection() : PDO{
        // Creating connection
        if(!isset(self::$db_conn_instance)){
            try {
            self::$db_conn_instance = new PDO("mysql:host=localhost;dbname=ecommerce", "root", "root");
            
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