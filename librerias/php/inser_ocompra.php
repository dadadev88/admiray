<?php
include("adodb/adodb.inc.php");	include("config.php");	include("conex.php"); //$db->debug =true;
$cond = $_GET["cond"];

if($_GET["rif"]==NULL){$res="No ha agregado un proveedor";}
		
		$rs=$db->Execute("SELECT * FROM tempo"); 
		if ($rs->RowCount()>0)
		{
			$rif=$_GET["rif"];
			$db->Execute("INSERT INTO enc_ord_comp VALUES ('','$rif','".date ( "d/m/Y" )."','$cond')");
			while (!$rs->EOF)
			{
					$rs1=$db->Execute("SELECT cod_ord_comp FROM enc_ord_comp ORDER BY cod_ord_comp DESC");	
				if ($rs1->RowCount()>0){$noc=$rs1->fields(0);}else{ $noc=1;}
					
					$c1=$rs->fields("c1");$c2=$rs->fields("c2");$c3=$rs->fields("c3");$c4=$rs->fields("c4");
						$db->Execute("INSERT INTO det_ord_comp VALUES ('$noc','$c1','$c4','')");
						$rs->MoveNext();
			
			}
			
			/*if($cond==Credito)
			{
				$db->Execute("INSERT INTO por_pagar VALUES ('','$noc','$rif','3','3','3')");	
				$res="Orden de Compra guardada satisfactoriamente";

			}*/
			
			
					$rs=$db->Execute("TRUNCATE TABLE tempo");
		}else {$res="No hay productos agregados para guardar";}
		
		if (isset($res))@header("location:../../orden_compra.php?&res=$res"); else @header("location:../../orden_compra.php");
?>