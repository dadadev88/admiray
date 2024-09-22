<?php 
	include("adodb/adodb.inc.php");include("config.php");include("conex.php"); //$db->debug = true;
	$codprov=$_GET['rif'];
	$rs=$db->Execute("SELECT * FROM proveedor WHERE rif_prov='$_GET[rif]'");	
		if ($rs->RowCount()>0)
		{
			$nom=$rs->fields(nom_prov);
			$dir=$rs->fields(direc_prov);
			$telf=$rs->fields(telf_prov);
			
		
				}
		else{$res="Proveedor no Existe";}	
		
		$sql="SELECT cod_pro, des_pro FROM productos ORDER BY des_pro ASC";$rs=$db->Execute($sql);
		$mes="<option value=0 >Seleccione una </option>";$i=0;
		while (!$rs->EOF)
		{
				$mes.="<option value=".$rs->fields(0).">".$rs->fields(1)."</option>";$rs->MoveNext();
		}


		$rs=$db->Execute("SELECT * FROM tempo WHERE c1='$_GET[pro]'");$suma=0;
		if ($rs->RowCount()>0){$res="Ya se encuentra el producto en la compra";}
		else
		{	
			
			$rs=$db->Execute("SELECT * FROM productos WHERE cod_pro='$_GET[pro]'");
			$des=$rs->fields(1);$cos=$rs->fields(3); $cane=$rs->fields(4);
			
			$rs=$db->Execute("INSERT INTO tempo values ('$_GET[pro]','$des','$cos','$_GET[cant]',NULL,'')");
			$res="Producto agregado a la Orden de Compra satisfactoriamente";
			
		}
		$rs=$db->Execute("SELECT * FROM tempo");
		while (!$rs->EOF)
		{
			$tb.="<tr><td align=center>".$rs->fields(1)."</td><td align=center>".$rs->fields(3)."</td>";
			$suma=$rs->fields(3)+$suma;
			$rs->MoveNext();
			
		}
		$tb.="<tr><td align=right >Total de productos a comprar</td><td align=center>".$suma."</td></tr>";
		
		/*$tb1.="<tr><td colspan=3 align=right ></td><td align=right></td></tr>
			<tr><td colspan=3 align=right >IVA 12% </td><td align=center>".$suma*0.12." Bs.F</td></tr>";
			$total+=($suma*0.12)+$suma;
			$tb2.="<tr><td colspan=3 align=right ></td><td align=right></td></tr>
			<tr><td colspan=3 align=right >Total a Pagar</td><td align=center>".$total." Bs.F</td></tr>";
		*/
				
	$gdr="<img width=50 height=50 src=imagenes/guardar.png onclick=javascript:inser();>";
	@header("location:../../orden_compra.php?res=$res&codprov=$codprov&nom=$nom&dir=$dir&telf=$telf&email=$email&c1=$c1&n1=$n1&a1=$a1&mes=$mes&tb=$tb&enc=$enc&tb1=$tb1&tb2=$tb2&gdr=$gdr&codprov=$codprov");
?>
