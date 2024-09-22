<?php
include("adodb/adodb.inc.php");include("config.php");include("conex.php");// $db->debug = true;
$cod = $_POST["rif"]; 
$rs=$db->Execute("SELECT * FROM enc_pre_comp WHERE cod_prov ='$cod'");	$npc=$rs->RowCount();
while (!$rs->EOF)
{
	$cod_pc=$rs->fields(0); $rif=$rs->fields(1); $fec=$rs->fields(2);
	
	$rs1=$db->Execute("SELECT * FROM proveedor WHERE rif_prov='$cod'");
	if ($rs1->RowCount()>0){$res="Proveedor encontrado"; $nom=$rs1->fields(1); }
	else {$res="Proveedor no existe";}
	
	$rs2=$db->Execute("SELECT * FROM det_pre_comp WHERE cod_det_pre_comp ='$cod_pc'");
	
	$tb.="<tr><td align=center width=30>".$rs->fields(0)."</td>
	<td align=center width=80>".$rs->fields(2)."</td><td align=center width=30>".$rs2->RowCount()."</td><tr>";
$rs->MoveNext();
}
@header("location:../../consul_presu_comp.php?res=$res&tb=$tb&nom=$nom&cod=$cod&npc=$npc");
?>