<?php
class User{

    /**
     * @var int/null
     */
    private ?int $choice=null;

    public function showUserOption(){
        echo <<<EOT
            -------------------------
              USER UPDATE OPTIONS
            -------------------------
            Hello "$_SESSION[name]"!
            1.Create New Account
            2.Update name
            3.Update email
            4.Update Phone number
            5.Update Age
            6.Update Gender
            7.Update Password
            8.Delete Profile
            9.exit
            \n
        EOT;

            //variable choice storing option number
            $this->choice=(int)readline("Enter the option : ");

            //switch case for choosing user options
            switch($this->choice){
                case 1:{
                    $GLOBALS['register']->addNewUser();
                    $GLOBALS['home']->home();
                    break;
                }
                case 2:{
                    $user_new_name=(string)readline("Enter user new name : ");
                    $GLOBALS['user_functionality']->updateUserName($_SESSION["email"],$user_new_name);
                    $GLOBALS['home']->home();
                    break;
                }
                case 3:{
                    $user_new_email=(string)readline("Enter user new email : ");

                    //while loop with condition to re-enter email till it's incorrect
                    while((new CheckEmail())->checkEmailFormat($user_new_email)){
                        $user_new_email=(string)readline("Enter user new email again : ");
                    }
                    
                    $GLOBALS['user_functionality']->updateUserEmail($_SESSION["email"],$user_new_email);
                    $GLOBALS['home']->home();
                    break;
                }
                case 4:{
                    $user_new_phone=(string)readline("Enter user new phone number : ");
                    $GLOBALS['user_functionality']->updateUserPhone($_SESSION["email"],$user_new_phone);
                    $GLOBALS['home']->home();
                    break;
                }
                case 5:{
                    $user_new_age=(string)readline("Enter user new age : ");
                    $GLOBALS['user_functionality']->updateUserAge($_SESSION["email"],$user_new_age);
                    $GLOBALS['home']->home();
                    break;
                }
                case 6:{
                    $user_new_gender=(string)readline("Enter user gender : ");
                    $GLOBALS['user_functionality']->updateUserGender($_SESSION["email"],$user_new_gender);
                    $GLOBALS['home']->home();
                    break;
                }
                case 7:{
                    $check_pass_obj=new CheckPassword();
                    $user_new_password=(string)readline("Enter user new password : ");

                    //while loop with condition to check & re-enter password till it's incorrect 
                    while($check_pass_obj->checkPasswordFormat($user_new_password)){
                        $user_new_password=(string)readline("Enter user new password again : ");
                    }

                    $user_new_confirm_password=(string)readline("Enter user new password to confirm : ");

                    //while with condition to check password format & compare new and old password or re-enter password
                    while($check_pass_obj->checkPasswordFormat($user_new_confirm_password) || !$check_pass_obj->matchPassword($user_new_password,$user_new_confirm_password)){
                        $user_new_confirm_password=(string)readline("Enter user confirm password again : ");
                    }

                    $GLOBALS['user_functionality']->updateUserPassword($_SESSION["email"],$user_new_password);
                    $GLOBALS['home']->home();
                    break;
                }
                case 8:{
                    $GLOBALS['user_functionality']->deleteUser($_SESSION["email"]);
                }
                case 9:{
                    $GLOBALS['exit']->exit();
                }
                default:{
                    echo "Invalid Option! Enter the option again : ",PHP_EOL;
                    $GLOBALS['user']->showUserOption();
                }
            }
    }
}
?>