<?php 
	include("adodb/adodb.inc.php");include("config.php");include("conex.php"); //$db->debug = true;
	$codprov = $_POST["rif_prov"];
 	
	$rs=$db->Execute("TRUNCATE TABLE tempo");

	$rs=$db->Execute("SELECT * FROM proveedor WHERE rif_prov='$codprov'");	
		if ($rs->RowCount()>0)
		{
			$nom=$rs->fields(nom_prov);
			$dir=$rs->fields(direc_prov);
			$telf=$rs->fields(telf_prov);
			$res="Proveedor agregado";
		}
		else{$res="Proveedor no existe";}	
		
		$sql="SELECT cod_pro, des_pro FROM productos ORDER BY des_pro ASC";$rs=$db->Execute($sql);
		$mes="<option value=0 >Seleccione una </option>";$i=0;
		while (!$rs->EOF)
		{
				$mes.="<option value=".$rs->fields(0).">".$rs->fields(1)."</option>";$rs->MoveNext();
		}
		
		@header("location:../../presu_compra.php?res=$res&codprov=$codprov&nom=$nom&ape=$ape&dir=$dir&telf=$telf&mes=$mes&c=$c&ccli1=$ccli1");
?>