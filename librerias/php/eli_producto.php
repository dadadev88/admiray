<?php 
include("adodb/adodb.inc.php");include("config.php");include("conex.php"); //$db->debug = true;
$cod = $_POST["cod_pro"];
	if($cod==NULL)
	{
		$res="El campo no puede estar vacio";}
	else 
	{ 
		$rs=$db->Execute("SELECT * FROM productos WHERE cod_pro='$cod'");
		if ($rs->RowCount()>0)
		{
			$rs1=$db->Execute("DELETE FROM proveedor WHERE cod_pro='$cod'");
			if($rs1==true){$res="Producto a sido Eliminado";}
		}
		else{$res="Producto No existe";}
	}

if(isset($res)){@header("location:../../eli_prodcutos.php?res=$res");}
?>