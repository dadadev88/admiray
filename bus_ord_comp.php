<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="librerias/css/ventas.css" media="screen" type="text/css" rel="stylesheet" />
<script language="javascript" type="text/javascript" src="librerias/js/scriptvalida3.js"></script>
<script language="javascript" type="text/javascript" src="librerias/js/scriptvalida4.js"></script>
<title>Admiray System</title>
</head>
<body>
<div class="titulo">Orden de Compra</div>
<form method="post" action="librerias/php/bus_ord_comp.php" name="presu"> 
<table width="900" align="center">
  <tr>
    <td><img src="imagenes/cyber ray.PNG" height="100" /> </td>
    <td align="center" valign="middle">Calle Paez C.C Marquez del Toro PB local 22. <br /> 
    La Victoria Estado Aragua</td>
    <td valign="bottom">
Nº de Orden de Compra:
  <input name="cod_ord_comp" type="text" size="10" align="right"/>&nbsp;<input width="20" height="20" type="image" src="imagenes/camera_test.png"/>
	</td>
  </tr>
  <tr>
    <td align="right">RIF Proveedor:</td>
    <td align="left"><?php echo $_GET['rif'];?>	
    </td>
    <td> Fecha:<?php echo $_GET['fec'];?></td>
  </tr>
  <tr>
    <td align="right">Nombre:</td>
    <td align="left"><?php echo $_GET['nom'];?></td>
    <td rowspan="3" align="center"><div class="error" align="center" id="er" style="width:150px;">	
  	<?php if(isset($_GET["res"])){
	echo $_GET["res"];?><script>mostrar('er'); setTimeout(ocultar,5000,'er');</script> <? } ?></div></td>
  </tr>
  <tr>
    <td align="right">Direccion:</td>
    <td align="left"><?php echo $_GET['dir'];?></td>
    </tr>
  <tr>
    <td align="right">Telefono:</td>
    <td align="left"><?php echo $_GET['telf'];?></td>
    </tr>
</table>
<center>
<table width="680" cellspacing="1" cellpadding="1" >
  <thead class="ct"><tr style="background:#3B78B1;">
    <th width="230">Descipcion del producto</th>
    <th width="169">Cantidad </th>
  </thead>
  <tbody><?php echo $_GET["tb"];?></tbody>
</table>
<?php echo $_GET["imp"];?></center>
</form>
</body>
</html>