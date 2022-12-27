<?php

/* 
if (!function_exists('mysqli_init') && !extension_loaded('mysqli')) {
    echo 'We don\'t have mysqli!!!';
} else {
    echo 'Phew we have it!';
} */

// Nombre de la BD
// SERVIDOR EN LA CUAL ESTA ALOJADO LA BD
// USUARIO BD
// CONTRASEÑA DE LA BD


// Lo ideal es q esta tipo de inofrmacon sensible este definida en docen
// Hay dos formas de construir los archivos q llaman a la base de datos, la programacion orientada a objetos o la procedural 
// Un singlenton hace la instancia de la misma clase

// En el archivo composer.json   "autoload": {}, se pone lo conserniente allnamespace

Namespace MySQLi; // CON ESTO COMPOSER LO RECONOCE DE FORMA AUTMATICA 

class Coneccion{
    
    private $conexion;
    private static $instance;
    // Para que nadie pueda instanciar la clase por fuera y solo se pueda instanciar por dentro se crea un constructor privado
    private function __construct(){
    // CADA VEZ Q ESTA CLASE SE INSTANCIE POR DENTRO, SE LLAMA A LA BASE DE DATOS
    $this->coneccion_base();

    }
    // Singelton es un patron de diseño q se puede ocupar en cualquier lenguaje (me permite tener una solainstancia en todo mi codigo)
    // Un singlenton me permite tener una solla instancia en todo mi programa
    // Para q el singlenton funciones se debe crear una funcion publica
    // Un singelton se vuelve a instanciar una sola vez y no se vuelve a instanciar nunca mas dentro del codigo
    public static function getInstance(){
        // ESto es un singlenton, q hace la instancia de la misma clase
        if(!self::$instance instanceof self){// si la propiedad $instance no es instancia de mi mismo  se crea la instancia 
         // Para referirirse a la misma clase se pone la palabra reservada self 
            self::$instance=new self();// En esta linea se instancia para llamar al contructor
        }
        return self:: $instance;
    }

    public function get_conec(){


       echo "VAMOS";
        return $this->conexion;
    }

    private function coneccion_base(){ // Nadie puede llmar esta funcion ´por fuera porque van a generar nuevas conexones

      // El objetivo del singlenton es q no se genere una conexion a acada momento 
        $server="localhost";
        $database="benibu";
        $username="root";
        $password="";
      //////////////////////////////////////////////////////////////////////////
      // PROCEDURAL
      //$mysqli=mysql_connect($server,$username,$password,$database);

      //////////////////////////////////////////////////////////////////////////

      // ORIENTADAD A OBJETOS 
      $mysqli= new \mysqli($server,$username,$password,$database,3307);

      // COMPROBAR LA CONEXION ORIENTADA A OBJETOS 
      if($mysqli->connect_errno){
      die("Fallo la conexion : {$mysqli->connect_error}");// Aqui l edigo si hay un error no se ejecute y me diga la informacion del error 
       }
      // ESTO NOS AYUDA A PONER CUALQUIER CARACTER EN NUESTRAS CONSULTAS 
       $setname=$mysqli->prepare("SET NAMES 'utf8'");// Se pone codigo SQL
       $setname->execute();
       var_dump($setname);

       $this->conexion=$mysqli;
    }
    
}










?>