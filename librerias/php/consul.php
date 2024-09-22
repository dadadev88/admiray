<?php
include("adodb/adodb.inc.php");include("config.php");include("conex.php");// $db->debug = true;
$cod = $_POST["cod_cli"]; 
$rs=$db->Execute("SELECT * FROM encab_pre WHERE cod_cli='$cod'");	$npre=$rs->RowCount();
while (!$rs->EOF)
{
	$ced=$rs->fields(cod_cli); $cod_pre=$rs->fields(cod_encab_pre); $fec=$rs->fields(fecha);
	
	$rs1=$db->Execute("SELECT * FROM clientes WHERE cod_cli='$ced'");
	if ($rs1->RowCount()>0){$res="Cliente encontrado"; $nom=$rs1->fields(nom_cli); }
	else $res="Cliente no existe";
	
	$rs2=$db->Execute("SELECT * FROM detalle_pre WHERE cod_det_pre='$cod_pre'");
	
	$tb.="<tr>
	<td align=center width=30>".$rs->fields(cod_encab_pre)."</td>
	<td align=center width=80>".$rs->fields(fecha)."</td><td align=center width=30>".$rs2->RowCount()."</td><tr>";
$rs->MoveNext();
}	

@header("location:../../consul.php?res=$res&tb=$tb&nom=$nom&cod=$cod&npre=$npre&fpre=$fpre");
	
?>