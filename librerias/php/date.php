<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body>
<?


//Variable nombre del mes
$nommes = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

//variable nombre día
$nomdia = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado");



$dia = date(j); 
$mes = date(n); 
$diasemana = date(w); 

$hoy = $nomdia[$diasemana].", ".$dia." de ".$nommes[$mes-1]." del ".date(Y).", ".date(h).":".date(i);

echo $hoy;

?> 
</body>
</html>
