function val()
{
	var busca=new Array(); var i=0; var h=0; var hf="";
	hf+="&ced="+document.pedi.cod_cli.value;
	if (document.pedi.pro.value==0){busca[i]= ".- Debe seleccionar un producto";i++;}
	else{hf+="&pro="+document.pedi.pro.value}
	if (document.pedi.cant.value.length==0){busca[i]= ".- Debes indicar la cantidad";i++; document.pedi.cant.focus()}
	else{hf+="&cant="+document.pedi.cant.value}
	if (i>0){
		msg="VERIFIQUE QUE LOS SIGUIENTES CAMPOS\nNO ESTEN EN BLANCO O FUERA DE CONTEXTO:\n"; 
		for (i=0;i<busca.length;i++){msg+="\n"+busca[i]; }alert(msg);
	 }
	 else{subh(hf);}			
}

function subh(hf){window.location="librerias/php/deta_pedi.php?"+hf}
function inser(){window.location="librerias/php/guar_pedi.php?ced="+document.pedi.cod_cli.value+""}