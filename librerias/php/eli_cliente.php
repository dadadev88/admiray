<?php 
include("adodb/adodb.inc.php");include("config.php");include("conex.php"); //$db->debug = true;
$ced = $_POST["cod_cli"];
	if($ced==NULL)
	{$res="El campo no puede estar vacio";}
	else 
	{ 
		$rs=$db->Execute("SELECT * FROM clientes WHERE cod_cli='$ced'");
		if ($rs->RowCount()>0)
		{
			$rs1=$db->Execute("DELETE FROM clientes WHERE cod_cli='$ced'");
			if($rs1==true){$res="El Cliente de Cedula o RIF $ced a sido Eliminado";}
		}
		else{$res="Cliente No existe";}
	}

if(isset($res)){@header("location:../../eli_clientes.php?res=$res");}
?>