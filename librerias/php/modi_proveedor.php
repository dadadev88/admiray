<?php 
include("adodb/adodb.inc.php");include("config.php");include("conex.php"); //$db->debug = true;

	
	//
	include("adodb/adodb.inc.php");include("config.php");include("conex.php"); //$db->debug = true;
$rif = $_POST["rif_prov"];
 	$rs=$db->Execute("SELECT * FROM proveedor WHERE rif_prov='$rif'");	
		if ($rs->RowCount()>0)
		{
			$nom=$rs->fields(nom_prov);
			$ape=$rs->fields(perso_con_prov);
			$dir=$rs->fields(direc_prov);
			$telf=$rs->fields(telf_prov);
			$email=$rs->fields(email);
		}
		else{$res="Proveedor no existe";}	
		

		
	@header("location:../../modi_proveedores.php?res=$res&rif=$rif&nom=$nom&ape=$ape&dir=$dir&telf=$telf&email=$email");
?>
	
<?
include("adodb/adodb.inc.php");include("config.php");include("conex.php"); $db->debug = true;
$ced1 = $_POST["rif_prov"];$nom1 = $_POST["nom_prov"];	
	$ape1 = $_POST["perso_con_prov"];$dir1 = $_POST["direc_prov"];$telf1= $_POST["telf_prov"];
	$email1 = $_POST["email"];

	 	if($ced1==NULL)
		{$res="Cedula o RIF no puestar estar vacio";}
	else
	{
		$rs2=$db->Execute("SELECT * FROM proveedor WHERE rif_prov='$ced1'");
		if ($rs2->RowCount()>0)
		{ 
			$rs2=$db->Execute("UPDATE proveedor SET nom_prov='$nom1', perso_con_prov='$ape1', direc_prov='$dir1', telf_prov='$telf1', email='$email1' WHERE rif_prov='$ced1'");
			$res="Proveedor Modificado";
		}
		else{$res="Proveedor no existe";}
	
if(isset($res)){@header("location:../../modi_proveedores.php?res=$res");} }
?>
