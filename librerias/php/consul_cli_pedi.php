<?php
include("adodb/adodb.inc.php");include("config.php");include("conex.php");// $db->debug = true;
$cod = $_POST["cod_cli"]; 
$rs=$db->Execute("SELECT * FROM encab_ped WHERE cod_cli='$cod'");	$nped=$rs->RowCount();
while (!$rs->EOF)
{
	$cod_ped=$rs->fields(0); $ced=$rs->fields(1); $fec=$rs->fields(2);
	
	$rs1=$db->Execute("SELECT * FROM clientes WHERE cod_cli='$ced'");
	if ($rs1->RowCount()>0){$res="Cliente encontrado"; $nom=$rs1->fields(nom_cli); }
	else $res="Cliente no existe";
	
	$rs2=$db->Execute("SELECT * FROM detalle_ped WHERE cod_det_ped ='$cod_ped'");
	
	$tb.="<tr><td align=center width=30>".$rs->fields(0)."</td>
	<td align=center width=80>".$rs->fields(2)."</td><td align=center width=30>".$rs2->RowCount()."</td><tr>";
$rs->MoveNext();
}	

@header("location:../../consul_pedi.php?res=$res&tb=$tb&nom=$nom&cod=$cod&nped=$nped");
	
?>