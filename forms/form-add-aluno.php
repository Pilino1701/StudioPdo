<form action="../database/alunos/create.php" method="post" class="row">
  
  <div class="input-field col s12">
    <input type="text" name="nome" id="nome" required autofocus>
    <label for="nome">Nome do Aluno</label>
  </div>	

 <div class="input-field col s12">
    <input type="text" name="tel" id="tel" required>
    <label for="tel">Telefone do Aluno</label>
 </div>	

<div class="input-field col s12">
    <input type="text" name="email" id="email" required>
    <label for="email">Email do Aluno</label>
 </div>	


<div class="input-field col s12">
    <input type="hidden" name="modalidade" id="modalidade" value="<?php echo $modalidade?>" required>
</div>	

<div class="input-field col s12">
	<input type="submit" value="cadastrar" class="btn">
	<a href="modalidades.php" class="btn red">cancelar</a>
</div>	

</form>