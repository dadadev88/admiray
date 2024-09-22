<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="pragma" content="no-cache">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="librerias/css/ventas.css" media="screen" type="text/css" rel="stylesheet" />
<script language="javascript" type="text/javascript" src="librerias/js/scriptvalida3.js"></script>
<script language="javascript" type="text/javascript" src="librerias/js/scriptvalida4.js"></script>
<title>Admiray System</title>
</head>
<body>
<?php 
include("librerias/php/adodb/adodb.inc.php");include("librerias/php/config.php");include("librerias/php/conex.php"); //$db->debug = true;
	$rs=$db->Execute("SELECT `cod_ord_comp` FROM `enc_ord_comp` ORDER BY `cod_ord_comp` DESC");	
		if ($rs->RowCount()>0){$noc=$rs->fields(0)+1;}
		else{ $noc=1;} 
?>
<div class="titulo">Abono a Factura (Cuenta por Cobrar)</div> 
<form method="post" action="librerias/php/bus_abono.php" name="abon"> 
<table width="900" align="center">
  <tr>
    <td><img src="imagenes/cyber ray.PNG" height="100" /> </td>
    <td align="center" valign="middle">Calle Paez C.C Marquez del Toro PB local 22. <br /> La Victoria Estado Aragua</td>
    <td valign="bottom">
Nº de Abono:
<input name="cod_abono" type="text" size="10" align="right" value="<?php echo $_GET['codfac'];?>" onKeyPress="return valida7(event);" />&nbsp;<input width="20" height="20" type="image" src="imagenes/camera_test.png"/>
     </td>
  </tr>
  <tr>
    <td align="right"> Cliente:</td>
    <td align="left"><?php echo $_GET['ced'];?></td>
    <td>Fecha:<? echo $_GET['fec'];;?>
     </td>
  </tr>
  <tr>
    <td align="right">Nombre Completo:</td>
    <td align="left"><?php echo $_GET['nom'];?></td>
    <td rowspan="3" align="center">
    <div class="error" align="center" id="er" style="width:150px;">	
  	<?php if(isset($_GET["res"])){
	echo $_GET["res"];?><script>mostrar('er'); setTimeout(ocultar,3000,'er');</script> 
  	<? } ?></div>    
    </td>
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
<hr width="700" />
<table align="center">
  <tr>
    <td align="right" width="150">Total:</td>
    <td align="left" width="200"><?php echo $_GET['total'];?>&nbsp;Bs.F</td>
  </tr>
  <tr>
<td width="150" align="right">Abono Realizado:</td>
<td width="200" align="left"><?php echo $_GET['abono'];?>&nbsp;Bs.F</td>
</tr>
  <tr>
<td width="150" align="right"> Resta:</td>
<td width="200" align="left"><?php echo $_GET['resta'];?>&nbsp;Bs.F</td>
</tr>
</table>
<br />
<?php echo $_GET['imp'];?>
</form>
</body>
</html>