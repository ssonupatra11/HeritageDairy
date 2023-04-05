<?php 
 $GLOBALS["user_data_path"]="C:\Users\Dell\Desktop\HeritageDairy\modules\userdata.txt";
 include_once("../public/User.php");
class UserFunctionality{
    public function addNewUser(String $name,String $email,String $phone,String $age,String $gender,String $password,String $confirm_password){
        $user_file=fopen($GLOBALS["user_data_path"],"a");
        fwrite($user_file,$name);
        fwrite($user_file," ");
        fwrite($user_file,$email);
        fwrite($user_file," ");
        fwrite($user_file,$phone);
        fwrite($user_file," ");
        fwrite($user_file,$age);
        fwrite($user_file," ");
        fwrite($user_file,$gender);
        fwrite($user_file," ");
        fwrite($user_file,$password);
        fwrite($user_file," ");
        fwrite($user_file,$confirm_password);
        fwrite($user_file," ");
        fwrite($user_file,"user");
        fwrite($user_file,",");
        fclose($user_file);
        echo "\nUser Registered!\n";
        (new Home())->home();
    }

    function updateUserName(String $email,String $new_uname){
        $user_file=fopen($GLOBALS["user_data_path"],"r");
        if(filesize($GLOBALS["user_data_path"])>0){
            $content=explode(",",fread($user_file,filesize($GLOBALS["user_data_path"])));
        }
        fclose($user_file);

       $user_file=fopen($GLOBALS["user_data_path"],"w");
        foreach($content as $val){
            
            if(strlen($val)>0){
                $n=explode(" ",$val);
                if($n[1]===$email){
                    fwrite($user_file,$new_uname);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[1]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[2]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[3]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[4]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[5]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[6]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[7]);
                    fwrite($user_file,",");
                }
                else{
                    fwrite($user_file,$n[0]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[1]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[2]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[3]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[4]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[5]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[6]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[7]);
                    fwrite($user_file,",");
                }
            }
        }
        fclose($user_file);
        echo "\nUser name updated\n";
        (new Home())->home();
    }


    function updateUserEmail(String $email,String $new_email){
        $user_file=fopen($GLOBALS["user_data_path"],"r");
        if(filesize($GLOBALS["user_data_path"])>0){
            $content=explode(",",fread($user_file,filesize($GLOBALS["user_data_path"])));
        }
        fclose($user_file);

       $user_file=fopen($GLOBALS["user_data_path"],"w");
        foreach($content as $val){
            
            if(strlen($val)>0){
                $n=explode(" ",$val);
                if($n[1]===$email){
                    fwrite($user_file,$n[0]);
                    fwrite($user_file," ");
                    fwrite($user_file,$new_email);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[2]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[3]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[4]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[5]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[6]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[7]);
                    fwrite($user_file,",");
                }
                else{
                    fwrite($user_file,$n[0]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[1]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[2]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[3]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[4]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[5]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[6]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[7]);
                    fwrite($user_file,",");
                }
            }
        }
        fclose($user_file);
        echo "\nUser email updated\n";
        (new Home())->home();
    }

    function updateUserAge(String $email,String $new_age){
        $user_file=fopen($GLOBALS["user_data_path"],"r");
        if(filesize($GLOBALS["user_data_path"])>0){
            $content=explode(",",fread($user_file,filesize($GLOBALS["user_data_path"])));
        }
        fclose($user_file);

       $user_file=fopen($GLOBALS["user_data_path"],"w");
        foreach($content as $val){
            
            if(strlen($val)>0){
                $n=explode(" ",$val);
                if($n[1]===$email){
                    fwrite($user_file,$n[0]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[1]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[2]);
                    fwrite($user_file," ");
                    fwrite($user_file,$new_age);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[4]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[5]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[6]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[7]);
                    fwrite($user_file,",");
                    
                }
                else{
                    fwrite($user_file,$n[0]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[1]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[2]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[3]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[4]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[5]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[6]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[7]);
                    fwrite($user_file,",");
                }
            }
        }
        fclose($user_file);
        echo "\nUser age updated\n";
        (new Home())->home();
    }

    function updateUserPhone(String $email,String $new_phone){
        $user_file=fopen($GLOBALS["user_data_path"],"r");
        if(filesize($GLOBALS["user_data_path"])>0){
            $content=explode(",",fread($user_file,filesize($GLOBALS["user_data_path"])));
        }
        fclose($user_file);

       $user_file=fopen($GLOBALS["user_data_path"],"w");
        foreach($content as $val){
            
            if(strlen($val)>0){
                $n=explode(" ",$val);
                if($n[1]===$email){
                    fwrite($user_file,$n[0]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[1]);
                    fwrite($user_file," ");
                    fwrite($user_file,$new_phone);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[3]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[4]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[5]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[6]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[7]);
                    fwrite($user_file,",");
                }
                else{
                    fwrite($user_file,$n[0]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[1]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[2]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[3]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[4]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[5]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[6]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[7]);
                    fwrite($user_file,",");
                }
            }
        }
        fclose($user_file);
        echo "\nUser phone updated\n";
        (new Home())->home();
    }

    function updateUserGender(String $email,String $new_gender){
        $user_file=fopen($GLOBALS["user_data_path"],"r");
        if(filesize($GLOBALS["user_data_path"])>0){
            $content=explode(",",fread($user_file,filesize($GLOBALS["user_data_path"])));
        }
        fclose($user_file);

       $user_file=fopen($GLOBALS["user_data_path"],"w");
        foreach($content as $val){
            
            if(strlen($val)>0){
                $n=explode(" ",$val);
                if($n[1]===$email){
                    fwrite($user_file,$n[0]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[1]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[2]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[3]);
                    fwrite($user_file," ");
                    fwrite($user_file,$new_gender);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[5]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[6]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[7]);
                    fwrite($user_file,",");
                }
                else{
                    fwrite($user_file,$n[0]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[1]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[2]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[3]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[4]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[5]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[6]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[7]);
                    fwrite($user_file,",");
                }
            }
        }
        fclose($user_file);
        echo "\nUser gender updated\n";
        (new Home())->home();
    }

    function updateUserPassword(String $email,String $new_password){
        $user_file=fopen($GLOBALS["user_data_path"],"r");
        if(filesize($GLOBALS["user_data_path"])>0){
            $content=explode(",",fread($user_file,filesize($GLOBALS["user_data_path"])));
        }
        fclose($user_file);

       $user_file=fopen($GLOBALS["user_data_path"],"w");
        foreach($content as $val){
            
            if(strlen($val)>0){
                $n=explode(" ",$val);
                if($n[1]===$email){
                    fwrite($user_file,$n[0]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[1]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[2]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[3]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[4]);
                    fwrite($user_file," ");
                    fwrite($user_file,$new_password);
                    fwrite($user_file," ");
                    fwrite($user_file,$new_password);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[7]);
                    fwrite($user_file,",");
                }
                else{
                    fwrite($user_file,$n[0]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[1]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[2]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[3]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[4]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[5]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[6]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[7]);
                    fwrite($user_file,",");
                }
            }
        }
        fclose($user_file);
        echo "\nUser password updated\n";
        (new Home())->home();
    }

    function viewProfile(String $email){
        $user_file=fopen($GLOBALS["user_data_path"],"r");
        if(filesize($GLOBALS["user_data_path"])>0){
            $content=explode(",",fread($user_file,filesize($GLOBALS["user_data_path"])));
        }
        fclose($user_file); 
        foreach($content as $val){
            $n=explode(" ",$val);
            if(strlen($val)>0){
                if($n[1]===$email){
                    echo $val;
                }
            }
        }
        (new Home())->home();
    }

    function deleteUser(String $email){
        $user_file=fopen($GLOBALS["user_data_path"],"r");
        if(filesize($GLOBALS["user_data_path"])>0){
            $content=explode(",",fread($user_file,filesize($GLOBALS["user_data_path"])));
        }
        fclose($user_file);

       $user_file=fopen($GLOBALS["user_data_path"],"w");
        foreach($content as $val){
            
            if(strlen($val)>0){
                $n=explode(" ",$val);
                if($n[1]!=$email){
                    fwrite($user_file,$n[0]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[1]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[2]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[3]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[4]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[5]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[6]);
                    fwrite($user_file," ");
                    fwrite($user_file,$n[7]);
                    fwrite($user_file,",");
                }
            }
        }
        fclose($user_file);
        echo "\nUser deleted successfully\n";
        (new ExitPage())->exit();
    }
}

// $val=new UserFunctionality();
// $val->addNewUser("sonu","s.sonupatra@gmail.com","9776308501","22","male","ssonupatra12@","ssonupatra12@");
//$val->updateUserName("sonu","ram");
// $val->updateUserEmail("s.sonupatra@gmail.com","abc@gmail.com");
// $val->updateUserAge("abc@gmail.com","33");
// $val->updateUserGender("abc@gmail.com","female");
// $val->updateUserName("abc@gmail.com","roshni");
// $val->updateUserPhone("abc@gmail.com","993849237");
// $val->updateUserPassword("abc@gmail.com","Roshni22@$");
//$val->viewProfile("abc@gmail.com");
//$val->deleteUser("abc@gmail.com");
?>