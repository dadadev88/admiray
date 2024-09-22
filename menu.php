<?php
session_start();
$res="No puedes entrar al sistema sino eres usuario o administrador";
if ($_GET['nom']==NULL){header("location:index.php?res=$res");}
?>
<?php
function vendedor()
{
$nom=$_GET['nom'];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="librerias/css/menu.css" media="screen" type="text/css" rel="stylesheet" />
<script language="javascript" src="librerias/js/menu.js" type="text/javascript"></script>
<title>Admiray System</title>
</head>
<body>
<div align="center" class="error" id="er">
  <?php if(isset($_GET["msj"])) {
    echo $_GET["msj"];?>
    <script>
      mostrar('er');
      setTimeout(ocultar,5000,'er');
    </script>
  <? } ?>
</div>
<div class="titulo1">
  Bienvenido <?php
  if(isset($_GET['nom'])){
    echo strtoupper($_GET['nom']);
  }
  date_default_timezone_set('America/Lima');
  echo " | Fecha: ".date( "d/m/Y" );
  ?>
</div>
<div class="titulo">Menu Principal</div>
<table class="top">
  <tr valign="bottom">
    <td><a id="cli" title="Agregar y Busca Clientes" onclick="menu(event)"><img src="Imagenes/users.png" width="100" border="0" id="cli"><br>
    <span>Clientes</span></a></td>
    <td><a id="prov"  title="Agregar y Buscar Proveedores" onclick="menu(event)" ><img src="Imagenes/proveedores.png" width="100"  border="0" id="prov"><br>
    <span>Proveedores</span></a></td>
    <td><a id="pro" title="Agregar y Busca Productos" onclick="menu(event)"><img src="Imagenes/productos1.png" width="100" border="0" id="pro"><br>
     <span>Productos</span> </a></td>
     <td><a id="compra" title="compra: Presupuestos, Facturas, Pedidos, etc." onclick="menu(event)"><img src="imagenes/Compra2.png" width="100" border="0" name="Compra" id="compra"><br>
     <span>Compra</span></a></td>
    <td><a id="venta" title="Venta: Presupuestos, Facturas, Pedidos, etc." onclick="menu(event)"><img src="Imagenes/venta.png" width="100" border="0" name="proveedor" id="venta"><br>
     <span>Venta</span></a></td>
    <td><a id="stock" title="Stock de productos" onclick="menu(event)"><img id="stock" src="Imagenes/inventario.png" width="100" onclick="menu(event)"><br>
     <span>Stock de Productos</span></a></td>
     <td width="100"><a id="mantenimiento" title="Ayuda del sistema" onclick="menu(event)"><img src="imagenes/mantenimiento.png" name="mantenimiento" width="60" id="mantenimiento" onclick="menu(event)"><br>
    <span>Mantenimiento</span></a></td>
       <td width="80"><a id="ayuda" title="Ayuda del sistema" onclick="menu(event)"><img src="imagenes/Help1.png" name="ayuda" width="60" id="ayuda" onclick="menu(event)"><br>
    <span>Ayuda</span></a></td>
    <td width="80"><div id="salirm"><a id="salirm" title="Salir del sistema" onclick="menu(event)"><img border="0" src="imagenes/exit.png" name="ayuda" width="60" id="salirm" onclick="menu(event)"><br>
    <span>Salir</span></a></div></td>
  </tr>
</table>
<div class="titulo" >Admiray System</div><p>
<!--SI METES UNA IMAGEN ANTES DE ESTE COMENTARIO VA AFECTAR EL SUB MENU!!! MOSCA!!!-->
<div id="clim" class="sub" >Clientes<br />
  <img src="imagenes/inser_cli.png" id="agre" width="50" height="50" title="Agregar Cliente"/>&nbsp;&nbsp;&nbsp;
  <img src="imagenes/Search.png" id="bus" width="50" height="50" title="Buscar Cliente"/>&nbsp;&nbsp;&nbsp;
  <img src="imagenes/editar.png" width="50" height="50" id="edit" title="Modificar Cliente"/>&nbsp;&nbsp;&nbsp;
  <img src="imagenes/eli_cliente.png" width="50" height="50" id="eli" title="Eliminar Cliente"/>
</div>
<div id="provm" class="sub" >Proveedores<br />
  <img src="imagenes/inser_prov.png" id="agre_prov" width="50" height="60" title="Agregar Proveedor"/>&nbsp;&nbsp;&nbsp;
  <img src="imagenes/Search.png" id="bus_prov" width="50" height="50" title="Buscar Proveedor"/>&nbsp;&nbsp;&nbsp;
  <img src="imagenes/editar.png" width="50" height="50" id="edit_prov" title="Modificar Proveedor"/>&nbsp;&nbsp;&nbsp;
  <img src="Imagenes/eli_prov.png" width="50" height="50" id="eli_prov" title="Eliminar Proveedor"/>
</div>
<div id="prom"  class="sub">Productos<br />
  <img src="imagenes/inser_pro.png" id="agre_pro" width="50" height="50" title="Agregar Producto"/>&nbsp;&nbsp;&nbsp;
  <img src="imagenes/Search.png" id="bus_pro" width="50" height="50" title="Buscar Proveedor"/>&nbsp;&nbsp;&nbsp;
  <img src="imagenes/editar.png" width="50" height="50" id="edit_pro"title="Modificar Proveedor"/>&nbsp;&nbsp;&nbsp;
  <img src="imagenes/eli_pro.png" width="50" height="50" id="eli_pro" title="Eliminar Producto"/>
</div>
<div id="ventam" class="sub" style="width:900px;">

<center>

<table width="900">
  <tr>
    <td width="200">
	Presupuesto<br />
	<img src="imagenes/presupuesto.png" id="presu" width="50" height="60" title="Presupuesto"/>&nbsp;&nbsp;&nbsp;<img src="imagenes/Search.png" id="bus_presu" width"50" height="50" title="Consultar Presupuesto"/>&nbsp;&nbsp;&nbsp;<img src="imagenes/consul.png" width="50" height="50" id="consul_presu" title="Consultar Presupuestos por cliente o fecha"/>
	</td>
    <td width="200">
	Factura<br />
<img src="imagenes/factura.png" id="fact" width="50" height="60" title="Factura"/>&nbsp;&nbsp;&nbsp;<img src="imagenes/Search.png" id="bus_fact" width="50" height="50" title="Consultar Factura"/>&nbsp;&nbsp;&nbsp;<img src="imagenes/consul.png" width="50" height="50" id="consul_fact" title="Consultar Facturas por cliente o fecha"/>
	</td>
    <td width="200">Pedido<br />
<img src="imagenes/pedido.png" id="ped" width="50" height="60" title="Presupuesto"/>&nbsp;&nbsp;&nbsp;<img src="imagenes/Search.png" id="bus_ped" width="50" height="50"/>&nbsp;&nbsp;&nbsp;<img src="imagenes/consul.png" width="50" height="50" id="consul_ped" title="Consultar Pedidos por cliente o fecha"/>
	</td>
    <td width="200">Abono a Factura (Cuenta por Pagar)<br />
<img src="imagenes/porcobrar.png" id="abono" width="50" title="Abono a Factura"/>&nbsp;&nbsp;&nbsp;<img src="imagenes/Search.png" id="bus_abono" width="50" height="50" title="Buscar Abonos realizados"/>&nbsp;&nbsp;&nbsp;<img src="imagenes/c_porpagar.png" width="50"  id="por_pagar" title="Ver Cuentas por pagar"/>
	</td>
  </tr>
</table></center>
</div>
<div id="compram" class="sub" style="width:900px;">
<center>
  <table width="900">
    <tr>
      <td>
    Presupuesto Compra<br />
    <img src="imagenes/presu_compra.png" id="presu_compra" width="50" height="60" title="compra"/>&nbsp;&nbsp;&nbsp;<img src="imagenes/Search.png" id="bus_pre_comp" width="50" height="50"/>&nbsp;&nbsp;&nbsp;<img src="imagenes/consul.png" width="50" height="50" id="consul_pre_comp" title="Consultar Presupuesto de Compra por proveedor o fecha"/>
    </td>
      <td>
    Orden de Compra<br />
  <img src="imagenes/Compra1.png" id="orden_compra" width="50" height="60" title="compra"/>&nbsp;&nbsp;&nbsp;<img src="imagenes/Search.png" id="bus_ord_comp" width="50" height="50"/>&nbsp;&nbsp;&nbsp;<img src="imagenes/consul.png" width="50" height="50" id="consul_ord_comp" title="Consultar Orden de Compra por proveedor o fecha"/>
    </td>
      <td>Recepcion de Mercancia<br />
  <img src="imagenes/recep.png" id="recep" width="50" height="60" title="compra"/>&nbsp;&nbsp;&nbsp;<img src="imagenes/Search.png" id="bus_recep" width="50" height="50"/>&nbsp;&nbsp;&nbsp;<img src="imagenes/consul.png" width="50" height="50" id="consul_recep" title="Consultar Recepciones de Mercancia por proveedor o fecha"/>
    </tr>
  </table>
</center>
</div>
<div id="stockm" class="sub">Stock de Producto<br />
  <img src="imagenes/stock.png" id="stk" height="50" title="Ver Stock de Productos"/>&nbsp;&nbsp;&nbsp;
  <img src="imagenes/pro_fal.png" id="pro_fal" height="50"  title="Productos Faltantes"/>&nbsp;&nbsp;&nbsp;
  <img src="imagenes/pro_sob.png" id="pro_sob" height="50"  title="Productos Sobrante"/>&nbsp;&nbsp;&nbsp;
  <img src="imagenes/promasvendido.png" id="mas_ven" height="50"  title="Productos mas vendidos"/>
</div>
<div id="mantenimientom" class="sub">Mantenimiento<br />
  <img src="Imagenes/users.png" id="vuser" width="70" title="Usuarios"/>&nbsp;&nbsp;&nbsp;
  <img src="imagenes/DB.png" id="backup" width="50" title="Backup Base de Datos"/>&nbsp;&nbsp;&nbsp;
  <img src="imagenes/iva.png" id="iva" width="50" title="IVA"/>
</div>
<div id="ayudam" class="sub">Ayuda<br />
  <img src="imagenes/ayuda.png" id="mdu" width="70" height="50" title="Manual de Usuarios"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <img src="imagenes/store2.png" id="cred" width="50" height="60" title="Acerca de Admiray System"/>
</div>
<center>
  <iframe height="800" src="" id="op" frameborder="0"> </iframe>
</center>
</body>
</html>