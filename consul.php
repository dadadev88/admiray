<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="librerias/css/ventas.css" media="screen" type="text/css" rel="stylesheet" />
<script language="javascript" type="text/javascript" src="librerias/js/presupuesto.js"></script>
<script language="javascript" type="text/javascript" src="librerias/js/scriptvalida3.js"></script>
<script language="javascript" type="text/javascript" src="librerias/js/scriptvalida4.js"></script>
<title>Admiray System</title>
</head>

<body>
<div class="titulo">Consultas de Presupuestos</div><br />
<div class="titulo" style="width:600px;">Por Clientes</div>
<div class="error" align="center" id="er">	
  	<?php if(isset($_GET["res"])){echo $_GET["res"];?><script>mostrar('er'); setTimeout(ocultar,4000,'er');</script> <? } ?>
    </div>
<form method="post" action="librerias/php/consul.php" name="presu"> 
Cedula/RIF:<input name="cod_cli" type="text" size="15" maxlength="50" align="right" value="<?php echo $_GET['cod'];?>" />
    &nbsp;&nbsp;<input width="20" height="20" type="image" src="imagenes/camera_test.png"/> 
</form>
<center>Cliente&nbsp;<?php echo ($_GET["nom"]);?> posee&nbsp;<?php echo ($_GET["npre"]);?>&nbsp;Presupuesto(s)<br />
<table width="680" cellspacing="1" cellpadding="1">
  <thead><tr style="background:#3B78B1;">
  	<th width="200">Numero de presupuesto</th>	
  	<th width="200">Fecha</th>
    <th width="200">Nº de Productos Cotizados</th>
  </tr>					
  </thead>
  <tbody><?php echo ($_GET["tb"]);?></tbody>
</table></center>
<p>
<hr width="700" />
<div class="titulo" style="width:600px;">Por Fecha</div>
Indique la fecha en este formato. Ejem: 11/04/2009 
<center><form method="post" action="librerias/php/consul_fec_presu.php" name="presu"> 

Fecha de Inicio:<input name="fech" type="text" size="15" maxlength="50" align="right" value="<?php echo $_GET['fech'];?>" />      &nbsp;&nbsp;&nbsp;
      Fecha Fin:<input name="ffin" type="text" size="15" maxlength="50" align="right" value="<?php echo $_GET['ffin'];?>" />
&nbsp;&nbsp;
    <input width="20" height="20" type="image" src="imagenes/camera_test.png"/></form></center>
&nbsp;En este rango de fecha se realizaron <?php echo ($_GET["fpre"]);?>&nbsp;Presupuesto(s)<br />
<center><table width="680" cellspacing="1" cellpadding="1">
  <thead><tr style="background:#3B78B1;">
  	<th width="200">Numero de presupuesto</th>	
  	<th width="200">Fecha</th>
   	<th width="200">Cliente</th>
   	<th width="200">Nº de Productos Cotizados</th>
  </tr>					
  </thead>
  <tbody><?php echo ($_GET["tb1"]);?></tbody>
</table>
</center>
</body>
</html>
