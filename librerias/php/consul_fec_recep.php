<?php 
include("adodb/adodb.inc.php");include("config.php");include("conex.php");// $db->debug = true;
$fech = $_POST["fech"]; $ffin=$_POST["ffin"];
if($_POST["fech"]==NULL|$ffin==NULL){$res.="Debe llenar los 2 campos";}
//$rs=$db->Execute("SELECT * FROM encab_pre WHERE fecha='$fech'");	$fpre=$rs->RowCount();
$rs=$db->Execute("SELECT * FROM encab_recep WHERE fecha BETWEEN '$_POST[fech]' AND '$_POST[ffin]'");$fr=$rs->RowCount();

while (!$rs->EOF)
{
	$rif=$rs->fields(1); $cod_recep=$rs->fields(0); $fec=$rs->fields(2);
	
	$rs1=$db->Execute("SELECT * FROM proveedor WHERE rif_prov= '$rif'");
	if ($rs1->RowCount()>0){$res=""; }
	else $res="";
	
	$rs2=$db->Execute("SELECT * FROM det_recep WHERE cod_det_recep='$cod_recep'"); $nr=$rs2->RowCount();
	
	$tb1.="<tr><td align=center width=30>".$rs->fields(0)."</td><td align=center width=80>".$rs->fields(2)."</td><td align=center width=80>".$rs->fields(1)."/".$rs1->fields(1)."</td></td><td align=center width=80>".$nr."</td><tr>";
$rs->MoveNext();
}	

@header("location:../../consul_recep.php?res=$res&tb1=$tb1&fr=$fr&fech=$fech&ffin=$ffin");
?>