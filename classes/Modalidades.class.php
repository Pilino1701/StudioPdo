<?php 

session_start();

require_once 'crudModalidades.php';


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
   
     $mod= $this->getModalidade();
     $mens= $this->getMensalidade();

     $conn = $this->connect();
     $sql='insert into tb_modalidades values(default,:mod,:mens)';
     $stmt=$conn->prepare($sql);
     $stmt->bindParam(':mod',$mod);
     $stmt->bindParam(':mens',$mens);

     
     if($stmt->execute()):
       $_SESSION['sucesso']= 'Cadastrada com Sucesso';
     else:  
       $_SESSION['erro']= 'Modalidade já Cadastrada';
     endif;

  	 $destino=header('Location:../../public/modalidades.php'); 
     
    }//create

  public function read(){
      $conn=$this->connect();
      $sql='select * from tb_modalidades';
      $stmt=$conn->prepare($sql);
      $stmt->execute();

      $result=$stmt->fetchAll();
      echo "<pre>";
      print_r($result);

  	  }

  public function update($modalidade,$mensalidade,$id){
  	  }
  	  
  public function delete($id){
  	  }	



 }//class Modalidades

?>