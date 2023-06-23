<?php 

namespace Sonu\HeritageDairy\Controller;

use Sonu\HeritageDairy\Model\Classes\DatabaseConnection;

session_unset();
session_destroy();

/**
 * This class has a functionality to exit.
 */
readonly class ExitPage{

    /**
     * This is a readonly property,as the class is declared as readonly.

     * @access private

     * @var string
     */
    private string $message;

    /**
     * This function close the db connection and exit from project.
     * 
     * @access public
     * 
     * @return void
     */

    public function __construct(string $message)
    {
        $this->message=$message;
    }
    public function exit() : void{
        DatabaseConnection::setConnection();
        echo $this->message;
        exit();
    }
}