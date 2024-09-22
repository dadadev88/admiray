<?php
include("adodb/adodb.inc.php");include("config.php");include("conex.php"); // $db->debug = true;
    // Preguntaremos si se han enviado ya las variables necesarias
    if (isset($_POST["cod_pro"])) 
	{
		$cod = $_POST["cod_pro"];
    	$des = $_POST["des_pro"];
		$pre = $_POST["pre_pro"];
    	$cos = $_POST["cos_pro"];
    	$can = $_POST["can_pro"];
		$stk = $_POST["stk"];
   		$stkmax = $_POST["stkmax"];
		
    		if($cod==NULL|$des==NULL|$pre==NULL|$cos==NULL|$can==NULL|$stkmax==NULL) {$res= "Debe llenar todos los Campos";}
			else
			{
				$rs=$db->Execute("SELECT * FROM productos WHERE cod_pro='$cod'");	
				if ($rs->RowCount()>0){$res="Codigo de Producto ya existe";}
				else
				{
					$rs=$db->Execute("INSERT INTO productos VALUES ('$cod','$des','$pre','$cos','$can','$stk','$stkmax')");
					if ($rs==true){$res="Producto registrado";}
    			}
			}
	}
	
	if(isset($res)){@header("location:../../productos.php?res=$res");}
 ?>