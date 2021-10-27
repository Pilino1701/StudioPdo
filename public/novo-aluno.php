<?php require_once "../config/header.inc.html"?>

  <div class="row container">
    <div class="cols s12"><p>&nbsp;</p>
      <h5 class="light">Cadastro de Alunos</h5><hr>
      <?php
        $modalidade=filter_input(INPUT_GET,'id',FILTER_SANITIZE_SPECIAL_CHARS);
        require_once "../forms/form-add-aluno.php";
      ?>
    </div>	
  </div>	


<?php require_once "../config/footer.inc.html"?>