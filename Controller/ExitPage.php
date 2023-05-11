<?php 
session_unset();
session_destroy();
class ExitPage{
    public function exit() : void{
        DatabaseConnection::setConnection();
        echo "Thank your for coming";
        exit();
    }
}
?>