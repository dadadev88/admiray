<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link media="screen" rel="stylesheet" href="librerias/css/login.css" type="text/css"/>
<script language="javascript" src="librerias/js/login.js" type="text/javascript"></script>
<script language="javascript" type="text/javascript" src="librerias/js/scriptvalida3.js"></script>
<script language="javascript" type="text/javascript" src="librerias/js/scriptvalida4.js"></script>
<title>ADMIRAY</title>
</head>
<body>
<div class="titulo">Registro de Producto</div>
<br>
	<div align="center" class="error" id="er">
		<?php if(isset($_GET["res"])){echo $_GET["res"];?><script>mostrar('er'); setTimeout(ocultar,5000,'er');</script> <? } ?>
	</div><br>
<center><form action="librerias/php/inser_pro.php" method="POST">
<table bgcolor="#CCCCCC">
<tr>
	<td align="right" valign="middle">Codigo:</td>
	<td align="left" valign="middle"><input name="cod_pro" type="text" onKeyPress="return valida7(event);" size="15" maxlength="10"></td>
</tr>
<tr>
	<td align="right" valign="middle">Descripcion:</td>
	<td align="left" valign="middle"><input name="des_pro" type="text"onKeyPress="return valida3(event);" size="80" maxlength="100"></td>
</tr>
<tr align="left">
	<td align="right">Precio:</td>	
	<td valign="middle"><input name="pre_pro" type="text" onKeyPress="return valida6(event);" size="20" maxlength="10">&nbsp;
		  Costo:<input name="cos_pro" type="text" onKeyPress="return valida6(event);" size="20" maxlength="10">&nbsp;
		Cantidad: <input name="can_pro" type="text" onKeyPress="return valida5(event);" size="20" maxlength="10"></td>
</tr>
<tr>
  <td align="right" valign="middle">Stock Minimo :</td>
  <td align="left" valign="middle"><input name="stk" type="text" onKeyPress="return valida5(event);" size="15" maxlength="5">
    &nbsp;
  Stock Maximo:<input name="stkmax" type="text" onKeyPress="return valida5(event);" size="15" maxlength="10"></td>
</tr>
<tr align="center">
	<td valign="middle" colspan="2"><input name="enviar" type="image" width="50" height="50" src="imagenes/guardar.png"></td>
</tr>
</table>
</form><p>
<?php echo $_GET["la"]; ?></center>
</body>
</html>
