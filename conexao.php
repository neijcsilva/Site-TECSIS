<!CONEXAO LOCAL>

<?php /*
function conectar(){
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$bd = "login";
	
	$con = new mysqli($servidor, $usuario, $senha, $bd);
	return $con;
}

$conexao = conectar();
*/
?>





<!CONEXAO HOSPEDADA>

<?php
function conectar(){
	$servidor = "localhost";
	$usuario = "tecsis-tec";
	$senha = "ramien21012020";
	$bd = "tecsis-tec";
	
	$con = new mysqli($servidor, $usuario, $senha, $bd);
	return $con;
}

$conexao = conectar();

?>