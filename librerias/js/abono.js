function abono()
{	
	if (document.abon.cod_fact.value.length==0){alert("Debe indicar el numero de Factura");}
	else
	{	
		if (document.abon.cod_cli.value.length==0){alert("Debe indicar Cedula del Cliente");}
		else
		{
			if (document.abon.abono.value.length==0){alert("Debe indicar cuanto abono el cliente");}
			else
			{
		window.location="librerias/php/guar_abono.php?fac="+document.abon.cod_fact.value+"&abono="+document.abon.abono.value+"&ced="+document.abon.cod_cli.value+""
			}
		}
	}
}
