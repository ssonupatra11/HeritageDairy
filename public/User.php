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
            echo "4.Update Age\n";
            echo "5.Update Phone number\n";
            echo "6.Update Password\n";
            echo "7.View Profile\n";
            echo "8.exit\n\n";
            $choice=readline("Enter the option : ");
            switch($choice){
                case 1:{
                    break;
                }
                case 3:{

                    break;
                }
                case 2:{
                    $exit=new ExitPage();
                    $exit->exit();
                }
            }
    }
}
?>