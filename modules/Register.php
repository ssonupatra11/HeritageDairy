<?php
include_once("UserFunctionality.php");
include_once("CheckPassword.php");
include_once("CheckEmail.php");
class Register{
    private $name,$email,$phone,$age,$gender,$password,$confirm_password;
    
    public function addNewUser(){
        $check_password_obj=new CheckPassword();
        $check_email_obj=new CheckEmail();
        echo "---------------------------------\n";
        echo "      Register New User\n";
        echo "---------------------------------\n";

        $this->name=readline("Enter user name : ");
        
        $this->email=readline("Enter user email : ");
        while($check_email_obj->checkEmailFormat($this->email)){
            echo "Email format is incorrect.Type again!\n";
            $this->email=readline("Enter email again : ");
        }
        $this->phone=readline("Enter user phone : ");
        $this->age=readline("Enter user age : ");
        $this->gender=readline("Enter user gender : ");

        $this->password=readline("Enter user password : ");
        while($check_password_obj->checkPasswordFormat($this->password)){
            echo "Password format is incorrect.Type again!\n";
            $this->password=readline("Enter password : ");
        }
        
        $this->confirm_password=readline("Enter password again : ");
        while($check_password_obj->checkPasswordFormat($this->confirm_password)){
            echo "Confirm Password format is incorrect.Type again!\n";
            $this->confirm_password=readline("Enter password : ");
        }
        if($check_password_obj->matchPassword($this->password,$this->confirm_password)){
            $user_functionality_obj=new UserFunctionality();
            $user_functionality_obj->addNewUser($this->name,$this->email,$this->phone,$this->age,$this->gender,$this->password);
            (new Home())->home();
        }
        else{
            echo "\nPassword and confirm Password did not match. Try again!\n";
            (new Register())->addNewUser();
        }
    }

}

?>