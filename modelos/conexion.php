<?php

class Conexion{
    
    // $access = new acceso('localhost', 'progra24_4dmnapp', 'l4P]EV^n7kip', 'progra24_DBAppCC', '3306');

    public function conectar(){

        $usuario = "";
        $psswdBD = "";

        $localUSER = "root";
        $localPSSWD = "root";

        $remotoUSER = "4dm1nC0nci3rg320";
        $remotoPSSWD = "MKdY+Q9M*Aa%";

        if($_SERVER["SERVER_NAME"] == "localhost"){

            $usuario = $localUSER;
            $psswdBD = $localPSSWD;


        }else{

            $usuario = $remotoUSER;
            $psswdBD = $remotoPSSWD;

        }
// $access = new acceso('172.18.0.1', 'root', 'root', 'DBAppCC', '3306');
        $elLink = new PDO("mysql:host=localhost;dbname=65MappConcierge2020",
            $usuario,
            $psswdBD);

        $elLink->exec("set names utf8");
        return $elLink;


    }
}
