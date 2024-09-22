<?php
include("adodb/adodb.inc.php");	include("config.php");	include("conex.php"); //$db->debug =true;
$cod_fact=$_POST["cod_fact"];
	
	
	$rs=$db->Execute("SELECT * FROM encab_fac WHERE cod_enc_fac ='$cod_fact'");
	if ($rs->RowCount()>0)
	{	
		$rs=$db->Execute("SELECT * FROM por_cobrar WHERE cod_fact ='$cod_fact'"); 
		if ($rs->RowCount()>0)
		{
			$cod_cli=$rs->fields(3); $total=$rs->fields(4); $resta=$rs->fields(5);
			if($resta==0){$res="La Factura $cod_fact ya ha sido cancelada totalmente";}		
			else{$res="Factura $cod_fact encontrada en Cuentas por Cobrar";	
			$guar="<img width=50 src=imagenes/camera_test.png onclick=javascript:abono();>";
		}	
			
			$cli=$db->Execute("SELECT * FROM clientes WHERE cod_cli ='$cod_cli'"); 
				$nom=$cli->fields(nom_cli); $dir=$cli->fields(dire_cli); $telf=$cli->fields(telf_cli);
		}else{$res="La Factura $cod_fact no esta en Cuentas por Cobrar";}
		
	}else{$res="Factura no existe";}
	
@header("location:../../c_cobrar.php?res=$res&codfac=$cod_fact&nom=$nom&dir=$dir&telf=$telf&codcli=$cod_cli&total=$total&debe=$resta&guar=$guar");
?>