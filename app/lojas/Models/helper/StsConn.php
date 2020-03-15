<?php

namespace Sts\Models\helper;

use PDO;
use PDOException;

if(!defined('URL')) {
    header("LOCATION: /");
    exit();
}

class StsConn
{
    public static $Host = HOST;
    public static $User = USER;
    public static $Pass = PASS;
    public static $Dbname = DBNAME;
    private static $Connect = null;

    private static function conectar()
    {
        try {
            if(self::$Connect == null){
                self::$Connect = new PDO('mysql:host='.self::$Host.';dbname='.self::$Dbname, self::$User, self::$Pass);
                //echo 'Mensagem: Conectou <br/>';
            }
            
        } catch (PDOException $exc) {
            echo 'Mensagem: '.$exc->getMessage();
            die;
        }

        return self::$Connect;
    }

    public function getConn()
    {
        return self::conectar();
    }
} 
