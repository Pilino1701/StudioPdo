<?php 
  require_once '../config/header.inc.html';
  require_once '../classes/autoload.php';
?>

<div class="row container">
  <div class="col s12"><p>&nbsp</p>

  <?php require_once "../forms/form-consulta.php";?>

  	<table class="striped">
    <thead>
    	<tr><th>Nome</th><th>Tel</th><th>Email</th><th>Modalidade</th><th>Mensalidade</th></tr>
    </thead>
    <tbody>
      <?php require_once "../database/alunos/read.php";?>
    </tbody>	
   </table>
  </div>
</div>





<?php require_once '../config/footer.inc.html';?>