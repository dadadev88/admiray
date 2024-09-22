<?php
include("adodb/adodb.inc.php");include("config.php");include("conex.php");// $db->debug = true;
$cod = $_POST["rif"]; 
$rs=$db->Execute("SELECT * FROM encab_recep WHERE cod_prov ='$cod'");	$nr=$rs->RowCount();
while (!$rs->EOF)
{
	$cod_r=$rs->fields(0); $rif=$rs->fields(1); $fec=$rs->fields(2);
	
	$rs1=$db->Execute("SELECT * FROM proveedor WHERE rif_prov='$cod'");
	if ($rs1->RowCount()>0){$res="Proveedor encontrado"; $nom=$rs1->fields(1); }
	else {$res="Proveedor no existe";}
	
	$rs2=$db->Execute("SELECT * FROM det_recep WHERE cod_det_recep ='$cod_r'");
	
	$tb.="<tr><td align=center width=30>".$rs->fields(0)."</td>
	<td align=center width=80>".$rs->fields(2)."</td><td align=center width=30>".$rs2->RowCount()."</td><tr>";
$rs->MoveNext();
}
@header("location:../../consul_recep.php?res=$res&tb=$tb&nom=$nom&cod=$cod&nr=$nr");
?>