<?php 

include('config.php'); 
session_start();
if(isset($_SESSION['logado']) != "sim"){
header('location: index.php');
exit();
}

$sql = "SELECT * FROM mensagem WHERE nome_user_para='".$_SESSION['usuario']."'";
$res = mysqli_query($link, $sql) or die(mysqli_error());
?>
Menu: <a href="listar.php">Ver mensagens</a> | <a href="criar.php">Criar mensagens</a> | <a href="sair.php">Sair</a><br /><br />
  <table width="800" border="0" align="center" cellpadding="1" cellspacing="1">
    <tr>
      <td width="53" align="center" valign="top"><strong>ID</strong></td>
      <td width="426" align="center" valign="top"><strong>Assunto</strong></td>
      <td width="321" align="center" valign="top"><strong>De</strong></td>
	  <td width="321" align="center" valign="top"><strong>Hora</strong></td>
    </tr>
    <?php
	$i = 0; 
	while($row = mysqli_fetch_assoc($res)){ ?>
    <tr bgcolor="<?php if($row['lida'] == "sim") { echo "#FFE8E8"; } else { if($i%2==0) { echo "#FFE7CE"; } else { echo "#FFCAB0"; } } ?>">
      <td align="center" valign="top"><?php echo $row['ID']?></td>
      <td align="center" valign="top"><a href="ler.php?id=<?php echo $row['ID']?>"><?php echo $row['assunto']?></a></td>
      <td align="center" valign="top"><?php echo $row['nome_user_de']?></td>
	  <td align="center" valign="top"><?php echo $row['hora']?></td>
    </tr>
<?php $i++; 
} ?>
</table>