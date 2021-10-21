<?php

abstract Class Connection{

  private $servDB='mysql:host=127.0.0.1;dbname=db_pdo';
  private $user='root';
  private $pass='';

  protected function connect(){
    try{
       $conn=new PDO($this->servDB,$this->user,$this->pass);
       $conn->exec("set names UTF8");

       //echo 'Conectado com Sucesso';

       return $conn;
    } catch(PDOException $erro){
        echo $erro->getMessage();	
    }
  }	//connect
}//connection


//obs: var==public

?>