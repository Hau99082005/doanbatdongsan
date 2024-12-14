<?php 
  class Database {
    static $con;
    public static function getConnection(){
        if(self::$con == null)
            return new mysqli('localhost','root','','batdongsan');
        return null;
    }

    public static function query($s){
        return self::getConnection()->query($s);
    }
}

?>