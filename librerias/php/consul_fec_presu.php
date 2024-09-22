<?php 
include("adodb/adodb.inc.php");include("config.php");include("conex.php");// $db->debug = true;
$fech = $_POST["fech"]; $ffin=$_POST["ffin"];
//$rs=$db->Execute("SELECT * FROM encab_pre WHERE fecha='$fech'");	$fpre=$rs->RowCount();
$rs=$db->Execute("SELECT * FROM encab_pre WHERE fecha BETWEEN '$_POST[fech]' AND '$_POST[ffin]'");$fpre=$rs->RowCount();

while (!$rs->EOF)
{
	$ced=$rs->fields(cod_cli); $cod_pre=$rs->fields(cod_encab_pre); $fec=$rs->fields(fecha);
	
	$rs1=$db->Execute("SELECT * FROM clientes WHERE cod_cli='$ced'");
	if ($rs1->RowCount()>0){$res=""; }
	else $res="";
	
$rs2=$db->Execute("SELECT * FROM detalle_pre WHERE cod_det_pre='$cod_pre'"); $np=$rs2->RowCount();

	$tb1.="<tr><td align=center width=30>".$rs->fields(cod_encab_pre)."</td><td align=center width=80>".$rs->fields(fecha)."</td><td align=center width=80>".$rs->fields(cod_cli)."/".$rs1->fields(nom_cli)."</td><td align=center width=80>".$np."</td><tr>";
$rs->MoveNext();
}	

@header("location:../../consul.php?res=$res&tb1=$tb1&fpre=$fpre&fech=$fech&ffin=$ffin");
?>