<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="librerias/css/ventas.css" media="screen" type="text/css" rel="stylesheet" />
<script language="javascript" type="text/javascript" src="librerias/js/factura.js"></script>
<script language="javascript" type="text/javascript" src="librerias/js/scriptvalida3.js"></script>
<script language="javascript" type="text/javascript" src="librerias/js/scriptvalida4.js"></script>
<title>Admiray System</title>
</head>
<body>
<?php 
include("librerias/php/adodb/adodb.inc.php");include("librerias/php/config.php");include("librerias/php/conex.php");//$db->debug = true;
	$rs=$db->Execute("SELECT `cod_enc_fac` FROM `encab_fac` ORDER BY `cod_enc_fac` DESC");	
		if ($rs->RowCount()>0){$n=$rs->fields(0)+1;}
		else{ $n=1;} 
?>
<div class="titulo" > Factura </div> 
<form method="post" action="librerias/php/inser_fac.php" name="fact" > 
<table width="900" align="center">
  <tr>
    <td colspan="2"><img src="imagenes/cyber ray.PNG" height="100" /> Calle Paez C.C Marquez del Toro PB local 22. La Victoria Estado Aragua</td>
    <td valign="bottom">
    Nº de Presupuesto:<input type="text" name="cod_pre" align="right" size="10" onKeyPress="return valida7(event);"/>&nbsp;
    <img src="imagenes/Search.png" width="20" height="20" style="border:0" onclick="javascript:buspre();" /><p>
    Nº de Factura:<input disabled="disabled" type="text" name="cod_enc_fac" align="right" value="<?php echo $n;?>"/><p>
    Fecha:<input disabled="disabled" type="text" name="fec_enc_fac" align="right" value="<? echo date ( "d/m/Y" );?>"/>
    </td>
  </tr>
  <tr>
    <td align="right">Cedula/RIF:</td>
    <td align="left"><input name="cod_cli" type="text" size="15" maxlength="12" align="right" value="<?php echo $_GET['cod'];?>" />&nbsp;<input width="20" height="20" type="image" src="imagenes/camera_test.png"/><a href="verclientes.php" target="_blank"> <img src="imagenes/Search.png" width="20" height="20" style="border:0" title="Ver lista de clientes"/>  </a></td>
    <td>Forma de pago: <select name="cond">
       					<option value="0">Seleccione una</option>
    					<option>Contado</option>
                        <option>Credito</option>
                        </select><p>
				Vendedor:<input type="text" name="vendedor" align="right" size="20" onKeyPress="return valida7(event);"/>
    </td>
  </tr>
  <tr>
    <td align="right">Cliente:</td>
    <td align="left"><input disabled="disabled" name="nom_cli" type="text" size="30" maxlength="50" value="<?php echo $_GET['nom'];?>"/></td>
    <td rowspan="3" align="center" valign="middle"><div class="error" align="center" id="er" style="width:150px;">	
  	<?php if(isset($_GET["res"])){
	echo $_GET["res"];?><script>mostrar('er'); setTimeout(ocultar,4000,'er');</script> <? } ?></div> </td>
  </tr>
  <tr>
    <td align="right">Direccion:</td>
    <td align="left"><textarea disabled="disabled" name="dir_cli" cols="50"><?php echo $_GET['dir'];?></textarea></td>
    </tr>
  <tr>
    <td align="right">Telefono:</td>
    <td align="left"><input disabled="disabled" name="telf_cli" type="text" size="30" maxlength="12" value="<?php echo $_GET['telf'];?>"/></td>
    </tr>
</table>
<br /><hr width="900" />
<center><table width="600" cellspacing="1" cellpadding="1">
  <tr>
    <td width="59"><label>Producto:</label></td>
    <td width="250"><select name="pro"><?php echo $_GET['mes'];?></select></td>
    <td width="150">Cantidad<input type="text" name="cant" onKeyPress="return valida7(event);" size="10" /></td>
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
<img width="50" height="50" src="imagenes/guardar.png" onclick="javascript:inser();">
</center>
</form>
</body>
</html>