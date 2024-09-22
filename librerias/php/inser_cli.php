<?php
include("adodb/adodb.inc.php");include("config.php");include("conex.php"); //$db->debug = true;
$ced = $_POST["ced_cli"];$nom = $_POST["nom_cli"];	
$dir = $_POST["dir_cli"];$telf= $_POST["telf_cli"];
	$email = $_POST["email_cli"];
 	if($ced==NULL|$nom==NULL|$dir==NULL|$telf==NULL)
	{$res= "Debe llenar todos los Campos, a excepcion de email sino posee";}
	else
	{
		$rs=$db->Execute("SELECT * FROM clientes WHERE cod_cli='$ced'");	
		if ($rs->RowCount()>0){$res="Cliente ya existe";}
		else
		{
			$rs1=$db->Execute("INSERT INTO clientes VALUES('$ced','$nom','$dir','$telf','$email')");
			if ($rs1==true){$res="Cliente registrado";}
		}
	}
if(isset($res)){@header("location:../../clientes.php?res=$res");}
?>