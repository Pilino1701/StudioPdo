<?php
require_once "../../classes/autoload.php";

$search="Ae";

$readAlunos = new Alunos();
$readAlunos->read($search);

?>