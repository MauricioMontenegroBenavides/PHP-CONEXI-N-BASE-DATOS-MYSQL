<?php

// Donde se usan las clase se llaman controladores 
// En los controladores uso la logica de mi aplaicacion 
// Los controladores se cran uno por cada recurso q tengamos, casi siempre se usa un recurso por cada tabla de la BD
// Comom se usa la autocarga de composer debe ser una clase 
Namespace App\Controllers;
use PDO\conect;
class retiros{
     
    private $conexion;

    public function __construct(){

        $this->conexion=conect::getInstance()->get_conec();
    }

   /*  index: muestra la lista de todos los recursos.
    create: muestra un formulario para ingresar un nuevo recurso. (luego manda a llamar al método store).
    store: registra dentro de la base de datos el nuevo recurso.
    show: muestra un recurso específico.
    edit: muestra un formulario para editar un recurso. (luego manda a llamar al método update).
    update: actualiza el recurso dentro de la base de datos.
    destroy: elimina un recurso. */

    public function index(){
     
       // Muestra la lista de un recurso, como la tabla de mi BD
      /*  // Escoge las columnas amount,description 
       $stmt=$this->conexion->prepare("SELECT amount,description FROM widdrawals");
       $stmt->execute();
       // Solo escoge la columna amount
       $resultados=$stmt->fetchAll(\PDO::FETCH_COLUMN,0);// devuelve todas las filas en forma de array
       var_dump($resultados);
       echo "\n";
       foreach($resultados as $dato){
       echo $dato['amount'] ."\n";
       }; */

        $stmt=$this->conexion->prepare("SELECT * FROM widdrawals");
        $stmt->execute();
 
        $resultados=$stmt->fetchAll();// Devuelve todas las filas en forma de array
 
        var_dump($resultados);
 
        echo "\n";
 
        foreach($resultados as $dato){
         
         echo $dato['amount'] ."\n";
        };


    }

    public function create(){

      // Muestra un formulario para crear un nuevo recurso  
    }

    public function store($data){
      // Guarda un nuevo recurso en la BD

      
        
      /*   $conexion=conect::getInstance()->get_conec();// En esta linea me da la conexion de la instancia a la base de datos
        $conexion->exec("INSERT INTO widdrawals (payment_metod,type,date,amount,description) VALUES( 

             {$data['payment_metod']},
             {$data['type']},
             '{$data['date']}',
              {$data['amount']},
             '{$data['description']}'

        )");// Con este metodo se genera consultas en sql  */

        // A diferencia de exex() se utiliza prepare() solo para preparar los datos 
        //$conexion=conect::getInstance()->get_conec();// En esta linea me da la conexion de la instancia a la base de datos
        $stmt=$this->conexion->prepare("INSERT INTO widdrawals (payment_metod,type,date,amount,description) 
        VALUES(:payment_metod,:type,:date,:amount,:description)");// Con este metodo se genera consultas en sql
    
        $stmt->execute($data);
    
    }

    public function show($id){

        // Muestra un unico recurso especificado a diferencia del index muestra todos 
        $stmt=$this->conexion->prepare("SELECT * FROM widdrawals WHERE $id=:id");
        $stmt->execute([
            ":id"=>$id
        ]);

        $result=$stmt->fetch(\PDO::FETCH_ASSOC);
        var_dump($result);
    }

    public function edit(){

        // edita un unico recurso


    }

    public function update($data,$id){
       
        // actualiza directamente en la base de datos 
          
        var_dump($data);
        var_dump($id);
        $stmt=$this->conexion->prepare("UPDATE widdrawals SET

        payment_metod=:payment_metod,
        type=:type,
        date=:date,
        amount=:amount,
        description=:description WHERE id=:id;");

       $stmt->execute([

        ":id"=>$id,
        ":payment_metod"=>$data[':payment_metod'],
        ":type"=>$data[':type'],
        ":date"=>$data[':date'],
        ":amount"=>$data[':amount'],
        ":description"=>$data[':description']
       ]);
        
    }

    public function destroy($id){

        // elimina un recurso especifico 

        $this->conexion->beginTransaction();// con esta transaccion esperamos si realizamos la eliminacion o no 
        $stm=$this->conexion->prepare("DELETE FROM widdrawals WHERE id=:id ");
        $stm->execute([
            ":id"=>$id
        ]);
         
         $sure=readline("DESEAS ELIMINAR");
        if(false){
                 
            $this->conexion->rollBack();
          
        }else{

            $this->conexion->commit();
        } 
    }

   



}

?>