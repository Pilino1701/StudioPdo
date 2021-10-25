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



public function dadosDaTabela($id){
 
  $conn=$this->connect();
  
  $this->setId($id);
  $_id=$this->getId();

  $sql='select * from tb_modalidades where id = :id';
  $stmt=$conn->prepare($sql);
  $stmt->bindParam(':id',$_id);
  $stmt->execute();
  $result=$stmt->fetchAll();

  foreach ($result as $values):

  endforeach;  


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
      //echo "<pre>";
      //print_r($result);
 
      foreach ($result as $value): 
        $this->setId($value['id']);
        $this->setModalidade($value['modalidade']);
        $this->setMensalidade($value['mensalidade']);
        
        $_id=$this->getId();
        $_mod=$this->getModalidade(); 
        $_mens=$this->getMensalidade();

        echo "<tr>";
        echo "<td>$_id</td>";
        echo "<td>$_mod</td>";
        echo "<td>$_mens</td>";
        echo"<td><a href='edit-mod.php?id=$_id' class='green-text'><i class='material-icons left  green-text'>edit</i>Editar</a></td>";
        echo"<td><a href='delete-mod.php?id=$_id' class='red-text'><i class='material-icons left  red-text'>delete</i>Deletar</a></td>";
        echo"<td><a href='novo-aluno.php?id=$_id'><i class='material-icons left'>person_add</i>Novo Aluno</a></td>";
     echo "</tr>";


      endforeach; 



 

  	  }//read

  public function update($modalidade,$mensalidade,$id){
  	  }
  	  
  public function delete($id){
  	  }	



 }//class Modalidades

?>