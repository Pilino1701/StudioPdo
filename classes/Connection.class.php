<?php

Class Connection{

  var $servDB='mysql:host=127.0.0.1;dbname=db_pdo';
  var $user='root';
  var $pass='';

  public function connect(){
    try{
       $conn=new PDO($this->servDB,$this->user,$this->pass);
       $conn->exec("set names UTF8");
       return $conn;
    } catch(PDOException $erro){
        echo $erro->getMessage();	
    }
  }	//connect
}//connection


?>