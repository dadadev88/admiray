<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="pragma" content="no-cache">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="librerias/css/ventas.css" media="screen" type="text/css" rel="stylesheet" />
<link href="librerias/css/imp_presu.css" media="print" type="text/css" rel="stylesheet" />
<script language="javascript" type="text/javascript" src="librerias/js/presupuesto.js"></script>
<script language="javascript" type="text/javascript" src="librerias/js/scriptvalida3.js"></script>
<script language="javascript" type="text/javascript" src="librerias/js/scriptvalida4.js"></script>
<title>Admiray System</title>
</head>
<body>
<?php 
include("librerias/php/adodb/adodb.inc.php");include("librerias/php/config.php");include("librerias/php/conex.php");//$db->debug = true;
	$rs=$db->Execute("SELECT `cod_encab_pre` FROM `encab_pre` ORDER BY `cod_encab_pre` DESC");	
		if ($rs->RowCount()>0){$n=$rs->fields(0)+1;}
		else{ $n=1;} 
?>
<div class="titulo">Presupuesto</div> 
<form method="post" action="librerias/php/inser_presu.php" name="presu"> 
<table width="900" align="center">
  <tr>
    <td><img src="imagenes/cyber ray.PNG" height="100" /> </td>
    <td align="center" valign="middle">Calle Paez C.C Marquez del Toro PB local 22. <br /> La Victoria Estado Aragua</td>
    <td valign="bottom">
      N&ordm; de Presupuesto:<input disabled="disabled" type="text" name="cod_enc_pre" align="right" value="<?php echo $n;?>"/></td>
  </tr>
  <tr>
    <td align="right"> &nbsp;Cedula/RIF:</td>
    <td align="left"> 
	<!--select><option></option></select-->
    <input name="cod_cli" type="text" size="15" maxlength="12" align="right" value="<?php echo $_GET['cod'];?>" />
    &nbsp;&nbsp;
    <input width="20" height="20" type="image" src="imagenes/camera_test.png"/> <a href="verclientes.php" target="_blank"> <img src="imagenes/Search.png" width="20" height="20" style="border:0" title="Ver lista de clientes"/>  </a>
    
    <td> Fecha: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input disabled="disabled" type="text" name="fec_enc_pre" align="right" value="<? echo date ( "d/m/Y" );?>"/>  </td>
  </tr>
  <tr>
    <td align="right">Cliente:</td>
    <td align="left"><input name="nom_cli" type="text" size="30" maxlength="50" value="<?php echo $_GET['nom'];?> &nbsp; <?php echo $_GET['ape'];?>" disabled="disabled"/></td>
    <td rowspan="3"><div class="error" align="center" id="er" style="width:150px;">	
  	<?php if(isset($_GET["res"])){
	echo $_GET["res"];?><script>mostrar('er'); setTimeout(ocultar,6000,'er');</script> <? } ?></div> </td>
  </tr>
  <tr>
    <td align="right">Direccion:</td>
    <td align="left"><textarea name="dir_cli" cols="50" disabled="disabled"><?php echo $_GET['dir'];?></textarea></td>
    </tr>
  <tr>
    <td align="right">Telefono:</td>
    <td align="left"><input disabled="disabled" name="telf_cli" type="text" size="30" maxlength="12" value="<?php echo $_GET['telf'];?>" /></td>
    </tr>
</table>
<br /><hr width="900" />
<center><table width="600" cellspacing="1" cellpadding="1">
  <tr>
    <td width="59">Producto:</td>
    <td width="250"><select name="pro"><?php echo $_GET['mes'];?></select></td>
    <td width="150">Cantidad:<input name="cant" type="text" onKeyPress="return valida7(event);" size="10"/></td>
    <td width="50"><img src="imagenes/boton_agregar.png" width="30" title="Agregar producto" onclick="javascript:val();" /></td>
    </tr>
</table>
<table width="680" cellspacing="1" cellpadding="1">
  <thead><tr style="background:#3B78B1;">
    <th width="230">Descipcion del producto</th>
    <th width="169">Cantidad </th>
  	<th width="150">Costo</th>	
  	<th width="116">Sub total</th></tr>					
  </thead>
  <tbody><?php echo $_GET["tb"];?></tbody>
  <tbody><?php echo $_GET["tb1"];?></tbody>
  <tbody><?php echo $_GET["tb2"];?></tbody>
</table>
<?php echo ($_GET["gdr"]);?></center>
</form>
</body>
</html>
