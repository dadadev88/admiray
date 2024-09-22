<?php
include("adodb/adodb.inc.php");include("config.php");include("conex.php"); //$db->debug = true;
$ced = $_POST["ced_emp"];$nom = $_POST["nom_emp"];	
$email = $_POST["email_emp"];$telf= $_POST["telf_emp"];
$user = $_POST["user"];	$pass = $_POST["pass"];	$nu = $_POST["nu"];
 	if($ced==NULL|$nom==NULL|$email==NULL|$telf==NULL|$user==NULL|$pass==NULL|$nu==NULL)
	{$res= "Debe llenar todos los Campos";}
	else
	{
		$rs=$db->Execute("SELECT * FROM empleado WHERE ced_emp='$ced'");	
		if ($rs->RowCount()>0){$res="Empleado ya existe";}
	    $email=$db->Execute("SELECT email_emp FROM empleado WHERE email_emp='$email'");
		$rs1=$db->Execute("SELECT * FROM empleado WHERE username='$user'");	
		$ced1=$db->Execute("SELECT ced_emp FROM empleado WHERE ced_emp='$ced'");	
		if ($rs1->RowCount()>0){$res="Nombre de Usuario ya existe";}
		if ($email->RowCount()>0){$res="Correo electronico ya existe";}
		if ($ced1->RowCount()>0){$res="Cedula de Empleado ya existe. No puedo tener 2 cuentas en el Sistema";}		
		else
		{
			$rs2=$db->Execute("INSERT INTO empleado VALUES('','$ced','$nom','$email','$telf','$user','$pass','$nu')");
			if ($rs2==true){$res="Empleado y Usuario registrado Satisfactoriamente";}
		}
	}
if(isset($res)){@header("location:../../verusuarios.php?res=$res");}
?>