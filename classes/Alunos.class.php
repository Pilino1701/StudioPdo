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


  public function dadosDaTabela($id){
  	$conn=$this->connect();

  	$this->setId($id);
  	$_id=$this->getId();

  	$sql="select * from tb_alunos where id = :id";
  	$stmt=$conn->prepare($sql);
  	$stmt->bindParam(':id',$_id);
    $stmt->execute();

    $result=$stmt->fetchAll();

    foreach($result as $values):
      require_once "../forms/form-edit-alunos.php";	
    endforeach;	

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

    $sql="select tb_alunos.id,tb_alunos.nome,tb_alunos.tel,tb_alunos.email,tb_modalidades.modalidade,
          tb_modalidades.mensalidade from tb_alunos join tb_modalidades on 
          tb_modalidades.id = tb_alunos.modalidade where tb_modalidades.modalidade like :search
          order by nome";
    
    $stmt=$conn->prepare($sql);
    $stmt->bindParam(':search',$search);
    $stmt->execute();
    $result=$stmt->fetchAll();

    //echo '<pre>';
    //print_r($result);  
     
     foreach($result as $values):

     	$this->setId($values['id']);
     	$id=$this->getId();

         echo '<tr>';
         echo '<td>'.$values['nome'].'</td>';
         echo '<td>'.$values['tel'].'</td>';
         echo '<td>'.$values['email'].'</td>';
         echo '<td>'.$values['modalidade'].'</td>';
         echo '<td>'.$values['mensalidade'].'</td>';
//potrebbe anche essere cosi:echo"<td><a href='edit-alunos.php?id={$this->getId()}' class='btn btn-small'>editar</a></td>";
         echo"<td><a href='edit-alunos.php?id=$id' class='btn btn-small'>editar</a></td>";
         echo"<td><a href='../database/alunos/delete.php?id=$id' class='btn btn-small red'>deletar</a></td>";
 

       echo '</tr>';
       

     endforeach;	
     


   }




   public function update($nome,$tel,$email,$modalidade,$id){
    $conn=$this->connect();

    $this->setNome($nome);
    $this->setTel($tel);
    $this->setEmail($email);
    $this->setModalidade($modalidade);
    $this->setId($id);

    $_nome=$this->getNome();
    $_tel=$this->getTel();
    $_email=$this->getEmail();
    $_modalidade=$this->getModalidade();
    $_id=$this->getId();

    $sql="update tb_alunos set nome= :nome, tel= :tel, email= :email, modalidade= :modalidade
      where id= :id ";

    $stmt=$conn->prepare($sql);
    $stmt->bindParam(':nome',$_nome);
    $stmt->bindParam(':tel',$_tel);
    $stmt->bindParam(':email',$_email);
    $stmt->bindParam(':modalidade',$_modalidade);
    $stmt->bindParam(':id',$_id);
    $stmt->execute();

    $destino = header("Location: ../../public/home.php");//é chiamata da update.php



   }



   public function delete($id){
     $conn=$this->connect();
     
     $this->setId($id);
     $_id=$this->getId();
     
     $sql="delete from tb_alunos where id=:id";

     $stmt=$conn->prepare($sql);
     $stmt->bindParam(':id',$_id);
     $stmt->execute();

     $destino=header("Location:../../public/home.php");

   }


}//class Alunos


?>