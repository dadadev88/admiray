<?php 
	include("adodb/adodb.inc.php");include("config.php");include("conex.php");//$db->debug = true;
$cod=$_GET['ced'];
 	$rs=$db->Execute("SELECT * FROM clientes WHERE cod_cli='$_GET[ced]'");	
		if ($rs->RowCount()>0)
		{
			$nom=$rs->fields(nom_cli);
			$dir=$rs->fields(dire_cli);
			$telf=$rs->fields(telf_cli);
			$res="Cliente agregado al pedido";
		}
		
		$sql="SELECT cod_pro, des_pro FROM productos ORDER BY des_pro ASC";$rs=$db->Execute($sql);
		$mes="<option value=0 >Seleccione una </option>";$i=0;
		while (!$rs->EOF)
		{
				$mes.="<option value=".$rs->fields(0).">".$rs->fields(1)."</option>";$rs->MoveNext();
		}


		$rs=$db->Execute("SELECT * FROM tempo WHERE c1='$_GET[pro]'");$suma=0;
		if ($rs->RowCount()>0){$res="Ya ha agregado el producto al Pedido";}
		else
		{		
			$rs=$db->Execute("SELECT * FROM productos WHERE cod_pro='$_GET[pro]'");
			$des=$rs->fields(1);$cos=$rs->fields(3); $cane=$rs->fields(4);
			
				$rs=$db->Execute("INSERT INTO tempo values ('$_GET[pro]','$des','$_GET[cant]',NULL,NULL,'')");
				$res="Producto agregado al Pedido satisfactoriamente";
		
		}
		
		$rs=$db->Execute("SELECT * FROM tempo");
		while (!$rs->EOF)
		{
		 	$id=$rs->fields(id);
			$tb.="<tr><td align=center>".$rs->fields(1)."</td><td align=center>".$rs->fields(2)."</td></tr>";
			$suma=$rs->fields(2)+$suma;
			$rs->MoveNext();
		}
			$tb1.="<tr><td align=right >Total de Productos a pedir</td><td align=center>".$suma."</td></tr>";

	@header("location:../../pedido.php?res=$res&cod=$cod&nom=$nom&ape=$ape&dir=$dir&telf=$telf&c1=$c1&n1=$n1&a1=$a1&mes=$mes&tb=$tb&tb1=$tb1");
?>