<?php
include("adodb/adodb.inc.php");include("config.php");include("conex.php");// $db->debug = true;
$cod = $_POST["cod_cli"]; 
$rs=$db->Execute("SELECT * FROM encab_fac WHERE cod_cli='$cod'");	$nfac=$rs->RowCount();
while (!$rs->EOF)
{
	$ced=$rs->fields(cod_cli); $cod_fac=$rs->fields(cod_enc_fac); $fec=$rs->fields(fec_enc_pre);
	
	$rs1=$db->Execute("SELECT * FROM clientes WHERE cod_cli='$ced'");
	if ($rs1->RowCount()>0){$res="Cliente encontrado"; $nom=$rs1->fields(nom_cli); }
	else $res="Cliente no existe";
	
	$rs2=$db->Execute("SELECT * FROM detalle_fac WHERE cod_det_fac ='$cod_fac'");
	
	$tb.="<tr>
	<td align=center width=30>".$rs->fields(cod_enc_fac)."</td>
	<td align=center width=80>".$rs->fields(fec_enc_fac)."</td><td align=center width=30>".$rs2->RowCount()."</td><tr>";
$rs->MoveNext();
}	

@header("location:../../consul_fact.php?res=$res&tb=$tb&nom=$nom&cod=$cod&nfac=$nfac");
	
?>