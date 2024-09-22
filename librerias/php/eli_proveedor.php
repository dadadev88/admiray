<?php 
include("adodb/adodb.inc.php");include("config.php");include("conex.php"); //$db->debug = true;
$rif = $_POST["rif_prov"];
	if($rif==NULL)
	{
		$res="El campo no puede estar vacio";}
	else 
	{ 
		$rs=$db->Execute("SELECT * FROM proveedor WHERE rif_prov='$rif'");
		if ($rs->RowCount()>0)
		{
			$rs1=$db->Execute("DELETE FROM proveedor WHERE rif_prov='$rif'");
			if($rs1==true){$res="Proveedor a sido Eliminado";}
		}
		else{$res="Proveedor No existe";}
	}

if(isset($res)){@header("location:../../eli_proveedores.php?res=$res");}
?>