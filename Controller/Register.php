<?php
/**
 * This Anonymous class has a functionality to register new user.
 */
class Register{

    /**
     * @access private
     * 
     * @var string|null
     */
    private ?string $name=null;

    /**
     * @access private
     * 
     * @var string|null
     */
    private ?string $email=null;

    /**
     * @access private
     * 
     * @var string|null
     */
    private ?string $phone=null;

    /**
     * @access private
     * 
     * @var string|null
     */
    private ?string $age=null;

    /**
     * @access private
     * 
     * @var string|null
     */
    private ?string $gender=null;

    /**
     * @access private
     * 
     * @var string|null
     */
    private ?string $password=null;

    /**
     * @access private
     * 
     * @var string|null
     */
    private ?string $confirm_password=null;


    //Destructor is called when there is no reference to its object
    function __destruct(){}
    
    /**
     * This function takes user data from command line and register a new user.
     * 
     * @access public
     * 
     * @return void
     */
    public function addNewUser() : void{
        /**
         * @var mixed
         */
        $check_password_obj=new CheckPassword();
        /**
         * @var mixed
         */
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
            /**
             * @var mixed
             */
            $user_functionality_obj=new AddUser();
            $user_functionality_obj->addNewUser($this->name,$this->email,$this->phone,$this->age,$this->gender,$this->password);
            $GLOBALS['home']->home();
        }
        else{
            echo "Password and confirm Password did not match. Try again!",PHP_EOL;
            $GLOBALS['register']->addNewUser();
        }
    }

}
