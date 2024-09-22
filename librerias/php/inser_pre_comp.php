<?php
include("adodb/adodb.inc.php");	include("config.php");	include("conex.php"); //$db->debug =true;
if($_GET["rif"]==NULL){	$res="No ha agregado un proveedor";}
		$rs=$db->Execute("SELECT * FROM tempo"); 
		if ($rs->RowCount()>0)
		{$rif=$_GET["rif"];
		$db->Execute("INSERT INTO enc_pre_comp VALUES ('','$rif','".date ( "d/m/Y" )."')");
			while (!$rs->EOF)
				{
				$rs1=$db->Execute("SELECT `cod_pre_comp` FROM `enc_pre_comp` ORDER BY `cod_pre_comp` DESC");	
		if ($rs->RowCount()>0){$n=$rs1->fields(0);}
		else{ $n=1;}
				$c1=$rs->fields("c1");$c2=$rs->fields("c2");$c3=$rs->fields("c3");$c4=$rs->fields("c4");
					$db->Execute("INSERT INTO det_pre_comp VALUES ('$n','$c1','$c4','')");
					$rs->MoveNext();
					$res="Presupuesto de Compra guardado satisfactoriamente";
					}
				$rs=$db->Execute("TRUNCATE TABLE tempo");
		}else {$res="No hay productos agregados para guardar";}
		if (isset($res))@header("location:../../presu_compra.php?&res=$res"); else header("location:../../presu_compra.php");
?>