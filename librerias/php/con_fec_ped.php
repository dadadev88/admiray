<?php 
include("adodb/adodb.inc.php");include("config.php");include("conex.php");// $db->debug = true;
$fech = $_POST["fech"]; $ffin=$_POST["ffin"];
if($_POST["fech"]==NULL|$ffin==NULL){$res.="Debe llenar los 2 campos";}
//$rs=$db->Execute("SELECT * FROM encab_pre WHERE fecha='$fech'");	$fpre=$rs->RowCount();
$rs=$db->Execute("SELECT * FROM encab_ped WHERE fecha BETWEEN '$_POST[fech]' AND '$_POST[ffin]'");$fped=$rs->RowCount();

while (!$rs->EOF)
{
	$cod_ped=$rs->fields(0); $ced=$rs->fields(1);  $fec=$rs->fields(2);
	
	$rs1=$db->Execute("SELECT * FROM clientes WHERE cod_cli='$ced'");
	if ($rs1->RowCount()>0){$res=""; }
	else $res="";
	
	$rs2=$db->Execute("SELECT * FROM detalle_ped WHERE cod_det_ped='$cod_ped'"); $np=$rs2->RowCount();
	
	$tb1.="<tr><td align=center width=30>".$rs->fields(0)."</td><td align=center width=80>".$rs->fields(2)."</td><td align=center width=80>".$rs->fields(cod_cli)."/".$rs1->fields(nom_cli)."</td></td><td align=center width=80>".$np."</td><tr>";
$rs->MoveNext();
}	

@header("location:../../consul_pedi.php?res=$res&tb1=$tb1&fped=$fped&fech=$fech&ffin=$ffin");
?>