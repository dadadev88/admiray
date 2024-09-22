<?php 
	include("adodb/adodb.inc.php");include("config.php");include("conex.php"); //$db->debug = true;
$codprov = $_POST["rif_prov"];	$rs=$db->Execute("TRUNCATE TABLE tempo");
 	$rs=$db->Execute("SELECT * FROM proveedor WHERE rif_prov='$codprov'");	
		if ($rs->RowCount()>0)
		{
			$nom=$rs->fields(nom_prov);
			$dir=$rs->fields(direc_prov);
			$telf=$rs->fields(telf_prov);
			$per=$rs->fields(perso_con_prov);
			$email=$rs->fields(email);
		}
		else{$res="Proveedor no existe";}	
		
		$sql="SELECT cod_pro, des_pro FROM productos ORDER BY des_pro ASC";$rs=$db->Execute($sql);
		$mes="<option value=0 >Seleccione una </option>";$i=0;
		while (!$rs->EOF)
		{
				$mes.="<option value=".$rs->fields(0).">".$rs->fields(1)."</option>";$rs->MoveNext();
		}

		
		
	@header("location:../../orden_compra.php?res=$res&codprov=$codprov&nom=$nom&dir=$dir&telf=$telf&per=$per&email=$email&c1=$c1&n1=$n1&a1=$a1&mes=$mes");
?>
