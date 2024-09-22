<?php 
	include("adodb/adodb.inc.php");include("config.php");include("conex.php"); //$db->debug = true;

$cod = $_POST["codor"]; $rs=$db->Execute("TRUNCATE TABLE tempo");

$rs=$db->Execute("SELECT * FROM enc_ord_comp WHERE cod_ord_comp ='$cod'");	
 	if ($rs->RowCount()>0)
	{ $rif=$rs->fields(1);
	  
 		$rs1=$db->Execute("SELECT * FROM proveedor WHERE rif_prov='$rif'");	
		if ($rs1->RowCount()>0)
		{
			$nom=$rs1->fields(nom_prov);
			$dir=$rs1->fields(direc_prov);
			$telf=$rs1->fields(telf_prov);
			$res="Proveedor de Orden de Compra $cod agregado  a la Recepcion";
		}
	}
		$sql="SELECT cod_pro, des_pro FROM productos ORDER BY des_pro ASC";$rs=$db->Execute($sql);
		$mes="<option value=0 >Seleccione una </option>";$i=0;
		while (!$rs->EOF)
		{
				$mes.="<option value=".$rs->fields(0).">".$rs->fields(1)."</option>";$rs->MoveNext();
		}
		
@header("location:../../recepcion.php?res=$res&rif=$rif&nom=$nom&dir=$dir&telf=$telf&per=$per&email=$email&c1=$c1&n1=$n1&a1=$a1&mes=$mes");
?>