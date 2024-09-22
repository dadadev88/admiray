<?php 
include("adodb/adodb.inc.php");include("config.php");include("conex.php"); //$db->debug = true;
$ced = $_POST["ced_cli"];
	if($ced==NULL)
	{
		$res="El campo no puede estar vacio";}
	else 
	{
		$rs=$db->Execute("SELECT * FROM clientes WHERE cod_cli='$ced'");
			if ($rs->RowCount()>0){ 
			$res="Cliente encontrado";
			$la="
		<tr>
			<td align=center>".$rs->fields(0)."</td>
			<td align=center>".$rs->fields(1)."</td>
			<td align=center>".$rs->fields(2)."</td>
			<td align=center>".$rs->fields(3)."</td>
			<td align=center>".$rs->fields(4)."</td>
  		</tr>";
			}
			else{$res="Cliente no existe";}
	}
/*if(isset($res)){*/@header("location:../../bus_clientes.php?res=$res&la=$la");//}
?>
