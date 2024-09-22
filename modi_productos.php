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
	if(e.value==1){document.cli.cod_pro.type="text";document.cli.cod_pro.type="hidden";document.cli.cod_pro.value="";}
	else {document.cli.cod_pro.type="hidden";document.cli.cod_pro.type="text";document.cli.cod_pro.value="";}
}
</script>
<title>Adminray System</title>
<body>
<div class="titulo">Modificar Productos</div>
<br>
	<div align="center" class="error" id="er">
		<?php if(isset($_GET["res"])){echo $_GET["res"];?><script>mostrar('er'); setTimeout(ocultar,5000,'er');</script> <? } ?>
	</div><br>
<form action="librerias/php/modi_producto.php" method="POST" name="prov" onSubmit="return validacionpre(this);">
<table bgcolor="#CCCCCC" class="tabla">
<tr>
	<td align="right" valign="middle">Codido:</td>
	<td align="left" valign="middle"><input name="cod_pro" type="text" size="15" maxlength="10" align="right" value="<?php echo $_GET['cod'];?>" /> <input width="20" height="20" type="image" src="imagenes/camera_test.png" /></td>
</tr>
<tr>
	<td align="right" valign="middle">Descripcion:</td>
	<td align="left"  valign="middle"><input name="des_pro" type="text" value="<?php echo $_GET['des'];?>" size="80" maxlength="100" align="right" /></td>
</tr>
<tr>
	<td align="right" valign="middle" >Precio:</td>	
	<td align="left" valign="middle">
    <input name="pre_pro" type="text" size="20" maxlength="10" align="right" value="<?php echo $_GET['pre'];?>" />
    &nbsp;
	Costo:
	<input name="cos_pro" type="text" value="<?php echo $_GET['cos'];?>" size="20" maxlength="10">
    Cantidad:<input name="can_pro" type="text" value="<?php echo $_GET['cant'];?>" size="20" maxlength="10"></td>
</tr>
<tr>
	<td align="right" valign="middle">Stock Minimo:</td>
	<td align="left" valign="middle"><input name="stk_min" type="text" value="<?php echo $_GET['stkmin'];?>" size="15" maxlength="5">
	  Stock Maximo:<input name="stk_max" type="text" " value="<?php echo $_GET['stkmax'];?>" size="15" maxlength="10">	</td>
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
