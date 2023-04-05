<?php 
session_unset();
session_destroy();
class ExitPage{
    function exit(){
        echo "Thank your for coming";
        exit();
    }
}
?>