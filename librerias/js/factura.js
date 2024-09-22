function val()
{
	var busca=new Array(); var i=0; var h=0; var hf="";
	hf+="&ced="+document.fact.cod_cli.value;
	if (document.fact.pro.value==0){busca[i]= ".- Debe seleccionar un producto";i++;}
	else{hf+="&pro="+document.fact.pro.value}
	if (document.fact.cant.value.length==0){busca[i]= ".- Debes indicar la cantidad";i++; document.fact.cant.focus()
    }
	else{hf+="&cant="+document.fact.cant.value}
	if (i>0){
		msg="VERIFIQUE QUE LOS SIGUIENTES CAMPOS\nNO ESTEN EN BLANCO O FUERA DE CONTEXTO:\n"; 
		for (i=0;i<busca.length;i++){msg+="\n"+busca[i]; }alert(msg);
	 }
	 else{subh(hf);}			
}

function subh(hf){window.location="librerias/php/deta_fac.php?"+hf}
function inser()
{
	if (document.fact.cond.value==0){alert("Debe seleccionar la forma de pago");}
	else
	{
		window.location="librerias/php/inser_fact.php?ced="+document.fact.cod_cli.value+"&cond="+document.fact.cond.value+""
	}
}
function buspre(){window.location="librerias/php/bus_pre_fac.php?cod="+document.fact.cod_pre.value+""}