<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="pragma" content="no-cache">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link media="screen" rel="stylesheet" href="librerias/css/login.css" type="text/css"/>
<script language="javascript" src="librerias/js/login.js" type="text/javascript"></script>
<title>Admiray System</title>
</head>
<body>
<div class="ani">
  <!-- <object classid= "clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=4,0,0,0" id="HTMLQuick" width="1020" height="100">
    <param name="movie" value="multimedia/Usuarios.swf"/>
    <param name="quality" value="high"/>
    <embed  src="multimedia/Usuarios.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="1020" height="100"></embed>
  </object></div> -->
  <br />
<div class="titulo">Login de Usuario</div><br />
<table class="tabla">
  <tr align="center" valign="middle">
    <td>...Bienvenidos a Admiray System...<br />
    <img src="Imagenes/cyber ray.PNG" /></td>
    <td><div align="center" class="error" id="er"><img src="imagenes/eliminar.png" width="15" height="15"/>
  	<?php if(isset($_GET["res"])){
	echo $_GET["res"];?><script>mostrar('er'); setTimeout(ocultar,5000,'er');</script> <? } ?></div>
    <br />
	<form action="librerias/php/acceso.php" method='POST'>
    <table width="270" bgcolor="#CCCCCC">
	<tr>
		<td width="317" align='right'>Nombre de usuario:<input type='text' size='20' maxlength='25' name='username'></td>
	</tr>
	<tr>
		<td align='right'>Password: <input type='password' size='20' maxlength='25' name='password'></td>
	</tr>
	<tr>
	<td height="30" align='center' valign="middle"><input type="image" src="imagenes/ok.png" width="30" height="30"/>&nbsp;</td>
	</tr>
	<tr><td align='center'></td></tr>
	</table>
</form><br />
</td>
  </tr>
</table><br />
<div class="titulo">&nbsp;</div>
</body>
</html>
