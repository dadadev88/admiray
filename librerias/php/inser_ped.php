<?php 
include("adodb/adodb.inc.php");include("config.php");include("conex.php"); //$db->debug = true;

$rs=$db->Execute("TRUNCATE TABLE tempo");
$cod = $_POST["cod_cli"];
 	$rs=$db->Execute("SELECT * FROM clientes WHERE cod_cli='$cod'");	
		if ($rs->RowCount()>0)
		{
			$nom=$rs->fields(nom_cli);
			$dir=$rs->fields(dire_cli);
			$telf=$rs->fields(telf_cli);
			$res="Cliente agregado";
		}
		else{$res="Cliente no existe";}	
		
		$rs=$db->Execute("SELECT cod_pro, des_pro FROM productos ORDER BY des_pro ASC");
		$mes="<option value=0 >Seleccione una </option>";$i=0;
		while (!$rs->EOF)
		{
				$mes.="<option value=".$rs->fields(0).">".$rs->fields(1)."</option>";$rs->MoveNext();
		}
		
		@header("location:../../pedido.php?res=$res&cod=$cod&nom=$nom&ape=$ape&dir=$dir&telf=$telf&mes=$mes&c=$c&mes=$mes");
?>