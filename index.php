<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>

<link rel="stylesheet" type="text/css" href="estilo.css"/>
<?php include "conexao.php" ?>;
</head>

<body style="background-image:url(img/fundo2.jpg)">

<body

<div id="caixa_login">

<?php
if(isset($_POST['button'])){

$email = $_POST['email'];
$senha = $_POST['senha'];

if($email == ''){
	echo "<h2> Por favor, insira seu email! </h2>";
}else if($senha == ''){
	echo "<h2> Por favor, insira sua senha! </h2>";	
}else{ 

$sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha' ";
$result = mysqli_query($conexao, $sql);
	if(mysqli_num_rows($result) > 0){
		while($res = mysqli_fetch_array($result)){
			$status = $res['status'];
			$email = $res['email'];
			$senha = $res['senha'];
			$nome = $res['nome'];
			
			if($status == 'Inativo'){
				echo "<h2> Você está inativo, procure a administração </h2>";
			}else{
				session_start();
				
				
				echo "<script language='javascript'> window.location='admin.php';</script>";
			}
		}
	}else{
		echo "<h2> Dados Incorretos! </h2>";	
	}
}

}

?>


<form name="form" method="post" action="" enctype="multipart/form-data">

<table id="caixa_login_table">
  <tr>
   <td><h1>E-mail para Acesso ao Gerador de CHAVE MasterSPED_WEB</h1></td>
  </tr>
  <tr>
   <td><input type="text" name="email" /></td>
  </tr>
   <tr>
   <td><h1>Senha:</h1></td>
  </tr>
  <tr>
   <td><input type="password" name="senha" /></td>
  </tr>
  <tr>
   <td><input class="input" type="submit" name="button" value="Entrar" /></td>
  </tr>
 </table>

</form>
</div>

</body>
</html>