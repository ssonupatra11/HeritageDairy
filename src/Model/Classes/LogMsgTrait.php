<?php 

namespace Sonu\HeritageDairy\Model\Classes;

trait LogMsg{
    public function log($msg):void{
        echo $msg,PHP_EOL;
    }
}