<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="librerias/css/ventas.css" media="screen" type="text/css" rel="stylesheet" />
<link href="librerias/css/imp_presu.css" media="print" type="text/css" rel="stylesheet" />
<script language="javascript" type="text/javascript" src="librerias/js/presupuesto.js"></script>
<script language="javascript" type="text/javascript" src="librerias/js/scriptvalida3.js"></script>
<script language="javascript" type="text/javascript" src="librerias/js/scriptvalida4.js"></script>
<title>Admiray System</title>
</head>
<body>
<?php
	include("librerias/php/adodb/adodb.inc.php");include("librerias/php/config.php");include("librerias/php/conex.php"); //$db->debug = true;
 	$rs=$db->Execute("SELECT * FROM empleado");	
		while (!$rs->EOF)
		{
		$tb.="<tr cellspacing=1 cellpadding=1>
				<td  border=1 align=center>".$rs->fields(0)."</td>
				<td  border=1 align=center>".$rs->fields(1)."</td>
				<td  border=1 align=center>".$rs->fields(2)."</td>
				<td  border=1 align=center>".$rs->fields(3)."</td>
				<td  border=1 align=center>".$rs->fields(4)."</td>
				<td  border=1 align=center>".$rs->fields(5)."</td>
				<td  border=1 align=center>".$rs->fields(6)."</td>
				<td  border=1 align=center>".$rs->fields(7)."</td>
  			</tr>";
			$rs->MoveNext();
		}
		$imp="<input type=image width=60 height=60 src=imagenes/Printer.png onclick=window.print(); class=imp>";
?>
<?php 
include("librerias/php/adodb/adodb.inc.php");include("librerias/php/config.php");include("librerias/php/conex.php");//$db->debug = true;
	$rs=$db->Execute("SELECT cod_emp FROM empleado ORDER BY cod_emp DESC");	
		if ($rs->RowCount()>0){$n=$rs->fields(0)+1;}
		else{ $n=1;} 
?>
<div class="titulo">Usuarios del Sistema</div> <p>
<div class="error" align="center" id="er" style="width:300px;">	
  	<?php if(isset($_GET["res"])){
	echo $_GET["res"];?><script>mostrar('er'); setTimeout(ocultar,4000,'er');</script> <? } ?></div>
<form action="librerias/php/inser_user.php" method="POST" name="user" onSubmit="return validacionpre(this);">
<table bgcolor="#CCCCCC" class="tabla" width="700">
<tr>
	<td valign="middle" colspan="2">Datos del Empleado</td>
</tr>
<tr align="left">
	<td align="right">Codigo:</td>	
	<td colspan="3" valign="middle">
    <input disabled="disabled" name="com_emp" value="<?php echo $n;?>" type="text" size="10">
	  Cedula:
	  <input name="ced_emp" type="text" size="30" maxlength="10"></td>
</tr>
<tr align="left">
	<td align="right">Nombre Completo:</td>	
	<td colspan="3" valign="middle"><input name="nom_emp" type="text" size="30">
	&nbsp;Telefono:<input name="telf_emp" type="text" onKeyPress="return valida2(event);" size="30" maxlength="12"></td>
</tr>
<tr>
	<td align="right" valign="middle"></td>
	<td colspan="3" align="left" valign="middle"></td>
</tr>
<tr>
	<td align="right" valign="middle">Email:</td>
	<td colspan="3" align="left" valign="middle"><input name="email_emp" type="text" size="40" maxlength="30"></td>
</tr>
<tr>
	<td valign="middle" colspan="2">Datos para usar en Sistema</td>
</tr>
<tr>
	<td align="right" valign="middle">Nombre de Usuario:</td>
	<td colspan="3" align="left" valign="middle">
	<input name="user" type="text" size="15" maxlength="10"> 
	&nbsp; Contraseña:<input name="pass" type="text" size="15" maxlength="10">&nbsp;
    Nivel:<select name="nu">
    			<option>1</option>
                <option>2</option>
                <option>3</option>
          </select>
    </td>
</tr>
<tr>
	<td align="right" valign="middle"></td>
	<td colspan="3" align="left" valign="middle"></td>
</tr>
<tr><td colspan="4" align="center">
	<input name="enviar" type="image" width="50" height="50" src="imagenes/guardar.png" value="1"></td>
</tr>
</table>
</form><br />
Niveles: 1.-Administrador 2.-Gerente 3.-Comprador/Vendedor
<p></p>
<center><table width="900" cellspacing="1" cellpadding="1">
  <thead><tr style="background:#3B78B1;">
    <th width="123">Codigo</th>
    <th width="130">Cedula</th>
    <th width="87">Nombre Completo</th>
  	<th width="79">Correo Electronico</th>
    <th width="83">Telefono</th>	
  	<th width="81">Nombre de Usuario</th>
	<th width="84">Contraseña de Usuario</th>
	<th width="84">Nivel de Usuario</th>    
  </tr>					
  </thead>
  <tbody ><?php echo $tb;?></tbody>
</table></center>
<div class="titulo" style="width:900px;">&nbsp;</div> <p> 
<?php echo $imp; ?>
</body>
</html>
