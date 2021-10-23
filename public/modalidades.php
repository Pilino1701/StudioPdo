<?php require_once '../config/header.inc.html';
//session_start();
?>

<div class="row-container">
  <div class="col s12"><p>&nbsp;</p>
    <h5 class="light">Cadastro de Modalidades</h5><hr>
    <?php 
    require_once '../forms/form-add-mod.php';

    if (isset($_SESSION['sucesso'])):
      echo"<p class='center green lighten-2 white-text' padding:10px>";
        echo $_SESSION['sucesso'];
        unset($_SESSION['sucesso']);
      echo"</p>";

    elseif (isset($_SESSION['erro'])):
      echo"<p class='center red lighten-2 white-text' padding:10px>";
        echo $_SESSION['erro'];
        unset($_SESSION['erro']);
      echo"</p>";

    endif;    
    
    ?>	
  </div>
</div>

<div class="row-container">
  <div class="col s12">
  	<h5 class="light">Modalidades Cadastradas</h5><hr>
  	<!--Tabela-->
  	<table class="striped">
  		 <thead>
  		 	<tr><th>Id</th><th>Modalidade</th><th>Mensalidade</th></tr>
  		 </thead>
  		 <tbody>
  		 	<?php
              require_once '../database/modalidades/read.php';
  		 	?>
  		 </tbody>	
  	</table>

  </div>


</div>	



<?php require_once '../config/footer.inc.html';?>