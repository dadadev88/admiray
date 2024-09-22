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
$pro=$db->Execute("SELECT * FROM productos");	
while(!$pro->EOF)
{
	$codpro=$pro->fields(0);

	$suma=$db->Execute("SELECT Sum(cantidad) FROM detalle_fac WHERE cod_pro='$codpro' ORDER BY Sum(cantidad) DESC");

		$tb.="<tr>
				<td  border=1 align=center>".$pro->fields(0)."</td>
				<td  border=1 align=center>".$pro->fields(1)."</td>
				<td  border=1 align=center>".$suma->fields(0)."</td>
			</tr>";
$pro->MoveNext();
}
	$imp="<input type=image width=60 height=60 src=imagenes/Printer.png onclick=window.print(); class=imp>";
/*while (!$rs->EOF)
{	
	$codpro=$rs->fields(1);
	$rs1=$db->Execute("SELECT * FROM detalle_fac WHERE cod_pro='$codpro'");
	while ($i<$rs1->RowCount())
	{	 


		echo $suma->RowCount();
		echo $suma;
		$tb.="<tr>
				<td  border=1 align=center>".$pro->fields(0)."</td>
				<td  border=1 align=center>".$pro->fields(1)."</td>
				<td  border=1 align=center>".$suma."</td>
			</tr>";
		$i++;
	}
$rs->MoveNext();
}*/
	

?>
<div class="titulo">Productos mas vendidos</div> <p>
<center><table width="691" cellspacing="1" cellpadding="1">
  <thead>
  <tr style="background:#3B78B1;">
    <th width="123">Codigo del producto</th>
    <th width="180">Descipcion del producto</th>
   	<th width="200">Cantidad vendida</th>
  </tr>					
  </thead>
  <tbody ><?php echo $tb;?></tbody>
</table></center>
<div class="titulo" style="width:670px;">&nbsp;</div> <p> 
<?php echo $imp; ?>
</body>
</html>