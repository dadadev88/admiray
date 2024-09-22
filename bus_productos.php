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
 	$rs=$db->Execute("SELECT * FROM productos");	
		while (!$rs->EOF)
		{
		$tb.="<tr>
				<td  border=1 align=center>".$rs->fields(0)."</td>
				<td  border=1 align=center>".$rs->fields(1)."</td>
				<td  border=1 align=center>".$rs->fields(2)."</td>
				<td  border=1 align=center>".$rs->fields(3)."</td>
				<td  border=1 align=center>".$rs->fields(4)."</td>
				<td  border=1 align=center>".$rs->fields(5)."</td>
				<td  border=1 align=center>".$rs->fields(6)."</td>
  			</tr>";
			$rs->MoveNext();
		}
?>
<div class="titulo">Busqueda de Producto</div>
<br>
<div align="center" class="error" id="er">
<?php if(isset($_GET["res"])){echo $_GET["res"];?><script>mostrar('er'); setTimeout(ocultar,5000,'er');</script> <? } ?>
	</div><br>
<form action="librerias/php/bus_producto.php" method="post">
Inserte Codigo del Producto:
  <input name="cod_pro" type="text">&nbsp;&nbsp;
<input type="image" src="imagenes/Search.png" width="30" height="30" />
</form><p>
<center><table width="800" cellspacing="0" cellpadding="0">
		<tr style="background:#3B78B1;">
			<td align="center">Codido del producto</td>
			<td align="center">Descripcion</td>
			<td align="center">Precio</td>
			<td align="center">Costo</td>
			<td align="center">Cantidad</td>
   			<td align="center">Stock Minimo</td>
		</tr>
        <tbody><?php echo $_GET["la"];?></tbody>
</table></center><p><p>
<hr width="800" />
<div class="titulo" style="width:700px;">Stock de Productos</div> <p>
<center><table width="691" cellspacing="1" cellpadding="1">
  <thead><tr style="background:#3B78B1;">
    <th width="123">Codigo del producto</th>
    <th width="130">Descipcion del producto</th>
    <th width="87">Precio</th>
  	<th width="79">Costo</th>
    <th width="83">Cantidad</th>	
  	<th width="81">Stock Minino</th>
	<th width="84">Stock Maximo</th>
  </tr>					
  </thead>
  <tbody ><?php echo $tb;?></tbody>
</table></center>
<div class="titulo" style="width:670px;">&nbsp;</div> <p> 
</body>
</html>
