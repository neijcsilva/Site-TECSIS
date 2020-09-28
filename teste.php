<?php
$host = "localhost";
$user = "tecsis-tec";
$senha = "YES"; //"ramien_21012020";
$banco = "tecsis-tec";
$conex = new mysqli($host, $user, $senha, $banco);
if($conex -> connect_errno)
die('Falha na conexão: ' . $conex->connect_error);
else print("Conectado.");
?>