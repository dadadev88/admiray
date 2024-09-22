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
 	$rs=$db->Execute("SELECT * FROM productos WHERE can_pro>=stk_max");	
		while (!$rs->EOF)
		{
		$tb.="<tr>
				<td  border=1 align=center>".$rs->fields(cod_pro)."</td>
				<td  border=1 align=center>".$rs->fields(des_pro)."</td>
				<td  border=1 align=center>".$rs->fields(4)."</td>
				
				<td  border=1 align=center>".$rs->fields(6)."</td>
			</tr>";
			$rs->MoveNext();
		}
		$imp="<input type=image width=60 height=60 src=imagenes/Printer.png onclick=window.print(); class=imp>";
?>
<div class="titulo">Productos Sobrantes </div> 
<p>
<center><table width="680" cellspacing="1" cellpadding="1">
  <thead><tr style="background:#3B78B1;">
    <th width="230">Codigo del producto</th>
    <th width="230">Descipcion del producto</th>
    <th width="150">Cantidad</th>	
  	
	<th width="116">Stock Maximo</th></tr>					
  </thead>
  <tbody ><?php echo $tb;?></tbody>
</table></center>
<div class="titulo" style="width:655px;">&nbsp;</div> <p> 
<?php echo $imp; ?>
</body>
</html>
