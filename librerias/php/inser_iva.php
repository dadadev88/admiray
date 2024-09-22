<?php
include("adodb/adodb.inc.php");include("config.php");include("conex.php"); //$db->debug = true;
	$iva = $_POST["iva"];	$ini= $_POST["ini"];
 	if($iva==NULL|$ini==NULL)
	{$res= "Debe llenar todos los Campos";}
	else
	{
		$rs2=$db->Execute("INSERT INTO iva VALUES('','$iva','$ini','')");
		if ($rs2==true){$res="Se ha registrado un nuevo IVA. Comenzara desde el $ini";}
	}

if(isset($res)){@header("location:../../iva.php?res=$res");}
?>