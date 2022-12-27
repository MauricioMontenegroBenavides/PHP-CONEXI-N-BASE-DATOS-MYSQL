<?php

// PDO ES un sistema que puede conectar php con cualquier base de datos 
// Con composer podemos hacer una autocarga de archivos, y nuestros archivos deben de ser clases
// Para que haya una sola conexxon se utiliza el patron singlenton

Namespace PDO;

class conect{

    private static $instance;
    private $conexion;

    private function __construct(){


       
        $this->coneccion_base();
    }


    public function get_conec(){


        echo "conetandodasdnlasfjal";
         return $this->conexion;
    }

    public static function getInstance(){

        if(!self::$instance  instanceof self){

           self::$instance=new self();
        }

        return self::$instance;
    }

    private function coneccion_base(){

        $server="localhost";
        $database="benibu";
        $username="root";
        $password="";
        
        $con=new \PDO("mysql:host=$server;dbname=$database;port=3307",$username,$password);
        
        $setname=$con->prepare("SET NAMES 'utf8'");
        $setname->execute();
        var_dump($setname);

        $this->conexion=$con;

   }
}




?>