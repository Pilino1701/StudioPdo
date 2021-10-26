<?php require_once "../config/header.inc.html";?>


<div class="row container">
  <div class="col s12"><p>&nbsp;</p>
     <h5 class="light">Editar Modalidades</h5><hr>
     <?php
       $id=filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);
       require_once "..\classes\autoload.php";
       $editMod=new Modalidades();
       $editMod->dadosDaTabela($id);
     ?>

  </div>	
</div>


<?php require_once "../config/footer.inc.html";?>