<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Usuários</title>
<link rel="stylesheet" type="text/css" href="usuarios.css"/>
<?php 
include "conexao.php";
?>
</head>

<body>
<div id="box_usuarios">
<br /><br />
<a class="a2" href="usuarios.php?pg=cadastra">Cadastrar Usuário</a>
<h1>Usuário</h1>

<! BUSCAR OS USUÁRIOS >
<?php 
$sql = "SELECT * FROM usuarios WHERE nome != ''";
$result = mysqli_query($conexao, $sql);
if(mysqli_num_rows($result) == ''){
	echo "<h2>No momento não existe nenhum usuário cadastrado</h2>";
}else{

?>

    <table width="900" border="0">
      <tr>
      
        <td><strong>Código:</strong></td>
        <td><strong>Nome:</strong></td>
        <td><strong>Email:</strong></td>
        <td><strong>Status:</strong></td>
        <td></td>
      </tr>
     <?php 
	 while($res_1 = mysqli_fetch_array($result)){ 
         $id = $res_1['id'];
         $nome = $res_1['nome'];
         $email = $res_1['email'];
         $status = $res_1['status'];
         ?>
          <tr>
            <td><h3><?php echo $id; ?></h3></td>
            <td><h3><?php echo $nome; ?></h3></td>
            <td><h3><?php echo $email; ?></h3></td>

            <td><h3><?php echo $status; ?></h3></td>
            <td></td>
            <td>
            <a class="a" href="usuarios.php?pg=todos&func=deleta&id=<?php echo $id; ?>"><img title="Excluir Usuário" src="img/deleta.jpg" width="18" height="18" border="0"></a>

           <?php if($status == 'Inativo') { ?>
            <a class="a" href="usuarios.php?pg=todos&func=ativa&id=<?php echo $id; ?>"><img title="Ativar novamente usuário" src="img/correto.jpg" width="20" height="20" border="0"></a>
            <?php } ?>

            <?php if($status == 'Ativo') { ?>
            <a class="a" href="usuarios.php?pg=todos&func=inativa&id=<?php echo $id; ?>"><img title="Inativar Usuário(a)" src="img/ico_bloqueado.png" width="18" height="18" border="0"></a>
             <?php } ?>

            <a class="a" href="usuarios.php?pg=todos&func=edita&id=<?php echo $id; ?>"><img title="Editar Dados Cadastrais" src="img/ico-editar.png" width="18" height="18" border="0"></a>
           </td>
          </tr>
      <?php } } ?>
    </table>

<br />



<!EDITAR O USUÁRIO>
<?php if(@$_GET['func'] == 'edita'){ ?>

<hr />
<h1>Editar Usuarios</h1>
<?php $id = $_GET['id'];
$sql = "SELECT * FROM usuarios WHERE id = '$id'";
$consulta = mysqli_query($conexao, $sql);
while($res_1 = mysqli_fetch_array($consulta)) { ?>

<?php if(isset($_POST['button'])){
	$id = $_GET['id'];
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	$status = $_POST['status'];
	
	$sql = "UPDATE usuarios SET nome = '$nome', email = '$email', senha = '$senha', status = '$status' WHERE id = '$id' ";
	$result = mysqli_query($conexao, $sql);
	if($result == ''){
		echo "<script language='javascript'>window.alert('Erro ao Editar');window.location='usuarios.php';</script>";
	} else{
		echo "<script language='javascript'>window.alert('Editado com Sucesso');window.location='usuarios.php';</script>";
	}
}
?>



<form name="form1" method="post" action="" enctype="multipart/form-data">
  <table width="900" border="0">
    <tr>
      <td>Nome:</td>
      <td>Email</td>
      <td>Senha</td>
    </tr>
    <tr>
      <td><label for="textfield2"></label>
      <input type="text" name="nome" id="textfield2" value="<?php  echo $res_1['nome']; ?>"></td>
      <td><label for="textfield3"></label>
      <input type="text" name="email" id="textfield3" value="<?php  echo $res_1['email']; ?>"></td>
      <td><input type="text" name="senha" id="textfield8" value="<?php  echo $res_1['senha']; ?>"></td>
    </tr>
    <tr>
      <td>Status:</td>
      
    </tr>
    <tr>
      
      <td><label for="select"></label>
        <select name="status" size="1" id="select">
          <option value="<?php  echo $res_1['status']; ?>"><?php  echo $res_1['status']; ?></option>
          <option value=""></option>
          <option value="Ativo">Ativo</option>
          <option value="Inativo">Inativo</option>
          
      </select></td>
     
    </tr>
    
      <td><input class="input" type="submit" name="button" id="button" value="Atualizar"></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>

</form>

<?php } } ?>




</div>



<! CADASTRAR OS USUÁRIOS >
<?php if(@$_GET['pg'] == 'cadastra'){ ?>
<div id="cadastra_usuarios">  
<h1>Cadastrar novo Usuário</h1>

<?php if(isset($_POST['button'])){
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	$status = $_POST['status'];


$sql = "INSERT INTO usuarios (nome, email, senha, status) VALUES ('$nome', '$email', '$senha', '$status')";

$cadastra = mysqli_query($conexao, $sql);
if($cadastra == ''){
	echo "<script language='javascript'>window.alert('Ocorreu um erro ao Cadastrar!');</script>"; 
}else{
echo "<script language='javascript'>window.alert('Cadastrado com Sucesso');window.location='usuarios.php';</script>"; 
}}
?>

<form name="form1" method="post" action="">
  <table width="900" border="0">
    <tr>
      <td>Nome:</td>
      <td>Email:</td>
      <td>Senha</td>
      
    </tr>
    <tr>
        
        
      <td>
      <input type="text" name="nome" id="textfield1" required></td>
      <td>
      <input type="text" name="email" id="textfield2" required></td>
      <td>
      <input type="password" name="senha" id="textfield3" required></td>
      </tr>
      <tr>
      <td>Status</td> </tr>
      <tr>
      <td><label for="select"></label>
        <select name="status" size="1" id="select">
          <option value="Ativo">Ativo</option>
          <option value="Inativo">Inativo</option></select></td>
      
    </tr>
    
      <td><input class="input" type="submit" name="button" id="button" value="Cadastrar"></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
<br />
</div>

<?php } ?>



<! DELETAR OS USUÁRIOS >
<?php if(@$_GET['func'] == 'deleta'){
	
	$id = $_GET['id'];
	
	$sql = "DELETE FROM usuarios WHERE id = '$id'";
	mysqli_query($conexao, $sql);
	echo "<script language='javascript'>window.location='usuarios.php';</script>";
} ?>



<!ATIVAR O USUÁRIO>
<?php if(@$_GET['func'] == 'ativa'){
	$id = $_GET['id'];
	$sql = "UPDATE usuarios SET status = 'Ativo' WHERE id = '$id'";
	mysqli_query($conexao, $sql);
		
	echo "<script language='javascript'>window.location='usuarios.php';</script>";
}?>




<!INATIVAR O USUÁRIO>
<?php if(@$_GET['func'] == 'inativa'){
	$id = $_GET['id'];
	$sql = "UPDATE usuarios SET status = 'Inativo' WHERE id = '$id'";
	mysqli_query($conexao, $sql);
		
	echo "<script language='javascript'>window.location='usuarios.php';</script>";
}?>

<br />
</div>



</body>
</html>