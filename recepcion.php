<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="pragma" content="no-cache">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="librerias/css/ventas.css" media="screen" type="text/css" rel="stylesheet" />
<script language="javascript" type="text/javascript" src="librerias/js/recepcion.js"></script>
<script language="javascript" type="text/javascript" src="librerias/js/scriptvalida3.js"></script>
<script language="javascript" type="text/javascript" src="librerias/js/scriptvalida4.js"></script>
<title>Admiray System</title>
</head>
<body>
<?php 
include("librerias/php/adodb/adodb.inc.php");include("librerias/php/config.php");include("librerias/php/conex.php");//$db->debug = true;
	$rs=$db->Execute("SELECT cod_encab_recep FROM encab_recep ORDER BY cod_encab_recep DESC");	
		if ($rs->RowCount()>0){$n=$rs->fields(0)+1;}
		else{ $n=1;} 
?>
<div class="titulo">Recepcion de Mercancia</div> 
<form method="post" action="librerias/php/inser_rece.php" name="recep"> 
<table width="900" align="center">
  <tr>
    <td><img src="imagenes/cyber ray.PNG" height="100" /> </td>
    <td align="center" valign="middle">Calle Paez C.C Marquez del Toro PB local 22. <br /> La Victoria Estado Aragua</td>
    <td valign="bottom">
	N&ordm; de Orden de Compra:<input name="codor" type="text" size="10" align="right" />
	&nbsp;<input width="20" height="20" type="image" src="imagenes/camera_test.png" /><br /> 
	N&ordm; de Recepcion:<input disabled="disabled" name="nrecep" type="text" size="10" align="right" value="<?php echo $n; ?>" /></td>
  </tr>
  <tr>
    <td align="right"> &nbsp;RIF Proveedor:</td>
    <td align="left"> 
	<!--select><option></option></select-->
<input name="rif_prov" type="text" size="15" maxlength="50" align="right" value="<?php echo $_GET['rif'];?>" />
          </td>
    <td> Fecha:<input disabled="disabled" type="text" name="fec_enc_ord_comp" align="right" value="<?  echo date ( "d/m/Y" );?>"/></td>
  </tr>
  <tr>
    <td align="right">Nombre:</td>
    <td align="left"><input name="nom_prov" type="text" size="30" maxlength="50" value="<?php echo $_GET['nom'];?>" disabled="disabled"/></td>
    <td rowspan="3"><div class="error" align="center" id="er" style="width:150px;">	
  	<?php if(isset($_GET["res"])){
	echo $_GET["res"];?><script>mostrar('er'); setTimeout(ocultar,5000,'er');</script> <? } ?></div> </td>
  </tr>
  <tr>
    <td align="right">Direccion:</td>
    <td align="left"><textarea name="direc_prov" cols="50" disabled="disabled"><?php echo $_GET['dir'];?></textarea></td>
    </tr>
  <tr>
    <td align="right">Telefono:</td>
    <td align="left"><input disabled="disabled" name="telf_prov" type="text" size="30" maxlength="12" value="<?php echo $_GET['telf'];?>" />&nbsp;</td>
  </tr>
</table>
<center><table width="680" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td width="59"><label>Producto:</label></td>
    <td width="158"><select name="pro"><?php echo $_GET['mes'];?></select></td>
    <td width="150">Cantidad recibida:<input name="cant" type="text" size="8" onKeyPress="return valida7(event);"/></td>
    <td width="51" align="center"><img src="imagenes/boton_agregar.png" width="30" title="Agregar producto" onclick="javascript:val();" /></td>
  </tr>
</table>
<table width="680" cellspacing="1" cellpadding="1" >
  <thead class="ct"><tr style="background:#3B78B1;">
    <th >Descipcion del producto</th>
    <th >Cantidad Recibida </th>
  	</thead>
<tbody><?php echo $_GET["tb"];?></tbody>
<tbody><?php echo $_GET["tb1"];?></tbody>
</table><?php echo $_GET["img"];?>
</center>
</form>
</body>
</html>