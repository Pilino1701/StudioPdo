<form action="..\database\alunos\update.php" method="post" class="row">
  <input type="hidden" name="id" value="<?php echo $id;?>">
  <div class="input-field col s12">
  	<input type="text" name="nome" id="nome" value="<?php echo $values['nome'];?>" required autofocus>
  	<label for="nome">Nome do Aluno</label>
  </div>
  <div class="input-field col s12">
  	<input type="tel" name="tel" id="tel" value="<?php echo $values['tel'];?>" required>
  	<label for="tel">Telefone</label>
  </div>
  <div class="input-field col s12">
  	<input type="email" name="email" id="email" value="<?php echo $values['email'];?>" required>
  	<label for="email">Email do Aluno</label>
  </div>
  <div class="input-field col s12">
  	<input type="text" name="modalidade" id="modalidade" value="<?php echo $values['modalidade'];?>" required>
  	<label for="modalidade">Modalidade</label>
  </div>
  <div class="input-field col s12">
  	<input type="submit" value="alterar" class="btn">
    <a href="home.php" class="btn red">cancelar</a>
  </div>

</form>