<?php 

include('config.php'); 
session_start();

if(isset($_POST['enviar']))
{
	if(isset($_POST['user']))
	{
		$sql = "SELECT * FROM usuarios WHERE nome='".$_POST['user']."'";
		$res = mysqli_query($link, $sql) or die(mysqli_error());
		$tot = mysqli_num_rows($res);
			if($tot > 0)
			{
				$_SESSION['logado'] = "sim";
				$_SESSION['usuario'] = $_POST['user'];
			} else 
			{
				echo "Usuario incorreto";
			}
	}
}
?>
<?php if(isset($_SESSION['logado']) == "sim"){ ?>

<?php
$sql = "SELECT * FROM mensagem WHERE nome_user_para='".$_SESSION['usuario']."' and lida IS NULL";
$res = mysqli_query($link, $sql) or die(mysqli_error());
$tot = mysqli_num_rows($res);
?>
Menu: <a href="listar.php">Ver Mensagens</a> | <a href="criar.php">Criar Mensagens</a> | <a href="sair.php">Sair</a><br /><br />
Olá <strong><?php echo $_SESSION['usuario'];?></strong>, Voce tem <?php echo $tot?> Mensagens para ler.

<?php } else { ?>
<form method="post" action="" >
<center><strong>Usuarios: Guilherme, Felgueiras, Amanda</strong></center></<br /><br />
Nome de usuario:<br />
<input type="text" name="user" /><br /><br />
<input type="submit" name="enviar" value="Entrar" />
</form>
<?php } ?>