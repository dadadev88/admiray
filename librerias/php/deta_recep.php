<?php 
	include("adodb/adodb.inc.php");include("config.php");include("conex.php"); //$db->debug = true;
$rif = $_GET["rif"];
 	$rs=$db->Execute("SELECT * FROM proveedor WHERE rif_prov='$_GET[rif]'");	
		if ($rs->RowCount()>0)
		{
			$nom=$rs->fields(nom_prov);
			$dir=$rs->fields(direc_prov);
			$telf=$rs->fields(telf_prov);
			$per=$rs->fields(perso_con_prov);
			$email=$rs->fields(email);
		}
		
		$sql="SELECT cod_pro, des_pro FROM productos ORDER BY des_pro ASC";$rs=$db->Execute($sql);
		$mes="<option value=0 >Seleccione una </option>";$i=0;
		while (!$rs->EOF)
		{
				$mes.="<option value=".$rs->fields(0).">".$rs->fields(1)."</option>";$rs->MoveNext();
		}


		$rs=$db->Execute("SELECT * FROM tempo WHERE c1='$_GET[pro]'");$suma=0;
		if ($rs->RowCount()>0){$res="Ya ha agregado el producto a la recepcion";}
		else
		{		
			$rs=$db->Execute("SELECT * FROM productos WHERE cod_pro='$_GET[pro]'");
			$des=$rs->fields(1);$cos=$rs->fields(3); $cane=$rs->fields(4);
						
				$rs=$db->Execute("INSERT INTO tempo values ('$_GET[pro]','$des','$_GET[cant]',NULL,'','')");
				$res="Producto agregado a la Recepcion satisfactoriamente";
			
		}
		
		$rs=$db->Execute("SELECT * FROM tempo");
		while (!$rs->EOF)
		{
		 	$id=$rs->fields(id);
			$tb.="<tr><td align=center>".$rs->fields(1)."</td><td align=center>".$rs->fields(2)."</td></tr>";
			$suma=$rs->fields(2)+$suma;
			$rs->MoveNext();
		}
			$tb1.="<tr><td align=right >Total de productos ha actualizar</td><td align=center>".$suma."</td></tr>";
		$img="<img width=50 height=50 src=imagenes/guardar.png onclick=javascript:inser();>";
	@header("location:../../recepcion.php?res=$res&rif=$rif&nom=$nom&ape=$ape&dir=$dir&telf=$telf&c1=$c1&n1=$n1&a1=$a1&mes=$mes&tb=$tb&tb1=$tb1&img=$img");
?>