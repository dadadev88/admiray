<?php 
include("adodb/adodb.inc.php");include("config.php");include("conex.php"); //$db->debug = true;

	
	//
	include("adodb/adodb.inc.php");include("config.php");include("conex.php"); //$db->debug = true;
$cod = $_POST["cod_pro"];
 	$rs=$db->Execute("SELECT * FROM productos WHERE cod_pro='$cod'");	
		if ($rs->RowCount()>0)
		{
			$des=$rs->fields(1);
			$pre=$rs->fields(2);
			$cos=$rs->fields(3);
			$cant=$rs->fields(4);
			$stkmin=$rs->fields(5);
			$stkmax=$rs->fields(6);
		}
		else{$res="Producto no existe";}	
@header("location:../../modi_productos.php?res=$res&cod=$cod&des=$des&pre=$pre&cos=$cos&cant=$cant&stkmin=$stkmin&stkmax=$stkmax");
?>
	
<?
include("adodb/adodb.inc.php");include("config.php");include("conex.php"); $db->debug = true;
	 	if($_POST["cod_pro"]==NULL)
		{$res="Codigo no puestar estar vacio";}
	else
	{
		$rs2=$db->Execute("SELECT * FROM productos WHERE cod_pro='$_POST[cod_pro]'");
		if ($rs2->RowCount()>0)
		{ 
$rs2=$db->Execute("UPDATE productos SET des_pro='$_POST[des_pro]', pre_pro='$_POST[pre_pro]', cos_pro='$_POST[cos_pro]', can_pro='$_POST[can_pro]', stk_min='$_POST[stk_min]',stk_max='$_POST[stk_max]' WHERE cod_pro='$_POST[cod_pro]'");
			$res="Producto Modificado";
		}
		else{$res="Producto no existe";}
	}
if(isset($res)){@header("location:../../modi_productos.php?res=$res");} 
?>

