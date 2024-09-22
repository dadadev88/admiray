<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="librerias/css/ventas.css" media="screen" type="text/css" rel="stylesheet" />
<script language="javascript" type="text/javascript" src="librerias/js/pedido.js"></script>
<script language="javascript" type="text/javascript" src="librerias/js/scriptvalida3.js"></script>
<script language="javascript" type="text/javascript" src="librerias/js/scriptvalida4.js"></script>
<title>Admiray System</title>
</head>
<body>
<?php 
include("librerias/php/adodb/adodb.inc.php");include("librerias/php/config.php");include("librerias/php/conex.php");//$db->debug = true;
	$rs=$db->Execute("SELECT `cod_encab_ped` FROM `encab_ped` ORDER BY `cod_encab_ped` DESC");	
		if ($rs->RowCount()>0){$n=$rs->fields(0)+1;}
		else{ $n=1;} 
?>
<div class="titulo" > Pedido </div> 
<form name="pedi" method="post" action="librerias/php/inser_ped.php"> 
<table width="900" align="center">
  <tr>
    <td><img src="imagenes/cyber ray.PNG" height="100" /></td>
    <td align="center"> Calle Paez C.C Marquez del Toro PB local 22. <br />La Victoria Estado Aragua</td>
    <td valign="bottom">Nº de Pedido:<input disabled="disabled" type="text" name="cod_enc_fac" align="right" value="<?php echo $n;?>"/></td>
  </tr>
  <tr>
    <td align="right">Cedula/RIF:</td>
    <td align="left"> <input name="cod_cli" type="text" size="15" maxlength="12" align="right" value="<?php echo $_GET['cod'];?>" />&nbsp;
    <input width="20" height="20" type="image" src="imagenes/camera_test.png"/><a href="verclientes.php" target="_blank"> <img src="imagenes/Search.png" width="20" height="20" style="border:0" title="Ver lista de clientes"/>  </a></td>
    <td> Fecha: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input disabled="disabled" type="text" name="fec_enc_fac" align="right" value="<? echo date ( "d/m/Y" );?>" /></td>
  </tr>
  <tr>
    <td align="right">Cliente:</td>
    <td align="left"><input disabled="disabled" name="nom_cli" type="text" size="30" maxlength="50" value="<?php echo $_GET['nom'];?>"/></td>
    <td rowspan="3"><div class="error" align="center" id="er" style="width:150px;">	
  	<?php if(isset($_GET["res"])){
	echo $_GET["res"];?><script>mostrar('er'); setTimeout(ocultar,4000,'er');</script> <? } ?></div></td>
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
<center><table width="680" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td width="59"><label>Producto:</label></td>
    <td width="158"><select name="pro"><?php echo $_GET['mes'];?></select></td>
    <td width="150">Cantidad a pedir:
      <input name="cant" type="text" size="8" onKeyPress="return valida7(event);"/></td>
    <td width="51" align="center"><img src="imagenes/boton_agregar.png" width="30" title="Agregar producto" onclick="javascript:val();" /></td>
  </tr>
</table>
<table width="680" cellspacing="1" cellpadding="1" >
  <thead class="ct"><tr style="background:#3B78B1;">
    <th >Descipcion del producto</th>
    <th >Cantidad a pedir</th>
  	</thead>
<tbody><?php echo $_GET["tb"];?></tbody>
<tbody><?php echo $_GET["tb1"];?></tbody>
</table><img width="50" height="50" src="imagenes/guardar.png" onclick="javascript:inser();"></center>
</form>
</body>
</html>