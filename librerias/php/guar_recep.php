<?php
include("adodb/adodb.inc.php");	include("config.php");	include("conex.php"); //$db->debug =true;
$rif=$_GET["rif"];
if($_GET["rif"]==NULL){	$res="No ha agregado un proveedor";}
		$rs=$db->Execute("SELECT * FROM tempo"); 
		if ($rs->RowCount()>0)
		{		
		$db->Execute("INSERT INTO encab_recep VALUES ('','$rif','".date ( "d/m/Y" )."')");
		while (!$rs->EOF)
		{
				$rs1=$db->Execute("SELECT cod_encab_recep FROM encab_recep ORDER BY cod_encab_recep DESC");	
			if ($rs->RowCount()>0){$n=$rs1->fields(0);}
			else{ $n=1;}
				$c1=$rs->fields("c1");$c2=$rs->fields("c2");$c3=$rs->fields("c3");$c4=$rs->fields("c4");
					$db->Execute("INSERT INTO det_recep VALUES ('$n','$c1','$c3',NULL)");
					$rs->MoveNext();
					$res="Recepccion de Mercancia guardada satisfactoriamente";
					
					$rs2=$db->Execute("SELECT * FROM productos WHERE cod_pro='$c1'"); 
					$ncan=$rs2->fields(can_pro)+$c3;
					$rs2=$db->Execute("UPDATE productos SET can_pro='$ncan' WHERE cod_pro='$c1'");
		}
		$rs=$db->Execute("TRUNCATE TABLE tempo");
		}else {$res="No hay productos agregados para guardar";}
		
		if (isset($res))@header("location:../../recepcion.php?&res=$res"); else @header("location:../../factura.php");
?>