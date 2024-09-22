<?php
include("adodb/adodb.inc.php");	include("config.php");	include("conex.php"); //$db->debug =true;
$ced=$_GET["ced"]; $cond = $_GET["cond"];
if($_GET["ced"]==NULL){	$res="No ha agregado un cliente";}
		$rs=$db->Execute("SELECT * FROM tempo"); 
		if ($rs->RowCount()>0)
		{		
		$db->Execute("INSERT INTO encab_fac VALUES ('','$ced','".date ( "d/m/Y" )."','')");
		while (!$rs->EOF)
		{
				$rs1=$db->Execute("SELECT cod_enc_fac FROM `encab_fac` ORDER BY cod_enc_fac DESC");	
			if ($rs->RowCount()>0){$n=$rs1->fields(0);}
			else{ $n=1;}
				$c1=$rs->fields("c1");$c2=$rs->fields("c2");$c3=$rs->fields("c3");$c4=$rs->fields("c4");
					$db->Execute("INSERT INTO detalle_fac VALUES ('$n','$c1','$c4','$c3')");
					$rs->MoveNext();
										
					$rs2=$db->Execute("SELECT * FROM productos WHERE cod_pro='$c1'"); 
					$ncan=$rs2->fields(can_pro)-$c4;
					$rs2=$db->Execute("UPDATE productos SET can_pro='$ncan' WHERE cod_pro='$c1'");
		}
		
		if($cond==Credito)
		{			
			$enc=$db->Execute("SELECT cod_enc_fac FROM `encab_fac` ORDER BY cod_enc_fac DESC");	
			if ($enc->RowCount()>0){$n=$enc->fields(0);}else{ $n=1;}
			
			$det=$db->Execute("SELECT * FROM detalle_fac WHERE cod_det_fac='$n'");
			while (!$det->EOF)
			{
		 		$suma+=$det->fields(3)*$det->fields(2);
				$det->MoveNext();
			}
			
			$total+=($suma*0.12)+$suma;
		
				$db->Execute("INSERT INTO por_cobrar VALUES ('','".date ( "d/m/Y" )."','$n','$ced','$total','$total','')");	
				$res="Orden de Compra guardada satisfactoriamente y envia a Cuentas por cobrar";
		}else {$res="Factura guardada satisfactoriamente";}
			
		$rs=$db->Execute("TRUNCATE TABLE tempo");
		}else {$res="No hay productos agregados para guardar";}
		
		if (isset($res))@header("location:../../factura.php?&res=$res"); else @header("location:../../factura.php");
?>