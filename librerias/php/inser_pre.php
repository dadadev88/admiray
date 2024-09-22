<?php
include("adodb/adodb.inc.php");	include("config.php");	include("conex.php"); //$db->debug =true;
if($_GET["ced"]==NULL){	$res="No ha agregado un cliente";}
		$rs=$db->Execute("SELECT * FROM tempo"); 
		if ($rs->RowCount()>0)
		{$ced=$_GET["ced"];
		$db->Execute("INSERT INTO encab_pre VALUES ('','$ced','".date ( "d/m/Y" )."')");
			while (!$rs->EOF)
				{
				$rs1=$db->Execute("SELECT `cod_encab_pre` FROM `encab_pre` ORDER BY `cod_encab_pre` DESC");	
		if ($rs->RowCount()>0){$n=$rs1->fields(0);}
		else{ $n=1;}
				$c1=$rs->fields("c1");$c2=$rs->fields("c2");$c3=$rs->fields("c3");$c4=$rs->fields("c4");
					$db->Execute("INSERT INTO detalle_pre VALUES ('$n','$c1','$c4','$c3')");
					$rs->MoveNext();
					$res="Presupuesto guardado";
					}
				$rs=$db->Execute("TRUNCATE TABLE tempo");
		}else {$res="No hay productos agregados para guardar";}
		if (isset($res))header("location:../../presupuesto.php?&res=$res"); else header("location:../../presupuesto.php");
?>