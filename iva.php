<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="librerias/css/ventas.css" media="screen" type="text/css" rel="stylesheet" />
<link href="librerias/css/imp_presu.css" media="print" type="text/css" rel="stylesheet" />
<script language="javascript" type="text/javascript" src="librerias/js/presupuesto.js"></script>
<script language="javascript" type="text/javascript" src="librerias/js/scriptvalida3.js"></script>
<script language="javascript" type="text/javascript" src="librerias/js/scriptvalida4.js"></script>
<title>Admiray System</title>
</head>
<body>
<?php
	include("librerias/php/adodb/adodb.inc.php");include("librerias/php/config.php");include("librerias/php/conex.php"); //$db->debug = true;
 	$rs=$db->Execute("SELECT * FROM iva");	
		while (!$rs->EOF)
		{
		$tb.="<tr cellspacing=1 cellpadding=1>
				<td  border=1 align=center>".$rs->fields(0)."</td>
				<td  border=1 align=center>".$rs->fields(1)."</td>
				<td  border=1 align=center>".$rs->fields(1)*100 ."%</td>
				<td  border=1 align=center>".$rs->fields(2)."</td>
			</tr>";
			$rs->MoveNext();
		}
		$imp="<input type=image width=60 height=60 src=imagenes/Printer.png onclick=window.print(); class=imp>";
?>
<?php 
include("librerias/php/adodb/adodb.inc.php");include("librerias/php/config.php");include("librerias/php/conex.php");//$db->debug = true;
	$rs=$db->Execute("SELECT id FROM iva ORDER BY id DESC");	
		if ($rs->RowCount()>0){$n=$rs->fields(0)+1;}
		else{ $n=1;} 
?>
<div class="titulo">IVA</div> 
<p>
<div class="error" align="center" id="er" style="width:300px;">	
  	<?php if(isset($_GET["res"])){
	echo $_GET["res"];?><script>mostrar('er'); setTimeout(ocultar,4000,'er');</script> <? } ?></div>
<form action="librerias/php/inser_iva.php" method="POST" name="user" onSubmit="return validacionpre(this);">
<table bgcolor="#CCCCCC" class="tabla" width="700">
<tr>
	<td valign="middle" colspan="2">Ingresa nuevo IVA</td>
</tr>
<tr align="left">
	<td align="right">Codigo:</td>	
	<td colspan="3" valign="middle">
    <input disabled="disabled" name="id" value="<?php echo $n;?>" type="text" size="10"></td>
</tr>
<tr align="left">
	<td align="right">Nuevo IVA:</td>	
	<td colspan="3" valign="middle"><input name="iva" type="text" size="15">
	&nbsp;Fecha de Inicio:
	<input name="ini" type="text" size="30" maxlength="12"></td>
</tr>
<tr align="left">
	<td align="right">&nbsp;</td>	
	<td colspan="3" valign="middle">Indique IVA con decimales. Ejemplo 0.12 o 0.09</td>
</tr>
<tr><td colspan="4" align="center">
	<input name="enviar" type="image" width="50" height="50" src="imagenes/guardar.png" value="1"></td>
</tr>
</table>
</form>
<p></p>
<center><table cellspacing="1" cellpadding="1">
  <thead><tr style="background:#3B78B1;">
    <th width="100">Codigo</th>
    <th width="150">IVA</th>
    <th width="150">Porcentaje</th>
  	<th width="200">Fecha de Inicio</th>    
  </tr>					
  </thead>
  <tbody ><?php echo $tb;?></tbody>
</table></center>
<div class="titulo" style="width:600px;">&nbsp;</div> <p> 
<?php echo $imp; ?>
</body>
</html>
