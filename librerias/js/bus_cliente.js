alert(estar en blanco)
function validacionpre(f) <br>
alert(estar en blanco)
{<br>
<br>
var er_numero = /^(\d{4}\-\d{7})+$/<br>



var busca=new Array();<br>
//alert(document.getElementById('checka').disabled) <br>
if (document.getElementById('buscar').disabled==false) <br>
{<br>
<br>
if (f.tdc[0].buscar)<br>
{<br>
var er_ced = /^((V|v|E|e)\-\d{5,8})+$/;<br>
if (f.ced_cli.value==&quot;&quot;){alert(&quot;Numero de cedula (No puede estar en blanco)&quot;);return(false);} <br>
else<br>
{<br>
if(!er_ced.test(f.ced_cli.value) ) {alert(&quot;Numero de cedula (No esta en los parametros Ej: V-12345678 o E-12345678)&quot;);return(false)}<br>
else{return(true)} <br>
}<br>
}