<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link media="screen" rel="stylesheet" href="librerias/css/login.css" type="text/css"/>
<link media="screen" rel="stylesheet" href="librerias/css/proveedor.css" type="text/css"/>
<script language="javascript" type="text/javascript" src="librerias/js/scriptvalida3.js"></script>
<script language="javascript" type="text/javascript" src="librerias/js/scriptvalida4.js"></script>
<script language="javascript" src="librerias/js/login.js" type="text/javascript"></script>
<title>AdmiRay System</title>
</head>
<body>
<?php
	include("librerias/php/adodb/adodb.inc.php");include("librerias/php/config.php");include("librerias/php/conex.php"); //$db->debug = true;
 	$rs=$db->Execute("SELECT * FROM proveedor");	
		while (!$rs->EOF)
		{
		$tb.="<tr>
				<td  border=1 align=center>".$rs->fields(0)."</td>
				<td  border=1 align=center>".$rs->fields(1)."</td>
				<td  border=1 align=center>".$rs->fields(2)."</td>
				<td  border=1 align=center>".$rs->fields(3)."</td>
				<td  border=1 align=center>".$rs->fields(4)."</td>
				<td  border=1 align=center>".$rs->fields(5)."</td>
			</tr>";
			$rs->MoveNext();
		}
?>
<div class="titulo">Busqueda de Proveedor</div>
<br>
<div align="center" class="error" id="er">
<?php if(isset($_GET["res"])){echo $_GET["res"];?><script>mostrar('er'); setTimeout(ocultar,5000,'er');</script> <? } ?>
	</div><br>
<form action="librerias/php/bus_proveedor.php" method="post">
Inserte RIF de proveedor:<input name="rif_prov" type="text"> &nbsp;&nbsp;
<input type="image" src="imagenes/Search.png" width="30" height="30" />
</form><p>
<center>
<table width="800" cellspacing="0" cellpadding="0">
		<tr style="background:#3B78B1;">
			<td align="center">RIF</td>
			<td align="center">Nombre</td>
			<td align="center">Direccion</td>
			<td align="center">Telefono</td>
			<td align="center">Persona contacto</td>
			<td align="center">Email</td>
		</tr>
        <tbody><?php echo $_GET["la"];?></tbody>
</table></center><p>
<hr width="800" />
<div class="titulo" style="width:700px;">Lista de Proveedores</div><br />
<table cellspacing="1" cellpadding="1">
		<tr style="background:#3B78B1;">
			<td align="center" width="100">RIF</td>
			<td align="center" width="150">Nombre</td>
			<td align="center" width="300">Direccion</td>
			<td align="center" width="150">Telefono</td>
			<td align="center" width="150">Persona contacto</td>
			<td align="center" width="200">Email</td>
		</tr>
        <tbody><?php echo $tb;?></tbody>
</table>
</body>
</html>
