<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="pragma" content="no-cache">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link media="screen" rel="stylesheet" href="librerias/css/clientes.css" type="text/css"/>
<script language="javascript" type="text/javascript" src="librerias/js/scriptvalida3.js"></script>
<script language="javascript" type="text/javascript" src="librerias/js/scriptvalida4.js"></script>

<title>Admiray System</title>
</head>
<body>
<?php
	include("librerias/php/adodb/adodb.inc.php");include("librerias/php/config.php");include("librerias/php/conex.php"); //$db->debug = true;
 	$rs=$db->Execute("SELECT * FROM clientes");	
		while (!$rs->EOF)
		{
		$tb.="<tr>
				<td  border=1 align=center>".$rs->fields(0)."</td>
				<td  border=1 align=center>".$rs->fields(1)."</td>
				<td  border=1 align=center>".$rs->fields(2)."</td>
				<td  border=1 align=center>".$rs->fields(3)."</td>
				<td  border=1 align=center>".$rs->fields(4)."</td>
			</tr>";
			$rs->MoveNext();
		}
?>
<div class="titulo">Busqueda de Clientes</div>
<p>&nbsp;</p>
<div align="center" class="error"id="er">
<?php if(isset($_GET["res"])){echo $_GET["res"];?><script>mostrar('er'); setTimeout(ocultar,5000,'er');</script> <? } ?></div>	
<p>
<center><form action="librerias/php/bus_cliente.php" method="post">
<table>
  <tr>
    <td>
Inserte Cedula o RIF:<input name="ced_cli" type="text" size="20" onKeyPress="return valida4(event);" maxlength="12">&nbsp;&nbsp;
<input type="image" src="imagenes/Search.png" width="30" height="30"/></td>
  </tr>
</table>
</form><p>
<table width="800"  cellspacing="0" cellpadding="0">
		<tr style="background:#3B78B1;">
			<td align="center">Cedula O RIF</td>
			<td align="center">Nombre Completo</td>
			<td align="center">Direccion</td>
			<td align="center">Telefono</td>
			<td align="center">Email</td>
		</tr>
<tbody><?php echo $_GET["la"];?></tbody>
</table></center><p>
<hr width="800" />
<div class="titulo" style="width:700px;">Lista de Clientes</div> <p>
<center><table cellspacing="1" cellpadding="1">
  <thead><tr style="background:#3B78B1;">
    <th width="123">Cedula</th>
    <th width="200">Nombre Completo</th>
    <th width="400">Direccion</th>
  	<th width="150">Telefono</th>
    <th width="150">Email</th>	
   </tr>					
  </thead>
  <tbody ><?php echo $tb;?></tbody>
</table>     
</body>
</html>
