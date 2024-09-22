<?php 
	include("adodb/adodb.inc.php");include("config.php");include("conex.php");//$db->debug = true;

$rs=$db->Execute("TRUNCATE TABLE tempo");
$codpre=$_GET['cod'];

if($codpre==NULL){$res="El campo no puede estar vacio. Ingrese el Presupuesto a importar";}
else
{
	$rs=$db->Execute("SELECT * FROM encab_pre WHERE cod_encab_pre='$codpre'");	
	$cod=$rs->fields(1);
	if ($rs->RowCount()>0)
	{
		$rs=$db->Execute("SELECT * FROM clientes WHERE cod_cli='$cod'");	
		if ($rs->RowCount()>0)
		{$nom=$rs->fields(nom_cli);$ape=$rs->fields(ape_cli);$dir=$rs->fields(dire_cli);$telf=$rs->fields(telf_cli);}

 		$rs=$db->Execute("SELECT * FROM detalle_pre WHERE cod_det_pre='$codpre'");	
		if ($rs->RowCount()>0)
		{
			while (!$rs->EOF)
			{
				$codpro=$rs->fields(1); $canpro=$rs->fields(2); $cospro=$rs->fields(3);
	
				$rs1=$db->Execute("SELECT * FROM productos WHERE cod_pro='$codpro'");$despro=$rs1->fields(1);
	
				$db->Execute("INSERT INTO tempo values ('$codpro','$despro','$cospro','$canpro',NULL,'')");
				$rs->MoveNext();
			}
						$res="Productos de Presupuesto numero $codpre agregado a la Factura satisfactoriamente";
		}
		
		$sql="SELECT cod_pro, des_pro FROM productos ORDER BY des_pro ASC";$rs=$db->Execute($sql);
		$mes="<option value=0 >Seleccione una </option>";$i=0;
		while (!$rs->EOF)
		{
				$mes.="<option value=".$rs->fields(0).">".$rs->fields(1)."</option>";$rs->MoveNext();
		}
			
			$rs=$db->Execute("SELECT * FROM tempo");
			while (!$rs->EOF)
			{
				$id=$rs->fields(id);
				$tb.="<tr><td align=center>".$rs->fields(1)."</td><td align=center>".$rs->fields(3)."</td>";
				$tb.="<td align=center>".$rs->fields(2)." Bs.F</td><td align=center>".$rs->fields(3)*$rs->fields(2)." Bs.F</td><td>
				<a href=librerias/php/bor_pro_fac.php?id=$id>Borrar</a></td><tr>";
				$suma+=$rs->fields(3)*$rs->fields(2);
				$rs->MoveNext();
			}
			$tb.="<tr><td colspan=3 align=right >Sub Total </td><td align=center>".$suma." Bs.F</td></tr>";
			
			$tb1.="<tr><td colspan=3 align=right >IVA 12% </td><td align=center>".$suma*0.12." Bs.F</td></tr>";
			$total+=($suma*0.12)+$suma;
			$tb2.="<tr><td colspan=3 align=right >Total a Pagar</td><td align=center>".$total." Bs.F</td></tr>";

		}else{$res="Presupuesto no existe"; @header("location:../../factura.php?res=$res");}
}
	@header("location:../../factura.php?res=$res&cod=$cod&nom=$nom&ape=$ape&dir=$dir&telf=$telf&c1=$c1&n1=$n1&a1=$a1&mes=$mes&tb=$tb&gdr=$gdr&tb1=$tb1&tb2=$tb2");
?><? /*$sql="SELECT cod_pro, des_pro FROM productos ORDER BY des_pro ASC";$rs=$db->Execute($sql);
		$mes="<option value=0 >Seleccione una </option>";$i=0;
		while (!$rs->EOF)
		{
				$mes.="<option value=".$rs->fields(0).">".$rs->fields(1)."</option>";$rs->MoveNext();
		}


		$rs=$db->Execute("SELECT * FROM tempo WHERE c1='$_GET[pro]'");$suma=0;
		if ($rs->RowCount()>0){$res="Ya ha agregado el producto a la factura";}
		else
		{		
			$rs=$db->Execute("SELECT * FROM productos WHERE cod_pro='$_GET[pro]'");
			$des=$rs->fields(1);$cos=$rs->fields(3); $cane=$rs->fields(4);
			if($_GET[cant]>$cane){$res="Cantidad de producto no disponible. Existen solo $cane $des";}
			else
			{			
				$rs=$db->Execute("INSERT INTO tempo values ('$_GET[pro]','$des','$cos','$_GET[cant]',NULL,'')");
				$res="Producto agregado a la Factura satisfactoriamente";
			}
		}*/?>
		