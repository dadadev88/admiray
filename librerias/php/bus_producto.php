<?php 
include("adodb/adodb.inc.php");include("config.php");include("conex.php"); //$db->debug = true;
$cod = $_POST["cod_pro"];
	if($cod==NULL)
	{
		$res="El campo no puede estar vacio";}
	else 
	{
		$rs=$db->Execute("SELECT * FROM productos WHERE cod_pro='$cod'");
			if ($rs->RowCount()>0){ 
			$res="Producto encontrado";
			$la="<tr>
					<td align=center>".$rs->fields(0)."</td>
					<td align=center>".$rs->fields(1)."</td>
					<td align=center>".$rs->fields(2)."Bs.F</td>
					<td align=center>".$rs->fields(3)."Bs.F</td>
					<td align=center>".$rs->fields(4)."</td>
					<td align=center>".$rs->fields(5)."</td>
				</tr>";
			}
			else{$res="Producto no existe";}
	}
if(isset($res)){@header("location:../../bus_productos.php?res=$res&la=$la");}
?>