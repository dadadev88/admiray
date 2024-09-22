function validacionpre(f) 
{
	
	var er_numero = /^(\d{4}\-\d{7})+$/
	var er_email = /[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/
	var er_url = /^(http:\/\/[w-w]{3}\.\w+\.(com|com.ve|es|net|org|org.ve|gob.ve|gov.ve|edu.ve))$/
	var i=0
	var j=0
	var h=0
	var busca=new Array();
	//alert(document.getElementById('checka').disabled) 
if (document.getElementById('checka').disabled==false) 
{
	
	if (f.tdc[0].checked)
	{
		var er_ced = /^((V|v|E|e)\-\d{5,8})+$/;
		if (f.ced_cli.value==""){alert("Numero de cedula (No puede estar en blanco)");return(false);}	
		else
		{
			if(!er_ced.test(f.ced_cli.value) ) {alert("Numero de cedula (No esta en los parametros Ej: V-12345678 o E-12345678)");return(false)}
			else{return(true)} 
		}
	}
	 else
	{
		var er_rif = /^((J|j)\-\d{8}\-\d{1})+$/
		if (f.rif_cli.value==""){alert("Numero de Rif (No puede estar en blanco)");return(false);}		
		else
		{
			if(!er_rif.test(f.rif_cli.value)) {alert("Numero de Rif (No esta en los parametros Ej: J-12345678-0)");return(false);
			}
			else{return(true)}  
		}	
	}
}
else
{
/*
//razon social
	if(formulario.nombre.value.length<5) 
	{ 
		busca[i]= "Razon Social (No puede estar en blanco)";	
		i++;
	}
//telefonos
	if (formulario.tlf1.value!="")
	{
		if(!er_numero.test(formulario.tlf1.value) ) 
		{
			busca[i]= "Numero del primer telefono ((code)numero)"
			i++;
		}
	}
	if (formulario.tlf2.value!="")
	{
		if(!er_numero.test(formulario.tlf2.value) ) 
		{
			busca[i]= "Numero del Segundo telefono ((code)numero)"
			i++;
		}
	}
	if (formulario.tlf3.value!="")
	{
		if(!er_numero.test(formulario.tlf3.value) ) 
		{
			busca[i]= "Numero del fax ((code)numero)"
			i++;
		}
	}
//correos
	if (formulario.email1.value!="")
	{
		if(!er_email.test(formulario.email1.value) ) 
		{
			busca[i]= "Primer Correo Electronico"
			i++;
		}
	}
	if (formulario.email2.value!="")
	{
		if(!er_email.test(formulario.email2.value) ) 
		{
			busca[i]= "Segundo Correo Electronico"
			i++;
		}
	}
//url
	if (formulario.url.value!="http://www.")
	{
		if(!er_url.test(formulario.url.value) ) 
		{
			busca[i]= "Direccion del Sitio Web"
			i++;
		}
	}
//direccion
	if (formulario.direccion.value!="")
	{
		if(formulario.direccion.value.length<20) 
		{
			busca[i]= "Direccion (Longitud minima 20 Caraccteres)"
			i++;
		}
	}
	else
	{
			busca[i]= "Direccion (No puede estar en blanco)"
			i++;
	}*/
}
	if (i>0){
		msg="　　　　　ERROR!!!!!!!!!!\n\nVERIFIQUE QUE LOS SIGUIENTES CAMPOS\nNO ESTEN EN BLANCO O FUERA DE CONTEXTO:\n"; 
		for (i=0;i<busca.length;i++)
	 		msg+="\n"+busca[i]; 
	 	alert(msg)
	 return (false);
	 }
	 else
	 {
		return (true);
	}			
	return (false);
}
function ocultar(id){document.getElementById(id).style.display='none'}
function mostrar(id){document.getElementById(id).style.display='block'}
