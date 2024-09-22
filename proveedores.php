<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link media="screen" rel="stylesheet" href="librerias/css/login.css" type="text/css"/>
<link media="screen" rel="stylesheet" href="librerias/css/proveedor.css" type="text/css"/>
<script language="javascript" type="text/javascript" src="librerias/js/scriptvalida3.js"></script>
<script language="javascript" type="text/javascript" src="librerias/js/scriptvalida4.js"></script>
<script language="javascript" src="librerias/js/login.js" type="text/javascript"></script>
<title>Adminray System</title>
<body>
<div class="titulo">Registro de Proveedor</div><br>
	<div align="center" class="error" id="er">
		<?php if(isset($_GET["res"])){echo $_GET["res"];?><script>mostrar('er'); setTimeout(ocultar,5000,'er');</script> <? } ?>
	</div><br>
<form action="librerias/php/inser_prov.php" method="POST">
<table width="890" bgcolor="#CCCCCC" class="tabla">
<tr>
	<td align="right" valign="middle">RIF:</td>
	<td align="left" valign="middle"><input name="rif_prov" type="text" size="30" onKeyPress="return valida2(event);"></td>
															
</tr>
<tr>
	<td align="right" valign="middle">Nombre:</td>
	<td align="left"  valign="middle"><input name="nom_prov" type="text" size="30" onKeyPress="return valida1(event);"></td>
</tr>
<tr>
	<td align="right" valign="middle" >Direccion:</td>	
	<td align="left" valign="middle"><textarea name="dir_prov" cols="80" onKeyPress="return valida3(event);"></textarea></td>
</tr>
<tr>
  <td align="right" valign="middle">Telefono:</td>
  <td align="left" valign="middle"><input name="telf_prov" type="text" size="30" onKeyPress="return valida2(event);"></td>
</tr>
<tr>
	<td align="right" valign="middle">Persona contacto:</td>
	<td align="left" valign="middle"><input name="perso_con_prov" type="text" size="30" onKeyPress="return valida1(event);">
									Email:<input name="email_prov" type="text" size="30">
	</td>
</tr>
<tr>
	<td align="right" valign="middle"></td>
	<td align="left" valign="middle"></td>
</tr>
<tr align="center" valign="middle">
	<td colspan="2"><input name="enviar" type="image" width="50" height="50" src="imagenes/guardar.png"></td>
</tr>
</table>
</form>
</center>
</font>
</body>
</html>
