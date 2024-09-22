<?php
include("adodb/adodb.inc.php");	include("config.php");	include("conex.php"); //$db->debug =true;
$fac=$_GET["fac"]; $abono=$_GET["abono"]; $ced=$_GET["ced"];
	
	
	
		
	$rs=$db->Execute("SELECT * FROM encab_fac WHERE cod_enc_fac ='$fac'");
	if ($rs->RowCount()>0)
	{	
		$rs=$db->Execute("SELECT * FROM por_cobrar WHERE cod_fact ='$fac'"); 
		if ($rs->RowCount()>0)
		{
			$cod_cli=$rs->fields(3); $total=$rs->fields(4); 
						
			$cli=$db->Execute("SELECT * FROM clientes WHERE cod_cli ='$cod_cli'"); 
				$nom=$cli->fields(nom_cli); $dir=$cli->fields(dire_cli); $telf=$cli->fields(telf_cli);
		}
		
	}
	
	$rs=$db->Execute("SELECT * FROM por_cobrar WHERE cod_fact ='$fac'");
	if ($rs->RowCount()>0)
	{	
		$debe=$rs->fields(5);
		
			$resta=$rs->fields(5)-$abono;
			
			$db->Execute("UPDATE por_cobrar SET resta='$resta' WHERE cod_fact='$fac'");
			
			$db->Execute("INSERT INTO abonoventa VALUES ('','$fac','$ced','".date ( "d/m/Y" )."','$abono','$resta')");
	
			$res="Abono realizado. Se abonaron $abono a la Factura $fac";	
	
	 	if($fac!=NULL){$imp="<input type=image width=60 height=60 src=imagenes/Printer.png onclick=window.print();>";}else{$imp="";}
	}else{$res="Factura no existe";}
	
@header("location:../../c_cobrar.php?res=$res&codfac=$fac&nom=$nom&dir=$dir&telf=$telf&codcli=$cod_cli&total=$total&resta=$resta&abono=$abono&imp=$imp");
?>