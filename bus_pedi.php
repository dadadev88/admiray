<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="pragma" content="no-cache">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="librerias/css/ventas.css" media="screen" type="text/css" rel="stylesheet" />
<link href="/programas/admiray/librerias/css/imp_presu.css" media="print" type="text/css" rel="stylesheet" />
<script language="javascript" type="text/javascript" src="librerias/js/presupuesto.js"></script>
<script language="javascript" type="text/javascript" src="librerias/js/scriptvalida3.js"></script>
<script language="javascript" type="text/javascript" src="librerias/js/scriptvalida4.js"></script>
<title>Admiray System</title>
</head>
<body>
<div class="titulo">Buscar Pedido(Reporte)</div> 
<form method="post" action="librerias/php/bus_pedi.php" name="presu"> 
<table width="900" align="center">
  <tr>
    <td><img src="imagenes/cyber ray.PNG" height="100" /> </td>
    <td align="center" valign="middle">Calle Paez C.C Marquez del Toro PB local 22. <br /> La Victoria Estado Aragua</td>
    <td valign="bottom">N&ordm; de Pedido:<input type="text" name="cod_enc_pre" align="right" value="<?php echo $_GET['cod'];?>"/>
     &nbsp;&nbsp; <input width="20" height="20" type="image" src="imagenes/camera_test.png"/></td>
  </tr>
  <tr>
    <td align="right"> &nbsp;Cedula/RIF:</td>
    <td align="left"> <?php echo $_GET['ced'];?>
    <td> Fecha: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_GET['fec'];?></td>
  </tr>
  <tr>
    <td align="right">Cliente:</td>
    <td align="left"><?php echo $_GET['nom'];?> &nbsp; <?php echo $_GET['ape'];?></td>
    <td rowspan="3"><div class="error" align="center" id="er" style="width:150px;">	
  	<?php if(isset($_GET["res"])){
	echo $_GET["res"];?><script>mostrar('er'); setTimeout(ocultar,4000,'er');</script> <? } ?></div> </td>
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
<hr width="800" />
<center>
<table width="680" cellspacing="1" cellpadding="1">
  <thead><tr style="background:#3B78B1;">
    <th width="230">Descipcion del producto</th>
    <th width="169">Cantidad Pedida</th>
    </thead>
	<tbody><?php echo $_GET["tb"];?></tbody>
	<tbody><?php echo $_GET["tb1"];?></tbody>
	<tbody><?php echo $_GET["tb2"];?></tbody>
</table>
<?php echo $_GET["imp"];?></center>
</form>
</body>
</html>