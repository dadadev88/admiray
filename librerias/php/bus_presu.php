<?php 

	include("adodb/adodb.inc.php");include("config.php");include("conex.php"); //$db->debug = true;
$cod = $_POST["cod_enc_pre"];

if($cod==NULL){$res="El campo no puede estar vacio. Ingrese presupuesto a buscar";}
else
{
	$rs=$db->Execute("SELECT * FROM encab_pre WHERE cod_encab_pre='$cod'");	
	if ($rs->RowCount()>0)
	{	
		$res="Presupuesto encontrado";
		$imp="<input type=image width=60 height=60 src=imagenes/Printer.png onclick=window.print(); class=imp>";
		$cod_enc_pre=$rs->fields(cod_enc_pre); $ced=$rs->fields(cod_cli); $fec=$rs->fields(fecha);
	
		$rs=$db->Execute("SELECT * FROM clientes WHERE cod_cli='$ced'");	
			
				$nom=$rs->fields(nom_cli);
				$dir=$rs->fields(dire_cli);
				$telf=$rs->fields(telf_cli);
			
	
		$rs=$db->Execute("SELECT * FROM detalle_pre WHERE cod_det_pre='$cod'");$suma=0;$total=0;$iva=0;
		while (!$rs->EOF)
		{		
				$cod_pro=$rs->fields(cod_pro); 
				$rs1=$db->Execute("SELECT des_pro,cos_pro FROM productos WHERE cod_pro='$cod_pro'");
				$tb.="<tr><td align=center>".$rs1->fields(des_pro)."</td><td align=center>".$rs->fields(2)."</td>";
				$tb.="<td align=center>".$rs->fields(3)." Bs.F</td><td align=center>".$rs->fields(3)*$rs->fields(2)." Bs.F</td><tr>";
				$suma+=$rs->fields(3)*$rs->fields(2);
			$rs->MoveNext();
		}
				$tb.="<tr><td colspan=3 align=right >Sub Total </td><td align=center>".$suma." Bs.F</td></tr>";
				
				$tb1.="<tr><td colspan=3 align=right >IVA 12% </td><td align=center>".$suma*0.12." Bs.F</td></tr>";
				$total+=($suma*0.12)+$suma;
				$tb2.="<tr><td colspan=3 align=right >Total a Pagar</td><td align=center>".$total." Bs.F</td></tr>";
	}else{$res="No existe numero de Presupuesto";}	
}
@header("location:../../bus_presu.php?res=$res&cod=$cod&nom=$nom&dir=$dir&telf=$telf&mes=$mes&c=$c&ced=$ced&fec=$fec&tb=$tb&imp=$imp&tb1=$tb1&tb2=$tb2");
?>