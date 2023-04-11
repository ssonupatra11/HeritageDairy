<?php
class User{
    function showUserOption(){
        echo "\n-------------------------\n";
        echo "   USER UPDATE OPTIONS\n";
        echo "-------------------------\n\n";
            echo "Hello ".$_SESSION["name"]."!\n\n";
            echo "1.Create New Account\n";
            echo "2.Update name\n";
            echo "3.Update email\n";
            echo "4.Update Phone number\n";
            echo "5.Update Age\n";
            echo "6.Update Gender\n";
            echo "7.Update Password\n";
            echo "8.Delete Profile\n";
            echo "9.exit\n\n";

            //variable choice storing option number
            $choice=readline("Enter the option : ");

            //switch case for choosing user options
            switch($choice){
                case 1:{
                    $register_user=new Register();
                    $register_user->addNewUser();
                    (new Home())->home();
                    break;
                }
                case 2:{
                    $user_name_update=new UserFunctionality();
                    $user_new_name=readline("Enter user new name : ");
                    $user_name_update->updateUserName($_SESSION["email"],$user_new_name);
                    (new Home())->home();
                    break;
                }
                case 3:{
                    $user_email_update=new UserFunctionality();
                    $user_new_email=readline("Enter user new email : ");

                    //while loop with condition to re-enter email till it's incorrect
                    while((new CheckEmail())->checkEmailFormat($user_new_email)){
                        $user_new_email=readline("Enter user new email again : ");
                    }
                    
                    $user_email_update->updateUserEmail($_SESSION["email"],$user_new_email);
                    (new Home())->home();
                    break;
                }
                case 4:{
                    $user_phone_update=new UserFunctionality();
                    $user_new_phone=readline("Enter user new phone number : ");
                    $user_phone_update->updateUserPhone($_SESSION["email"],$user_new_phone);
                    (new Home())->home();
                    break;
                }
                case 5:{
                    $user_age_update=new UserFunctionality();
                    $user_new_age=readline("Enter user new age : ");
                    $user_age_update->updateUserAge($_SESSION["email"],$user_new_age);
                    (new Home())->home();
                    break;
                }
                case 6:{
                    $user_gender_update=new UserFunctionality();
                    $user_new_gender=readline("Enter user gender : ");
                    $user_gender_update->updateUserGender($_SESSION["email"],$user_new_gender);
                    (new Home())->home();
                    break;
                }
                case 7:{
                    $check_pass_obj=new CheckPassword();
                    $user_password_update=new UserFunctionality();
                    $user_new_password=readline("Enter user new password : ");

                    //while loop with condition to check & re-enter password till it's incorrect 
                    while($check_pass_obj->checkPasswordFormat($user_new_password)){
                        $user_new_password=readline("Enter user new password again : ");
                    }

                    $user_new_confirm_password=readline("Enter user new password to confirm : ");

                    //while with condition to check password format & compare new and old password or re-enter password
                    while($check_pass_obj->checkPasswordFormat($user_new_confirm_password) || !$check_pass_obj->matchPassword($user_new_password,$user_new_confirm_password)){
                        $user_new_confirm_password=readline("Enter user confirm password again : ");
                    }

                    $user_password_update->updateUserPassword($_SESSION["email"],$user_new_password);
                    (new Home())->home();
                    break;
                }
                case 8:{
                    (new UserFunctionality())->deleteUser($_SESSION["email"]);
                }
                case 9:{
                    $exit=new ExitPage();
                    $exit->exit();
                }
            }
    }
}
?>