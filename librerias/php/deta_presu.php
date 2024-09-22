<?php 
	include("adodb/adodb.inc.php");include("config.php");include("conex.php");//$db->debug = true;
	$cod=$_GET['ced'];
 	$rs=$db->Execute("SELECT * FROM clientes WHERE cod_cli='$_GET[ced]'");	
		if ($rs->RowCount()>0)
		{
			$nom=$rs->fields(nom_cli);
			$ape=$rs->fields(ape_cli);
			$dir=$rs->fields(dire_cli);
			$telf=$rs->fields(telf_cli);
		}
		
		$sql="SELECT cod_pro, des_pro FROM productos ORDER BY des_pro ASC"; $rs=$db->Execute($sql);
		$mes="<option value=0 >Seleccione una </option>";$i=0;
		while (!$rs->EOF)
		{
				$mes.="<option value=".$rs->fields(0).">".$rs->fields(1)."</option>";$rs->MoveNext();
		}


		$rs=$db->Execute("SELECT * FROM tempo WHERE c1='$_GET[pro]'");$suma=0;$total=0;$iva=0;
		if ($rs->RowCount()>0){$res="Ya ha agregado el producto";}
		else
		{		
			$rs=$db->Execute("SELECT * FROM productos WHERE cod_pro='$_GET[pro]'");
			$des=$rs->fields(1);$cos=$rs->fields(3); $cane=$rs->fields(4); $stkm=$rs->fields(5);
			if($_GET[cant]>=$cane){$res="AVISO: Cantidad de producto no disponible para facturar. Existen solo $cane $des";}
			
			$rs=$db->Execute("INSERT INTO tempo values ('$_GET[pro]','$des','$cos','$_GET[cant]',NULL,'')");
			$res="Producto agregado al presupuesto";			
		}
		$rs=$db->Execute("SELECT * FROM tempo");
		while (!$rs->EOF)
		{
			$tb.="<tr><td align=center>".$rs->fields(1)."</td><td align=center>".$rs->fields(3)."</td>";
			$tb.="<td align=center>".$rs->fields(2)." Bs.F</td><td align=center>".$rs->fields(3)*$rs->fields(2)." Bs.F</td><tr>";
			$suma+=$rs->fields(3)*$rs->fields(2);
			$rs->MoveNext();
		}
			$tb.="<tr><td colspan=3 align=right ></td><td align=right></td></tr>
			<tr><td colspan=3 align=right >Sub Total </td><td align=center>".$suma." Bs.F</td></tr>";
		
			$tb1.="<tr><td colspan=3 align=right ></td><td align=right></td></tr>
			<tr><td colspan=3 align=right >IVA 12% </td><td align=center>".$suma*0.12." Bs.F</td></tr>";
			$total+=($suma*0.12)+$suma;
			$tb2.="<tr><td colspan=3 align=right ></td><td align=right></td></tr>
			<tr><td colspan=3 align=right >Total a Pagar</td><td align=center>".$total." Bs.F</td></tr>";
		
				
	$gdr="<img width=50 height=50 src=imagenes/guardar.png onclick=javascript:inser();>";
@header("location:../../presupuesto.php?res=$res&cod=$cod&nom=$nom&ape=$ape&dir=$dir&telf=$telf&c1=$c1&n1=$n1&a1=$a1&mes=$mes&tb=$tb&gdr=$gdr&tb1=$tb1&tb2=$tb2");
?>