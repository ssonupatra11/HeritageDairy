<?php

class Register{

    /**
     * @var string/null
     */
    private ?string $name=null;

    /**
     * @var string/null
     */
    private ?string $email=null;

    /**
     * @var string/null
     */
    private ?string $phone=null;

    /**
     * @var string/null
     */
    private ?string $age=null;

    /**
     * @var string/null
     */
    private ?string $gender=null;

    /**
     * @var string/null
     */
    private ?string $password=null;

    /**
     * @var string/null
     */
    private ?string $confirm_password=null;

    
    public function addNewUser() : void{
        $check_password_obj=new CheckPassword();
        $check_email_obj=new CheckEmail();
        echo <<<EOT
        ---------------------------------
              Register New User
        ---------------------------------
        \n
    EOT;

        $this->name=(string)readline("Enter user name : ");
        
        $this->email=(string)readline("Enter user email : ");
        while($check_email_obj->checkEmailFormat($this->email)){
            echo "Email format is incorrect.Type again!",PHP_EOL;
            $this->email=(string)readline("Enter email again : ");
        }
        $this->phone=(string)readline("Enter user phone : ");
        $this->age=(string)readline("Enter user age : ");
        $this->gender=(string)readline("Enter user gender : ");

        $this->password=(string)readline("Enter user password : ");
        while($check_password_obj->checkPasswordFormat($this->password)){
            echo "Password format is incorrect.Type again!",PHP_EOL;
            $this->password=(string)readline("Enter password : ");
        }
        
        $this->confirm_password=(string)readline("Enter password again : ");
        while($check_password_obj->checkPasswordFormat($this->confirm_password)){
            echo "Confirm Password format is incorrect.Type again!",PHP_EOL;
            $this->confirm_password=(string)readline("Enter password : ");
        }
        if($check_password_obj->matchPassword($this->password,$this->confirm_password)){
            $user_functionality_obj=new UserFunctionality();
            $user_functionality_obj->addNewUser($this->name,$this->email,$this->phone,$this->age,$this->gender,$this->password);
            $GLOBALS['home']->home();
        }
        else{
            echo "Password and confirm Password did not match. Try again!",PHP_EOL;
            $GLOBALS['register']->addNewUser();
        }
    }

}

?>