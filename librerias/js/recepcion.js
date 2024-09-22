function val()
{
	var busca=new Array(); var i=0; var h=0; var hf="";
	hf+="&rif="+document.recep.rif_prov.value;
	if (document.recep.pro.value==0){busca[i]= ".- Debe seleccionar un producto";i++;}
	else{hf+="&pro="+document.recep.pro.value}
	if (document.recep.cant.value.length==0){busca[i]= ".- Debe indicar la cantidad de producto recibida";i++; document.recep.cant.focus()
    }
	else{hf+="&cant="+document.recep.cant.value}
	if (i>0){
		msg="VERIFIQUE QUE LOS SIGUIENTES CAMPOS\nNO ESTEN EN BLANCO O FUERA DE CONTEXTO:\n"; 
		for (i=0;i<busca.length;i++){msg+="\n"+busca[i]; }alert(msg);
	 }
	 else{subh(hf);}			
}

function subh(hf){window.location="librerias/php/deta_recep.php?"+hf}
function inser(){window.location="librerias/php/guar_recep.php?rif="+document.recep.rif_prov.value+""}
//function buspre(){window.location="librerias/php/bus_pre_fac.php?cod="+document.recep.cod_pre.value+""}