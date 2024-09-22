<?php 

	include("adodb/adodb.inc.php");include("config.php");include("conex.php");// $db->debug = true;
$cod = $_POST["cod_enc_pre"];
if($cod!=NULL){$imp="<input type=image width=60 height=60 src=imagenes/Printer.png onclick=window.print(); class=imp>";}else{$imp="";}
 $rs=$db->Execute("SELECT * FROM encab_ped WHERE cod_encab_ped ='$cod'");	
if ($rs->RowCount()>0)
{
	$res="Pedido encontrado";
	$cod_enc_pre=$rs->fields(0); $ced=$rs->fields(1); $fec=$rs->fields(2);

 	$rs=$db->Execute("SELECT * FROM clientes WHERE cod_cli='$ced'");	
		if ($rs->RowCount()>0)
		{
			$nom=$rs->fields(nom_cli);
			$dir=$rs->fields(dire_cli);
			$telf=$rs->fields(telf_cli);
		}

	$rs=$db->Execute("SELECT * FROM detalle_ped WHERE cod_det_ped='$cod'");$suma=0;$total=0;$iva=0;
while (!$rs->EOF)
	{$cod_pro=$rs->fields(cod_pro); 
			$rs1=$db->Execute("SELECT des_pro,cos_pro FROM productos WHERE cod_pro='$cod_pro'");
			$tb.="<tr><td align=center>".$rs1->fields(des_pro)."</td><td align=center>".$rs->fields(2)."</td><tr>";
		$suma=$rs->fields(2)+$suma;
		$rs->MoveNext();
	}
			$tb.="<tr><td align=right >Total de Productos pedidos </td><td align=center>".$suma."</td></tr>";
}else{$res="No existe numero de pedido";}						
@header("location:../../bus_pedi.php?res=$res&cod=$cod&nom=$nom&dir=$dir&telf=$telf&c=$c&ced=$ced&fec=$fec&tb=$tb&imp=$imp&tb1=$tb1&tb2=$tb2");
?>