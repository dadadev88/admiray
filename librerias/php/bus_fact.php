<?php 
include("adodb/adodb.inc.php");include("config.php");include("conex.php"); //$db->debug = true;
$cod = $_POST["cod_enc_fac"];

if($cod==NULL)
{
	$res="El campo esta vacio indique el numero de Factura";
}
else
{
	$rs=$db->Execute("SELECT * FROM encab_fac WHERE cod_enc_fac='$cod'");	
 	if ($rs->RowCount()>0)
	{
		$cod_enc_fac=$rs->fields(cod_enc_fac); $ced=$rs->fields(cod_cli); $fec=$rs->fields(fec_enc_fac);
		$imp="<input type=image width=60 height=60 src=imagenes/Printer.png onclick=window.print();>";
		$res="Factura encontrada";

 		$rs=$db->Execute("SELECT * FROM clientes WHERE cod_cli='$ced'");	
		if ($rs->RowCount()>0)
		{
			$nom=$rs->fields(nom_cli);
			$dir=$rs->fields(dire_cli);
			$telf=$rs->fields(telf_cli);
		}
			$rs=$db->Execute("SELECT * FROM detalle_fac WHERE cod_det_fac='$cod'");$suma=0;
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
			
			$iva=$db->Execute("SELECT * FROM iva");
				while (!$iva->EOF)
				{ 
					$fini=$iva->fields(2); $ffin=$iva->fields(3);

					$civa=$db->Execute("SELECT porcentaje FROM iva WHERE $fec BETWEEN $fini AND $ffin");
					
					$ivaf=$civa->fields(0);	
			$tb1.="<tr><td colspan=3 align=right >IVA ".$civa->fields(0)*100 ."%</td><td align=center>".$suma*$ivaf." Bs.F</td></tr>";
					$total+=($suma*$ivaf)+$suma;
					$iva->MoveNext();
				}
						$tb2.="<tr><td colspan=3 align=right >Total a Pagar</td><td align=center>".$total." Bs.F</td></tr>";			

			//$iva=$db->Execute("SELECT porcentaje FROM iva WHERE inicio>'$fec'");
			//$iva1=$iva->fieds(0); $suma=0;
						
	}else{$res="No existe numero de factura";}
}
@header("location:../../bus_fact.php?res=$res&cod=$cod&nom=$nom&dir=$dir&telf=$telf&mes=$mes&c=$c&ced=$ced&fec=$fec&tb=$tb&imp=$imp&tb1=$tb1&tb2=$tb2&iva=$iva");
?>