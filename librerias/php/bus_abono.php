<?php 
include("adodb/adodb.inc.php");include("config.php");include("conex.php"); //$db->debug = true;
$cod = $_POST["cod_abono"];
 	
if($cod==NULL)
{
	$res="El campo esta vacio. Debe indicar el numero de abono";
}
else
{
 	$rs=$db->Execute("SELECT * FROM abonoventa WHERE id='$cod'");	
 	if ($rs->RowCount()>0)
	{
		$cod_fac=$rs->fields(1); $ced=$rs->fields(2); $fec=$rs->fields(3); $abono=$rs->fields(4);
		$res="Abono encontrado";
		$imp="<input type=image width=60 height=60 src=imagenes/Printer.png onclick=window.print();>";
		$ab=$db->Execute("SELECT * FROM por_cobrar WHERE cod_fact ='$cod_fac'");
		$total=$ab->fields(4);	$resta=$rs->fields(5);
		
		
 		$cli=$db->Execute("SELECT * FROM clientes WHERE cod_cli='$ced'");	
		$ced=$cli->fields(cod_cli); $nom=$cli->fields(nom_cli); $dir=$cli->fields(dire_cli); $telf=$cli->fields(telf_cli);
	}else{$res="No existe numero de Abono";}
}

@header("location:../../abonos.php?res=$res&codfac=$cod&nom=$nom&dir=$dir&telf=$telf&ced=$ced&fec=$fec&imp=$imp&abono=$abono&total=$total&resta=$resta");
?>