<?php 

namespace Sonu\HeritageDairy\Model\Interfaces;
/**
 * This interface has a deleteUser() method declared.
 */
interface DeleteUserInterface{
    /**
     * This method will be implemented by the class which implements DeleteUserInterface.
     * 
     * @access public
     * 
     * @return void
     */
    public function deleteUser(String $email) : void;
}