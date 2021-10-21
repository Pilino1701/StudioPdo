<?php 

require_once 'crudModalidades';

Class Modalidades extends Connection implements crudModalidades{

 private $id,$modalidade,$mensalidade;


//metodos setters enviam informacoes para os atributos
 protected function setId($id){
 	$this->id=$id;
 }

 protected function setModalidade($modalidade){
 	$this->modalidade=$modalidade;
 }  

 protected function setMensalidade($mensalidade){
 	$this->mensalidade=$mensalidade;
 }  


 //metodos getters recebem informacoes dos atributos

 protected function getId(){
  return $this->id;	
 }

 protected function getModalidade(){
  return $this->modalidade;	
 }

 protected function getMensalidade(){
  return $this->mensalidade;	
  }

 //metodos especificos..per comunicare all'esterno

  public function dadosDoFormulario($modalidade,$mensalidade){
    
     $this->setModalidade($modalidade);
     $this->setMensalidade($mensalidade);
  }


//metodos da interface

  public function create(){
    echo $this->getModalidade();
    echo $this->getMensalidade();
  	  }

  public function read(){
  	  }

  public function update($modalidade,$mensalidade,$id){
  	  }
  	  
  public function delete($id){
  	  }	



 }//class Modalidades

?>