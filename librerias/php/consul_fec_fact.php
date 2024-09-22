<?php 
include("adodb/adodb.inc.php");include("config.php");include("conex.php");// $db->debug = true;
$fech = $_POST["fech"]; $ffin=$_POST["ffin"];
if($_POST["fech"]==NULL|$ffin==NULL){$res.="Debe llenar los 2 campos";}
//$rs=$db->Execute("SELECT * FROM encab_pre WHERE fecha='$fech'");	$fpre=$rs->RowCount();
$rs=$db->Execute("SELECT * FROM encab_fac WHERE fec_enc_fac BETWEEN '$_POST[fech]' AND '$_POST[ffin]'");$ffac=$rs->RowCount();

while (!$rs->EOF)
{
	$ced=$rs->fields(cod_cli); $cod_pre=$rs->fields(cod_enc_fac); $fec=$rs->fields(fec_enc_fac);
	
	$rs1=$db->Execute("SELECT * FROM clientes WHERE cod_cli='$ced'");
	if ($rs1->RowCount()>0){$res=""; }
	else $res="";
	
	$rs2=$db->Execute("SELECT * FROM detalle_fac WHERE cod_det_fac='$cod_pre'"); $nf=$rs2->RowCount();
	
	$tb1.="<tr><td align=center width=30>".$rs->fields(cod_enc_fac)."</td><td align=center width=80>".$rs->fields(fec_enc_fac)."</td><td align=center width=80>".$rs->fields(cod_cli)."/".$rs1->fields(nom_cli)."</td></td><td align=center width=80>".$nf."</td><tr>";
$rs->MoveNext();
}	

@header("location:../../consul_fact.php?res=$res&tb1=$tb1&ffac=$ffac&fech=$fech&ffin=$ffin");
?>