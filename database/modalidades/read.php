 <?php
require_once '../classes/autoload.php';//read.php é chiamato da modalidades.php che sta in public

$lerRegistros = new Modalidades();
$lerRegistros->read();

?>