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
	if(e.value==1){document.cli.ced_cli.type="text";document.cli.rif_cli.type="hidden";document.cli.rif_cli.value="";}
	else {document.cli.ced_cli.type="hidden";document.cli.rif_cli.type="text";document.cli.ced_cli.value="";}
}
</script>
<title>ADMIRAY</title>
</head>
<body>
<div class="titulo">Registro de Clientes</div><br>
<div align="center" class="error"id="er">
<?php if(isset($_GET["res"])){echo $_GET["res"];?><script>mostrar('er'); setTimeout(ocultar,5000,'er');</script> <? } ?></div>	
</p>
<form action="librerias/php/inser_cli.php" method="POST" name="cli" onSubmit="return validacionpre(this);">
<table bgcolor="#CCCCCC" class="tabla">
<tr>
  <td width="143" align="right" valign="top">Cedula o RIF:</td>
  <td width="220" align="left" valign="top"><input name="ced_cli" type="text" size="20" maxlength="12"></td>
  <td width="394" align="left" valign="top">
  <font face="Tahoma" size="-1">Indique si es Cedula o Rif. Ejem (v-12345678 o J-12345678-S)</font>
  </td>
</tr>
<tr align="left">
	<td align="right">Nombre Completo:</td>	
	<td colspan="3" valign="middle"><input name="nom_cli" type="text" size="40" onKeyPress="return valida1(event);"></td>
</tr>
<tr>
	<td align="right" valign="middle">Direcci&oacute;n</td>
	<td colspan="3" align="left" valign="middle"><textarea name="dir_cli" cols="80" onKeyPress="return valida3(event);"></textarea></td>
</tr>
<tr>
	<td align="right" valign="middle">Telefono:</td>
	<td colspan="3" align="left" valign="middle">
	<input name="telf_cli" type="text" onKeyPress="return valida2(event);" size="30" maxlength="12"> 
	Email:<input name="email_cli" type="text" size="60" maxlength="50"></td>
</tr>
<tr>
	<td align="right" valign="middle"></td>
	<td colspan="3" align="left" valign="middle"></td>
</tr>
<tr><td colspan="4" align="center">
	<input name="enviar" type="image" width="50" height="50" src="imagenes/guardar.png" value="1" title="Guardar Cliente"></td>
</tr>
</table>
</form>
<p></p>
</center>
</body>
</html>
