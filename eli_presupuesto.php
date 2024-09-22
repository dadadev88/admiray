<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link media="screen" rel="stylesheet" href="librerias/css/login.css" type="text/css"/>
<link media="screen" rel="stylesheet" href="librerias/css/proveedor.css" type="text/css"/>
<script language="javascript" type="text/javascript" src="librerias/js/scriptvalida3.js"></script>
<script language="javascript" type="text/javascript" src="librerias/js/scriptvalida4.js"></script>
<script language="javascript" src="librerias/js/login.js" type="text/javascript"></script>
<title>AdmiRay System</title>
</head>

<body>

<div class="titulo">Eliminar Presupuesto </div>
<br>
<div align="center" class="error" id="er">
<?php if(isset($_GET["res"])){echo $_GET["res"];?><script>mostrar('er'); setTimeout(ocultar,5000,'er');</script> <? } ?>
</div><br>
<form action="librerias/php/eli_cliente.php" method="post">
  Inserte  Codigo:<input name="cod_presu" type="text" maxlength="12">&nbsp;&nbsp;
<input type="image" src="imagenes/eliminar.png" width="30" height="30"/>	
</form>
</body>
</html>