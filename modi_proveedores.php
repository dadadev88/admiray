<html>
<head>
<meta http-equiv="pragma" content="no-cache">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link media="screen" rel="stylesheet" href="librerias/css/clientes.css" type="text/css"/>
<script language="javascript" type="text/javascript" src="librerias/js/scriptvalida3.js"></script>
<script language="javascript" type="text/javascript" src="librerias/js/scriptvalida4.js"></script>
<script>
function tpc(e)
{
	if(e.value==1){document.cli.rif_prov.type="text";document.cli.rif_prov.type="hidden";document.cli.rif_prov.value="";}
	else {document.cli.rif_prov.type="hidden";document.cli.rif_prov.type="text";document.cli.rif_prov.value="";}
}
</script>
<title>Adminray System</title>
<body>
<div class="titulo">Modificar Proveedor</div>
<br>
	<div align="center" class="error" id="er">
		<?php if(isset($_GET["res"])){echo $_GET["res"];?><script>mostrar('er'); setTimeout(ocultar,5000,'er');</script> <? } ?>
	</div><br>
<form action="librerias/php/modi_proveedor.php" method="POST" name="prov" onSubmit="return validacionpre(this);">
<table width="890" bgcolor="#CCCCCC" class="tabla">
<tr>
	<td align="right" valign="middle">RIF:</td>
	<td align="left" valign="middle"><input name="rif_prov" type="text" size="15" maxlength="12" align="right" value="<?php echo $_GET['rif'];?>" /> <input width="20" height="20" type="image" src="imagenes/camera_test.png" /></td>
															
</tr>
<tr>
	<td align="right" valign="middle">Nombre:</td>
	<td align="left"  valign="middle"><input name="nom_prov" type="text" size="15" maxlength="12" align="right" value="<?php echo $_GET['nom'];?>" /></td>
</tr>
<tr>
	<td height="44" align="right" valign="middle" >Direccion:</td>	
	<td align="left" valign="middle"><textarea name="direc_prov" cols="80" > <?php echo $_GET['dir'];?> </textarea></td>
</tr>
<tr>
  <td align="right" valign="middle">Telefono:</td>
  <td align="left" valign="middle"><input name="telf_prov" type="text" size="30" ;" value="<?php echo $_GET['telf'];?>">  </td>
</tr>
<tr>
	<td align="right" valign="middle">Persona contacto:</td>
	<td align="left" valign="middle"><input name="perso_con_prov" type="text" size="30" " value="<?php echo $_GET['ape'];?>">
									Email:<input name="email" type="text" size="30" " value="<?php echo $_GET['email'];?>">
	</td>
</tr>
<tr>
	<td align="right" valign="middle"></td>
	<td align="left" valign="middle"></td>
</tr>
<tr align="center" valign="middle">
	<td colspan="2"><input name="enviar" type="image" width="50" height="50" src="imagenes/editar.png" value="1" ></td>
</tr>
</table>
</form>
</center>
</font>
</body>
</html>
