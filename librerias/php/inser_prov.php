<?php
include("adodb/adodb.inc.php");include("config.php");include("conex.php"); //$db->debug = true;
    // Preguntaremos si se han enviado ya las variables necesarias
		$rif = $_POST["rif_prov"]; $nom = $_POST["nom_prov"]; $dir = $_POST["dir_prov"];$telf = $_POST["telf_prov"];
		$per = $_POST["perso_con_prov"]; $email = $_POST["email_prov"];
    	
		if($rif==NULL|$nom==NULL|$dir==NULL|$telf==NULL|$per==NULL|$email==NULL)
		{$res="Debe llenar todos los Campos";}
		else
		{
			$rs=$db->Execute("SELECT * FROM proveedor WHERE rif_prov='$rif'");	
			if ($rs->RowCount()>0){$res="Proveedor ya existe";}
			else
			{
				$rs1=$db->Execute("INSERT INTO proveedor VALUES('$rif','$nom','$dir','$telf','$per','$email')");
				if ($rs1==true){$res="Proveedor registrado";}
			}
		 }
if(isset($res)){@header("location:../../proveedores.php?res=$res");}
?>