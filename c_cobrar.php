<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="pragma" content="no-cache">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="librerias/css/ventas.css" media="screen" type="text/css" rel="stylesheet" />
<script language="javascript" type="text/javascript" src="librerias/js/abono.js"></script>
<script language="javascript" type="text/javascript" src="librerias/js/scriptvalida3.js"></script>
<script language="javascript" type="text/javascript" src="librerias/js/scriptvalida4.js"></script>
<title>Admiray System</title>
</head>
<body>
<?php 
include("librerias/php/adodb/adodb.inc.php");include("librerias/php/config.php");include("librerias/php/conex.php"); //$db->debug = true;
	$rs=$db->Execute("SELECT id FROM abonoventa ORDER BY id DESC");	
	if ($rs->RowCount()>0){$n=$rs->fields(0)+1;}else{ $n=1;} 
?>
<div class="titulo">Abono a Factura (Cuenta por Cobrar)</div> 
<form method="post" action="librerias/php/abono_fact.php" name="abon"> 
<table width="900" align="center">
  <tr>
    <td><img src="imagenes/cyber ray.PNG" height="100" /> </td>
    <td align="center" valign="middle">Calle Paez C.C Marquez del Toro PB local 22. <br /> La Victoria Estado Aragua</td>
    <td valign="bottom">
Nº de Factura:
<input name="cod_fact" type="text" size="10" align="right" value="<?php echo $_GET['codfac'];?>" onKeyPress="return valida7(event);" />&nbsp;<input width="20" height="20" type="image" src="imagenes/camera_test.png"/><p>
Nº de Abono:<input name="cod_abono" type="text" size="10" align="right" value="<?php echo $n;?>" disabled="disabled"/>
     </td>
  </tr>
  <tr>
    <td align="right"> Cliente:</td>
    <td align="left"><input name="cod_cli" type="text" size="15" align="right" value="<?php echo $_GET['codcli'];?>" onKeyPress="return valida7(event);" />
     </td>
    <td>Fecha:<? echo date ( "d/m/Y" );?>
     </td>
  </tr>
  <tr>
    <td align="right">Nombre Completo:</td>
    <td align="left"><?php echo $_GET['nom'];?></td>
    <td rowspan="3" align="center">
    <div class="error" align="center" id="er" style="width:300px;">	
  	<?php if(isset($_GET["res"])){
	echo $_GET["res"];?><script>mostrar('er'); setTimeout(ocultar,5000,'er');</script> 
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
    <td align="right" width="84">Total:</td>
    <td align="left" width="397">
    <input disabled="disabled" name="total" type="text" size="20" value="<?php echo $_GET['total'];?>" />
    Debe:<input disabled="disabled" name="resta2" type="text" size="20" value="<?php echo $_GET['debe'];?>" /></td>
  </tr>
  <tr>
<td width="84" align="right">&nbsp;</td>
<td width="400" align="left">&nbsp;</td>
</tr>
  <tr>
<td width="84" align="right"> Abono:</td>
<td width="397" align="left">&nbsp;
  <input name="abono" type="text" size="20" value="<?php echo $_GET['abono'];?>"/>
Resta:
<input disabled="disabled" name="resta" type="text" size="20" value="<?php echo $_GET['resta'];?>" /></td>
</tr>
<tr>
<td width="84" align="right">&nbsp;</td>
<td width="400" align="left">Si la cifra posse decimales. Indique con punto (.)</td>
</tr>
</table>
<br />
<?php echo $_GET['guar'];?>
</form>
</body>
</html>