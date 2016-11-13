<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>
 <style type="text/css">
<!--
body {
	
background-image: url(Imagenes/fondo.jpg);
	
}

.Estilo3 {font-family: "Courier New", Courier, monospace; font-size: 22px; font-weight: bold; color: #990000; }
.Estilo5 {color: #FFFFFF}
-->
       </style>
<body><table width="1328" height="149" border="1" align="center" cellpadding="1" cellspacing="1">
<tr>
<td colspan="14"><strong class="Estilo3">LISTADO DE REGISTROS </strong></td>
</tr>
<!--PRIMERA FILA DE LA TABLA -->
<tr>
<td width="31" class="Estilo3"><strong>Nº</strong></td>
<td width="148" class="Estilo3"><strong>Monoxido</strong></td>
<td width="91" class="Estilo3"><strong>Dioxido</strong></td>
<td width="106" class="Estilo3">Fecha</td>
</tr>
<!--TABLA QUE SE GENERARA DINAMICAMENTE -->
<tr style="display:none">
<td class="Estilo5">$i</td>
<td class="Estilo5"><span class="Estilo7">$reg['valor']</span></td>
<td class="Estilo5"><span class="Estilo7">$reg['valor1']</span></td>
<td class="Estilo5"><span class="Estilo7">$reg['fecha']</span></td>
</tr>
<!-- ACA COMENZAMOS CON NUESTRO CODIGO PHP -->
<?PHP
$busq=$_REQUEST['busq3'];
//CONECTAMOS CON LA BASE DE DATOS
$conexion=mysql_connect("localhost","root","")
or die("Problemas en la conexion");
mysql_select_db("sensores",$conexion) or die("Problemas en la selección de la base de datos");
// En la variable $registro capturamos el resultado de la consulta global y la ordenamos por nombre
$registros=mysql_query("select id,ids,valor,valor1,fecha from valores as val
                       inner join valores1 as val1 on val1.ids=val.id WHERE valor1 >= $busq ORDER BY valor1 ASC",$conexion) or
die("Problemas en el select:".mysql_error());

// recorremos el array e iniciamos nuestro contador
$i=1;
while ($reg=mysql_fetch_array($registros))
{
//Cada ve que entremos al bucle imprimimos una fila de la tabla
//Concatenamos el codido HTML con nuestras variables PHP
echo '<tr><td  class="Estilo5">'.$i.'</td>
<td class="Estilo5"><pre>'.$reg['valor'].'</pre></td>
<td class="Estilo5"><pre>'.$reg['valor1'].'</pre></td>
<td class="Estilo5"><pre>'.$reg['fecha'].'</pre></td>
</tr>';
$i++;
}
?>
</table>
<a href="index2.php" class="Estilo5">Inicio</a>
</body>
</html>