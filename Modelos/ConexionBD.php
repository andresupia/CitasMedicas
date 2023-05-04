<?php
class conexionBD{
    public static function cBD(){
        $bd = new PDO("mysql:host=localhost;dbname=controlcitas", "root","");
        $bd -> exec("set names utf8");
        $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $bd;
    }
}