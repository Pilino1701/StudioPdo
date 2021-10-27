<?php

session_start();

require_once 'crudAlunos.php';


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




   public function read($search){
    $conn=$this->connect();
    $search=$search."%";

    $sql="select tb_alunos.nome,tb_alunos.tel,tb_alunos.email,tb_modalidades.modalidade,
          tb_modalidades.mensalidade from tb_alunos join tb_modalidades on 
          tb_modalidades.id = tb_alunos.modalidade where tb_modalidades.modalidade like :search";
    
    $stmt=$conn->prepare($sql);
    $stmt->bindParam(':search',$search);
    $stmt->execute();
    $result=$stmt->fetchAll();

    echo '<pre>';
    print_r($result);    

   }




   public function update($nome,$tel,$email,$modalidade,$id){}
   public function delete($id){}


}//class Alunos


?>