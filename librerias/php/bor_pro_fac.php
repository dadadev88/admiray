<?php
	include("adodb/adodb.inc.php");include("config.php");include("conex.php"); //$db->debug = true;
   $id=$_GET['id'];
   $rs=$db->Execute("DELETE FROM tempo WHERE id= '$id'");
	
include("deta_fac.php");
$cod=$_GET['ced'];
  
 $rs=$db->Execute("SELECT * FROM clientes WHERE cod_cli='$cod'");	
		if ($rs->RowCount()>0){$nom=$rs->fields(nom_cli);$ape=$rs->fields(ape_cli);$dir=$rs->fields(dire_cli);
				$telf=$rs->fields(telf_cli);}
		
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
			<a href=librerias/php/bor_pro_fac.php?id=$id&ced=$cod>Borrar</a></td><tr>";
			$suma+=$rs->fields(3)*$rs->fields(2);$rs->MoveNext();
		}
		$tb.="<tr><td colspan=3 align=right >Sub Total </td><td align=center>".$suma." Bs.F</td></tr>";
			
			$tb1.="<tr><td colspan=3 align=right >IVA 12% </td><td align=center>".$suma*0.12." Bs.F</td></tr>";
			$total+=($suma*0.12)+$suma;
			$tb2.="<tr><td colspan=3 align=right >Total a Pagar</td><td align=center>".$total." Bs.F</td></tr>";
@header("location:../../factura.php?cod=$cod&nom=$nom&ape=$ape&dir=$dir&telf=$telf&mes=$mes&tb=$tb&gdr=$gdr&tb1=$tb1&tb2=$tb2");
?>
