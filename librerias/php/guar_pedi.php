<?php
include("adodb/adodb.inc.php");	include("config.php");	include("conex.php"); //$db->debug =true;
$ced=$_GET["ced"];
if($_GET["ced"]==NULL){	$res="No ha agregado un proveedor";}
		$rs=$db->Execute("SELECT * FROM tempo"); 
		if ($rs->RowCount()>0)
		{		
		$db->Execute("INSERT INTO encab_ped VALUES ('','$ced','".date ( "d/m/Y" )."')");
		while (!$rs->EOF)
		{
				$rs1=$db->Execute("SELECT cod_encab_ped FROM encab_ped ORDER BY cod_encab_ped DESC");	
			if ($rs1->RowCount()>0){$n=$rs1->fields(0);}else{ $n=1;}
				$c1=$rs->fields("c1");$c2=$rs->fields("c2");$c3=$rs->fields("c3");$c4=$rs->fields("c4");
					$db->Execute("INSERT INTO detalle_ped VALUES ('$n','$c1','$c3')");
					$rs->MoveNext();
					$res="Pedido guardado satisfactoriamente";
										
		}
		$rs=$db->Execute("TRUNCATE TABLE tempo");
		}else {$res="No hay productos agregados para guardar";}
		
		if (isset($res))@header("location:../../recepcion.php?&res=$res"); else @header("location:../../factura.php");
?>