	agrefun(window,'load', inicio);
function inicio()
{
	var ta=document.getElementsByTagName('img');
	for (i=6;i<ta.length;i++){
		agrefun(ta[i],'click', opcion);
	}
}
function menu(elEvento)
{
	var e = window.event || elEvento; var ele = (document.all) ? e.scrElement : e.target;document.getElementById('op').src="";
	ob=document.getElementById(ele.id+'m');	div=document.getElementsByTagName('div');
	for(i=0;i<div.length;i++){if (div[i].className=='sub'){if (div[i]==ob){div[i].style.display='block'}else {div[i].style.display='none'}}}
}

function ocultar(id){
	document.getElementById(id).style.display='none'
}
function mostrar(id){
	document.getElementById(id).style.display='block'
}

function agrefun(elemento, tipoEvento, funcion)
{
	if(elemento.addEventListener)
		elemento.addEventListener(tipoEvento, funcion, false);
	else if(elemento.attachEvent)
		elemento.attachEvent("on"+tipoEvento, funcion);
	else
		elemento["on"+tipoEvento] = funcion;
}
function opcion(elEvento)
{
	var e = window.event || elEvento;
	var ele = (document.all) ? e.scrElement : e.target;
	switch(ele.id)//coloca ele.id
	{
		//entre comillas colocas el ide de la imagen
		//Clientes
		case"agre": document.getElementById('op').src='clientes.php'; break;
		case"bus": document.getElementById('op').src='bus_clientes.php'; break;
		case'edit': document.getElementById('op').src='modi_clientes.php'; break;
		case'eli': document.getElementById('op').src='eli_clientes.php'; break;
		//Proveedores
		case"agre_prov": document.getElementById('op').src='proveedores.php'; break;
		case"bus_prov": document.getElementById('op').src='bus_proveedores.php'; break;
		case'edit_prov': document.getElementById('op').src='modi_proveedores.php'; break;
		case'eli_prov': document.getElementById('op').src='eli_proveedores.php'; break;
		//Productos
		case"agre_pro": document.getElementById('op').src='productos.php'; break;
		case"bus_pro": document.getElementById('op').src='bus_productos.php'; break;
		case'edit_pro': document.getElementById('op').src='modi_productos.php'; break;
		case'eli_pro': document.getElementById('op').src='eli_productos.php'; break;
		//Ventas
		case"presu": document.getElementById('op').src='presupuesto.php'; break;
		case"bus_presu": document.getElementById('op').src='bus_presu.php'; break;
		case'consul_presu': document.getElementById('op').src='consul.php'; break;
		case'eli_presu': document.getElementById('op').src='eli_presupuestos.php'; break;

		case"fact": document.getElementById('op').src='factura.php'; break;
		case"bus_fact": document.getElementById('op').src='bus_fact.php'; break;
		case'consul_fact': document.getElementById('op').src='consul_fact.php'; break;
		case'eli_fact': document.getElementById('op').src='eli_facturas.php'; break;

		case"ped": document.getElementById('op').src='pedido.php'; break;
		case'bus_ped': document.getElementById('op').src='bus_pedi.php'; break;
		case'consul_ped': document.getElementById('op').src='consul_pedi.php'; break;

		case"abono": document.getElementById('op').src='c_cobrar.php'; break;
		case"bus_abono": document.getElementById('op').src='abonos.php'; break;
		case'por_pagar': document.getElementById('op').src='cuentaspocobrar.php'; break;
		case'': document.getElementById('op').src='eli_pedidos.php'; break;
		//Compras
		case"presu_compra": document.getElementById('op').src='presu_compra.php'; break;
		case"bus_pre_comp": document.getElementById('op').src='bus_presu_comp.php'; break;
		case"consul_pre_comp": document.getElementById('op').src='consul_presu_comp.php'; break;


		case"orden_compra": document.getElementById('op').src='orden_compra.php'; break;
		case"bus_ord_comp": document.getElementById('op').src='bus_ord_comp.php'; break;
		case"consul_ord_comp": document.getElementById('op').src='consul_ord_comp.php'; break;


		case"recep": document.getElementById('op').src='recepcion.php'; break;
		case"bus_recep": document.getElementById('op').src='bus_recep.php'; break;
		case"consul_recep": document.getElementById('op').src='consul_recep.php'; break;
		//Stock
		case"stk": document.getElementById('op').src='stock.php'; break;
		case"pro_fal": document.getElementById('op').src='pro_faltante.php'; break;
		case"pro_sob": document.getElementById('op').src='pro_sobrante.php'; break;
		case"mas_ven": document.getElementById('op').src='prod_mas_vendido.php'; break;
		//Mantenimiento
		case"vuser": document.getElementById('op').src='verusuarios.php'; break;
		case"backup": document.getElementById('op').src='backup.php'; break;
		case"iva": document.getElementById('op').src='iva.php'; break;
		//Ayuda
		case"mdu": document.getElementById('op').src='Manual de Usuarios IAMCREPO.pdf'; break;
		case"cred": document.getElementById('op').src='creditos.php'; break;
		case"edit_prov": document.getElementById('op').src=''; break;
		case"eli_prov": document.getElementById('op').src=''; break;
		//Salir
		case"salirm": window.location="index.php" ; break;
	}
}