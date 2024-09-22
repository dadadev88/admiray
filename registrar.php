<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>ADMIRAY</title>
</head>
<body>
<font face="Arial Rounded MT Bold">
<center>
  <object classid= "clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=4,0,0,0" id="HTMLQuick" width="1020" height="100">
    <param name="movie"  value="multimedia/nuevo azul.swf"/>
    <param name="quality" value="high"/>
    <embed  src="multimedia/nuevo azul.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="1020" height="100"></embed>
  </object>
  <table width="900" border="5" bordercolor="#FFFFFF" >
  <tr>
    <th width="3" bgcolor="#000000"></th>
    <th width="662" bgcolor="#3B78B1" align="center"><font color="#000000" size="+2" face="Arial Rounded MT Bold">Registrar Usuario </font></th>
    <th width="3" bgcolor="#000000"></th>
  </tr>
</table>
 
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <center>
<form action="registrar.php" method="POST">
<table style="border:1px solid #000000;" bgcolor="#999999" bordercolor="#000000">
<tr>
<td align="right">
Nombre de usuario: <input type="text" size="30" maxlength="25" name="username">
</td>
</tr>
<tr>
<td align="right">
Password: <input type="password" size="30" maxlength="25" name="password">
</td>
</tr>
<tr>
<td align="right">
Repite Password: <input type="password" size="30" maxlength="25" name="cpassword">
</td>
</tr>
<tr>
<td align="right">
Email: <input type="text" size="30" maxlength="25" name="email">
</td>
</tr>
<tr>
<td align="center">
<input type="submit" value="Registrar"> <input type="reset" value="  Limpiar  ">
</td>
</tr>
<tr>
<td align="center">
<a href="login.php">Login</a>
</td>
</tr>
</table>
</form>
<p> <p>
<font face="Arial Rounded MT Bold">
<?php
// Conexi&oacute;n a la base de datos
mysql_connect ("localhost","root","");
// Seleccion de la base de datos
mysql_select_db("prueba") or die('Cannot select database');
    

    // Preguntaremos si se han enviado ya las variables necesarias
    if (isset($_POST["username"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $email = $_POST["email"];
    // Hay campos en blanco
    if($username==NULL|$password==NULL|$cpassword==NULL|$email==NULL) {
    echo "un campo est&aacute; vacio.";
    }else{
    // &iquest;Coinciden las contrase&ntilde;as?
    if($password!=$cpassword) {
    echo "Las contrase&ntilde;as no coinciden";
    }else{
    // Comprobamos si el nombre de usuario o la cuenta de correo ya exist&iacute;an
    $checkuser = mysql_query("SELECT username FROM users WHERE username='$username'");
    $username_exist = mysql_num_rows($checkuser);

    $checkemail = mysql_query("SELECT email FROM users WHERE email='$email'");
    $email_exist = mysql_num_rows($checkemail);

    if ($email_exist>0|$username_exist>0) {
    echo "EL nombre de usuario $username o Email $email ya existe.";
    }else{
    //Todo parece correcto procedemos con la inserccion
    $query = "INSERT INTO users (username, password, email) VALUES('$username','$password','$email')";
    mysql_query($query) or die(mysql_error());
    echo "El usuario $username y email $email ha sido registrado satisfactoriamente.";
    }
    }
    }
    }
 ?>
</font> </p> </p> </center> </center> </font>
<p> <p> </p> </p>
<table width="1000" border="5" bordercolor="#FFFFFF" >
  <tr>
    <th width="3" bgcolor="#000000"></th>
    <th width="662" bgcolor="#3B78B1" align="center">&nbsp;</th>
    <th width="3" height="20" bgcolor="#000000"></th>
  </tr>
</table>
</font>
</body>
</html>
