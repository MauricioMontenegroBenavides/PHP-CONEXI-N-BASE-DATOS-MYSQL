<?php

// Donde se usan las clase se llaman controladores 
// En los controladores uso la logica de mi aplaicacion 
// Los controladores se cran uno por cada recurso q tengamos, casi siempre se usa un recurso por cada tabla de la BD
// Comom se usa la autocarga de composer debe ser una clase 


Namespace App\Controllers;

use MySQLi\Coneccion;

class icomes{

   /*  index: muestra la lista de todos los recursos.
    create: muestra un formulario para ingresar un nuevo recurso. (luego manda a llamar al método store).
    store: registra dentro de la base de datos el nuevo recurso.
    show: muestra un recurso específico.
    edit: muestra un formulario para editar un recurso. (luego manda a llamar al método update).
    update: actualiza el recurso dentro de la base de datos.
    destroy: elimina un recurso. */

    public function index(){
     
       // Muestra la lista de un recurso, como la tabla de mi BD


    }

    public function create(){

      // Muestra un formulario para crear un nuevo recurso  
    }


 /* {$data['payment_metod']},
    {$data['type']},
    '{$data['datos']}',
    {$data['amount']},
    '{$data['description']}' */
    public function store($data){
      
        // Guarda un nuevo recurso en la BD
        echo "HOLA COMO ESTAS";

        $connection=Coneccion::getInstance()->get_conec();

        // prepare() solo prepara la consulta no la ejecuta con el query
        // El metodo prepare concatena los valores ? con cada verdaero valor aplicando la seguridad debida 
        // $smt me devuelve un obejeto mysqli
        // "iisds" es el tipo de datos q se envia 
       $smt= $connection->prepare("INSERT INTO incomes(payment_metod,type,datos,amount,description)VALUES(?,?,?,?,?);"); 
       $smt->bind_param("iisds",$payment_metod,$type,$datos,$amount,$description);

       $payment_metod=$data['payment_metod'];
       $type=$data['type'];
       $datos=$data['datos'];
       $amount=$data['amount'];
       $description=$data['description'];

       $smt->execute();// AQUI EJECUTA LA CONSULTA

       //echo $smt->affect_rows;
    }

    public function show(){

        // Muestra un unico recurso especificado a diferencia del index muestra todos 
    }

    public function edit(){

        // edita un unico recurso
    }

    public function update(){
       
        // actualiza directamente en la base de datos 
        
    }

    public function destroy(){

        // elimina un recurso especifico 
    }

   



}

?>