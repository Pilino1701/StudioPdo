<?php

session_start();

class Alunos extends Connection implements crudAlunos{
  
  private $id,$nome,$tel,$email,$modalidade;

  //metodos setters

  protected function setId($id){
  	$this->id=$id;
  } 

  protected function setNome($nome){
  	$this->nome=$nome;
  } 

  protected function setTel($tel){
  	$this->tel=$tel;
  }

  protected function setEmail($email){
  	$this->email=$email;
  } 

  protected function setModalidade($modalidade){
  	$this->modalidade=$modalidade;
  }  
 
 //Metodi Getters

  protected function getID(){
  	return $this->id;
  }

  protected function getNome(){
  	return $this->nome;
  }

  protected function getTel(){
  	return $this->tel;
  }

  protected function getEmail(){
  	return $this->email;
  }

  protected function getModalidade(){
  	return $this->modalidade;
  }


  //metodos especificos

  public function dadosDoFormulario($nome,$tel,$email,$modalidade){
  	
  	$this->setNome($nome);
  	$this->setTel($tel);
  	$this->setEmail($email);
  	$this->setModalidade($modalidade);
  
  }

//metodos da interface

   public function create(){
    $conn=$this->connect();
    
    $nome=$this->getNome();
    $tel=$this->getTel();
    $email=$this->getEmail();
    $modalidade=$this->getModalidade();

    $sql="insert into tb_alunos values(default,:nome,:tel,:email,:modalidade)";
    $stmt=$conn->prepare($sql);
    $stmt->bindParam(':nome',$nome);
    $stmt->bindParam(':tel',$tel);
    $stmt->bindParam(':email',$email);
    $stmt->bindParam(':modalidade',$modalidade);

    if($stmt->execute()):
      $_SESSION['sucesso']="Cadastrado com Sucesso";
      $destino=header("Location:../../public/modalidades.php");
    else:
      $_SESSION['erro']="Aluno já cadastrado com esse email";
      $destino=header("Location:../../public/modalidades.php");
    endif;


   }


   public function read($search){}
   public function update($nome,$tel,$email,$modalidade,$id){}
   public function delete($id){}


}//class Alunos


?>