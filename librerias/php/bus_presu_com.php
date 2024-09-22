<?php 

include("adodb/adodb.inc.php");include("config.php");include("conex.php"); //$db->debug = true;
$cod = $_POST["cod_pre_comp"];
 $rs=$db->Execute("SELECT * FROM enc_pre_comp WHERE cod_pre_comp ='$cod'");	
 	if ($rs->RowCount()>0){
	if($cod!=NULL){$imp="<input type=image width=60 height=60 src=imagenes/Printer.png onclick=window.print();>";}else{$imp="";}

	$cod_pre_comp=$rs->fields(0); $rif=$rs->fields(1); $fec=$rs->fields(2);

 	$rs=$db->Execute("SELECT * FROM proveedor WHERE rif_prov='$rif'");	
		if ($rs->RowCount()>0)
		{
			$nom=$rs->fields(1);
			$dir=$rs->fields(2);
			$telf=$rs->fields(3);
			$res="Presupuesto de Compra encontrado";
		}

	$rs=$db->Execute("SELECT * FROM det_pre_comp WHERE cod_det_pre_comp ='$cod'");
while (!$rs->EOF)
	{
		$cod_pro=$rs->fields(cod_pro); 
			$rs1=$db->Execute("SELECT des_pro FROM productos WHERE cod_pro='$cod_pro'");
			$tb.="<tr><td align=center>".$rs1->fields(des_pro)."</td><td align=center>".$rs->fields(2)."</td>";
			$suma=$rs->fields(2)+$suma;
		$rs->MoveNext();
	}
			$tb.="<tr><td align=right >Total de Productos cotizados</td><td align=center>".$suma."</td></tr>";
						
	}else{$res="No existe numero de Presupuesto de Compra";}
@header("location:../../bus_presu_comp.php?res=$res&rif=$rif&nom=$nom&dir=$dir&telf=$telf&mes=$mes&c=$c&ced=$ced&fec=$fec&tb=$tb&imp=$imp&cod=$cod");
?>