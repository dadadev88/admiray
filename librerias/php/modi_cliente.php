<?php 
include("adodb/adodb.inc.php");include("config.php");include("conex.php"); //$db->debug = true;

include("adodb/adodb.inc.php");include("config.php");include("conex.php"); //$db->debug = true;
$cod = $_POST["cod_cli"];
 	$rs=$db->Execute("SELECT * FROM clientes WHERE cod_cli='$cod'");	
		if ($rs->RowCount()>0)
		{
			$nom=$rs->fields(nom_cli);
			$dir=$rs->fields(dire_cli);
			$telf=$rs->fields(telf_cli);
			$email=$rs->fields(email_cli);
		}
		else{$res="Cliente no existe";}	
		

		
	@header("location:../../modi_clientes.php?res=$res&cod=$cod&nom=$nom&ape=$ape&dir=$dir&telf=$telf&email=$email");
?>
	
<?
include("adodb/adodb.inc.php");include("config.php");include("conex.php"); $db->debug = true;
$ced1 = $_POST["cod_cli"];$nom1 = $_POST["nom_cli"];$dir1 = $_POST["dir_cli"];$telf1= $_POST["telf_cli"];$email1 = $_POST["email_cli"];

 	if($ced1==NULL)
	{$res="Cedula o RIF no puestar estar vacio";}
	else
	{
		$rs2=$db->Execute("SELECT * FROM clientes WHERE cod_cli='$ced1'");
		if ($rs2->RowCount()>0)
		{ 
			$rs2=$db->Execute("UPDATE clientes SET nom_cli='$nom1', dire_cli='$dir1', telf_cli='$telf1', email_cli='$email1' WHERE cod_cli='$ced1'");
			$res="Cliente Modificado";
		}else{$res="La cedula a sido modificada. No se debe modificar";}
	}

if(isset($res)){@header("location:../../modi_clientes.php?res=$res");}
?>