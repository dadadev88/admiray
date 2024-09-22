<?php 
include("adodb/adodb.inc.php");include("config.php");include("conex.php");// $db->debug = true;
$fech = $_POST["fech"]; $ffin=$_POST["ffin"];
if($_POST["fech"]==NULL|$ffin==NULL){$res.="Debe llenar los 2 campos";}
//$rs=$db->Execute("SELECT * FROM encab_pre WHERE fecha='$fech'");	$fpre=$rs->RowCount();
$rs=$db->Execute("SELECT * FROM enc_pre_comp WHERE fecha_pre_comp BETWEEN '$_POST[fech]' AND '$_POST[ffin]'");$fpc=$rs->RowCount();

while (!$rs->EOF)
{
	$rif=$rs->fields(1); $cod_pre_comp=$rs->fields(0); $fec=$rs->fields(2);
	
	$rs1=$db->Execute("SELECT * FROM proveedor WHERE rif_prov= '$rif'");
	if ($rs1->RowCount()>0){$res=""; }
	else $res="";
	
	$rs2=$db->Execute("SELECT * FROM det_pre_comp WHERE cod_det_pre_comp='$cod_pre_comp'"); $npc=$rs2->RowCount();
	
	$tb1.="<tr><td align=center width=30>".$rs->fields(0)."</td><td align=center width=80>".$rs->fields(2)."</td><td align=center width=80>".$rs->fields(1)."/".$rs1->fields(1)."</td></td><td align=center width=80>".$npc."</td><tr>";
$rs->MoveNext();
}	

@header("location:../../consul_presu_comp.php?res=$res&tb1=$tb1&fpc=$fpc&fech=$fech&ffin=$ffin");
?>