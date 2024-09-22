function val()
{
	var busca=new Array(); var i=0; var h=0; var hf="";
	hf+="&rif="+document.presu.rif_prov.value;
	if (document.presu.pro.value==0){busca[i]= ".- Debe seleccionar un producto";i++;}
	else{hf+="&pro="+document.presu.pro.value}
	if (document.presu.cant.value.length==0){busca[i]= ".- Debes indicar la cantidad";i++; document.presu.cant.focus()
    }
	else{hf+="&cant="+document.presu.cant.value}
	if (i>0){
		msg="VERIFIQUE QUE LOS SIGUIENTES CAMPOS\nNO ESTEN EN BLANCO O FUERA DE CONTEXTO:\n"; 
		for (i=0;i<busca.length;i++){msg+="\n"+busca[i]; }alert(msg);
	 }
	 else{subh(hf);}			
}

function subh(hf){window.location="librerias/php/presu_ord_com.php?"+hf}
function inser(){window.location="librerias/php/inser_pre_comp.php?rif="+document.presu.rif_prov.value+""}