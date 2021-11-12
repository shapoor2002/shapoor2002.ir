<?php
defined("ABSPATH") || exit("Erorr!");
/**
* Plugin Name: shapoor
* Plugin URI: http://localhost/shapoor2002.ir/
* Description: This is the shapoor I ever created.
* Version: 1.0.0
* Author: Shapoor Mardani
* Author URI: http://localhost/shapoor2002.ir/
**/
final class shapoor{

    private static $_inctance =null;
    public static function getShapoor(){
        if(self::$_inctance==null){
            self::$_inctance=new self();
        }
        return self::$_inctance;
    }
    public function __construct()
    {
        echo 12234;
    }
}
shapoor::getShapoor();
