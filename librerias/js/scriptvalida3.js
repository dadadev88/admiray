function valida1(e) 
{ 
	tecla = (document.all) ? e.keyCode : e.which; 
    if (tecla==8) return true; 
    patron = /^([a-z]|[A-Z]|á|é|í|ó|ú|ñ|ü|\s)+$/	
    te = String.fromCharCode(tecla); 
    return patron.test(te); 
}
function valida2(e) 
{ 
	tecla = (document.all) ? e.keyCode : e.which; 
    if (tecla==8) return true; 
    patron = /^([0-9]|-)+$/  
    te = String.fromCharCode(tecla); 
    return patron.test(te); 
}
function valida3(e) 
{ 
	tecla = (document.all) ? e.keyCode : e.which; 
    if (tecla==8) return true; 
    patron = /^([a-z]|[A-Z]|[0-9]|á|é|í|ó|ú|ñ|ü|\s|-)+$/	
    te = String.fromCharCode(tecla); 
    return patron.test(te); 
}
function valida4(e) 
{ 
	tecla = (document.all) ? e.keyCode : e.which; 
    if (tecla==8) return true; 
    patron = /^([0-9]|-|J|j|G|g|V|v|E|e)+$/  
    te = String.fromCharCode(tecla);	  
	return patron.test(te); 
}
function valida5(e) 
{ 
	tecla = (document.all) ? e.keyCode : e.which; 
    if (tecla==8) return true; 
    patron = /^([0-9]|V|v|E|e|-)+$/  
    te = String.fromCharCode(tecla);	  
	return patron.test(te); 
}
function valida6(e) 
{ 
	tecla = (document.all) ? e.keyCode : e.which; 
    if (tecla==8) return (true); 
	patron = /^(\d|,)+$/  
    te = String.fromCharCode(tecla); 
    return patron.test(te); 
}
function valida7(e) 
{ 
	tecla = (document.all) ? e.keyCode : e.which; 
    if (tecla==8) return (true); 
	patron = /^(\d)+$/  
    te = String.fromCharCode(tecla); 
    return patron.test(te); 
}
function valida8(e) 
{ 
	tecla = (document.all) ? e.keyCode : e.which; 
    if (tecla==8) return (true); 
	patron = /^(\d|.)+$/  
    te = String.fromCharCode(tecla); 
    return patron.test(te); 
}
