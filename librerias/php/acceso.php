<?php
	include("adodb/adodb.inc.php");include("config.php");include("conex.php");//$db->debug = true;
	$nom=$_POST['username'];
	if ($_POST['username']!="") {
		if ($_POST['password']!="") {
			$rs=$db->Execute("SELECT * FROM empleado WHERE username='$_POST[username]' && pass='$_POST[password]'");
			if ($rs->RowCount()>0){
				$nivel=$rs->fields(7);
				if($nivel==1){
					$msj="Ha entrado al sistema como ADMINISTRADOR. Posee todos los privilegios del sistema";
					@header("location:../../menu.php?nom=$nom&msj=$msj");
				}
				if($nivel==2){
					$msj="Ha entrado al sistema como Gerente. Posee todos los privilegios del sistema";
					@header("location:../../menu2.php?nom=$nom&msj=$msj");
				}
				if($nivel==3){
					$msj="Ha entrado al sistema como Vendedor o Comprardor. No posee todos los privilegios del sistema";
					@header("location:../../menu3.php?nom=$nom&msj=$msj");
				}
			}
			else {
				$res="Usuario o contrase�a incorecto";
			}
		}
		else {
			$res="Debe ingresar una contrase�a";
		}
	} else {
		$res="Debe ingresar un nombre de usuario";
	}

	//retorno al index con el mensaje de error
	if(isset($res)){@header("location:../../index.php?res=$res");}
?>