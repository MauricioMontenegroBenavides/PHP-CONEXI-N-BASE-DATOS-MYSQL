<?php

use App\Controllers\icomes;
use App\Controllers\retiros;


//Para hacer consultas msqli utiliza query()
//Para hacer consultas PDO utiliza EXEC()
// TANTO MSQLI Y PDO UTILIZAN PREPARE() Q AYUDA PARA Q NO NOS INYECTEN MYSQL
// ORM ES INGRESAR DATOS A LA BD SIN NECESIDAD DE ESCRIBIR SQL
require('vendor/autoload.php');// Permite llamar a las autocargas composer

// Este metodos es con Misqli
/* $icomemes_controler=new icomes();
$icomemes_controler->store([

     "payment_metod"=>1,
     "type"=>2,
     "datos"=>date("Y-n-d H:i:s"),
     "amount"=>10000,
     "description"=>'pago de mi salario'
]); */
/* 
$retiros=new retiros();
$retiros->store([

     ":payment_metod"=>2,
     ":type"=>1,
     ":date"=>date("Y-m-d H:i:s"),
     ":amount"=>40000,
     ":description"=>'V si puedo'
]);
 */

/* $index=new retiros();
$index->index();
 */

/* $show=new retiros();
$show->show(1);// pASO EL ID */

/* $borrar=new retiros();
$borrar->destroy(12); */


$update=new retiros();
$update->update(

     [

          ":payment_metod"=>12,
          ":type"=>11,
          ":date"=>date("Y-m-d H:i:s"),
          ":amount"=>60000,
          ":description"=>'Tengo q culminar PHP'
     ],2
);



?>