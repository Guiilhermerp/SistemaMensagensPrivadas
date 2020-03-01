<?php 

include('config.php'); 
session_start();
if(isset($_SESSION['logado']) != "sim"){
header('location: index.php');
exit();
}
if (isset($_POST['enviar'])) 
{
	if(!empty($_POST['nome_user_nome_user_para']) && !empty($_POST['assunto']) && !empty($_POST['texto']))
	{
		$hora = date("j/m/Y, g:i a");
		$sql = "INSERT INTO mensagem (nome_user_para,nome_user_de,hora,assunto,texto) VALUES ('".$_POST['nome_user_para']."','".$_SESSION['usuario']."','".$hora."','".$_POST['assunto']."','".$_POST['texto']."')";
		mysqli_query($link, $sql);
		echo "Mensagem enviada corretamente.";
	}
}
?>
Menu: <a href="listar.php">Ver Mensagens</a> | <a href="crear.php">Criar Mensagens</a> | <a href="sair.php">Sair</a><br /><br />

<form method="post" action="" >
<center><strong>Usuarios para receber: Guilherme, Felgueiras, Amanda</strong></center></<br /><br />
Para:<br />
<input type="text" name="para" /><br />
Assunto:<br />
<input type="text" name="assunto" /><br />
Mensagem:<br />
<textarea name="texto"></textarea>
<br /><br />
<input type="submit" name="enviar" value="Enviar" />
</form>