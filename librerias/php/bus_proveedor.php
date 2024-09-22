<?php 
include("adodb/adodb.inc.php");include("config.php");include("conex.php"); //$db->debug = true;
$rif = $_POST["rif_prov"];
	if($rif==NULL)
	{$res="El campo no puede estar vacio";}
	else 
	{
		$rs=$db->Execute("SELECT * FROM proveedor WHERE rif_prov='$rif'");
			if ($rs->RowCount()>0){ 
		$res="Proveedor encontrado";
		$la="
		<tr>
			<td align=center>".$rs->fields(0)."</td>
			<td align=center>".$rs->fields(1)."</td>
			<td align=center>".$rs->fields(2)."</td>
			<td align=center>".$rs->fields(3)."</td>
			<td align=center>".$rs->fields(4)."</td>
			<td align=center>".$rs->fields(5)."</td>
		</tr>";	
			}
			else{$res="Proveedor no existe";}
	}
if(isset($res)){@header("location:../../bus_proveedores.php?res=$res&la=$la");}
?>
