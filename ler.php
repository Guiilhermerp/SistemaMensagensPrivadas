<?php 
include('config.php'); 
session_start();
if(isset($_SESSION['logado']) != "sim"){
header('location: index.php');
exit();
}

$id = $_GET['id'];
$sql = "SELECT * FROM mensagem WHERE nome_user_para='".$_SESSION['usuario']."' and ID='".$id."'";
$res = mysqli_query($link, $sql) or die(mysqli_error());
$row = mysqli_fetch_assoc($res);
?>
Menu: <a href="listar.php">Ver mensagens</a> | <a href="crear.php">Criar mensagens</a> | <a href="sair.php">Sair</a><br /><br />
<strong>De:</strong> <?php echo $row['nome_user_de']?><br />
<strong>Hora:</strong> <?php echo $row['hora']?><br />
<strong>Assunto:</strong> <?php echo $row['assunto']?><br /><br />
<strong>Mensagem:</strong><br />
<?php echo $row['texto']?>

<?php 

if($row['lida'] != "sim")
{
	mysqli_query($link, "UPDATE mensagem SET lida='si' WHERE ID='".$id."'") or die(mysqli_error($link));
}
?>