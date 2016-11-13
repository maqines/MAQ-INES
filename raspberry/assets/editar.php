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

.Estilo3 {font-family: "Courier New", Courier, monospace; font-size: 22px; font-weight: bold; color: #009999; }
.Estilo5 {color: #FFFFFF}
-->
       </style>
<body>
<p>
  <?php
switch ($_REQUEST['control'])
{
case 1: //si idR es 1 editamos el registro
//echo '<title>Editar Registro</title>';
Ejecutar_Sentencia('SELECT * FROM usuarios WHERE ids='.$_REQUEST['idR']);
break;
case 2: //si idR es 2 eliminamos el registro
echo '<table width="" border="">
  <tr>
    <td width="400" class="Estilo3"><div align="center">Registro eliminado </div></td>
    <td width="130"><div align="center"><a href="index2.php" class="Estilo3">Inicio</a></div></td>
  </tr>
</table>';
//echo '<title>Eliminar Registro</title>';
Ejecutar_Sentencia('DELETE markers,usuarios FROM markers inner join usuarios WHERE markers.id=usuarios.ids AND usuarios.ids='.$_REQUEST['idR']);
break;
case 3:
//echo '<title>Registro Guardado</title>';
Ejecutar_Sentencia("UPDATE usuarios set nombre='$_REQUEST[nombre]', marca='$_REQUEST[marca]', modelo='$_REQUEST[modelo]', anio='$_REQUEST[anio]',
fecha='$_REQUEST[fecha]', hora='$_REQUEST[hora]', placa='$_REQUEST[placa]', velocidad='$_REQUEST[velocidad]' where ids='$_REQUEST[idR]'");
echo '<table width="" border="">
  <tr>
    <td width="438" class="Estilo3"><div align="center">Registro editado correcatamente </div></td>
    <td width="130"><div align="center"><a href="index2.php" class="Estilo3">Inicio</a></div></td>
  </tr>
</table>';
break;
case "":
echo '<table width="0" border="0">
  <tr>
    <td width="438" class="Estilo3"><div align="center">Ninguna funcion definida </div></td>
    <td width="130"><div align="center"><a href="index2.php" class="Estilo3">Inicio</a></div></td>
  </tr>
</table>';
break;
}

function Ejecutar_Sentencia($sql)
{
//CONECTAMOS CON LA BASE DE DATOS
$conexion=mysql_connect("localhost","root","") or die("Problemas en la conexion");
mysql_select_db("maps",$conexion) or die("Problemas en la selección de la base de datos");
// En la variable $registro capturamos el resultado de la consulta global y la ordenamos por nombre
$registros=mysql_query($sql,$conexion) or die("Problemas en el select:".mysql_error());
if ($_REQUEST['control']=="1") //solo si es necesario editar recorremos el array, en otro caso ejecutamos la sentencia
{
while ($reg=mysql_fetch_array($registros))
{
//Imprimimos los valores recien recuperados en el formulario
//Concatenamos el codido HTML con nuestras variables PHP
echo'<form name="form1" method="post">
<table width="0" border="0" align="center" cellpadding="0">
  <tr>
<td colspan="2"><strong class="Estilo3">Formulario Edición</strong></td>
</tr>
<tr>
  <td width="136">&nbsp;</td>
  <td width="213"><strong>
<label></label>
</strong></td></tr>
<tr>
  <td class="Estilo3"><strong>Propietario:</strong></td>
  <td class="Estilo5"><strong>
    <input name="nombre" type="text" id="nombre" size="40" value="'.$reg['nombre'].'" />
  </strong></td>
</tr>
<tr>
  <td class="Estilo3"><strong>Marca:</strong></td>
  <td class="Estilo5"><strong>
    <input name="marca" type="text" id="marca" size="40" value="'.$reg['marca'].'" />
    <label></label></strong></td></tr>
<tr>
  <td class="Estilo3">Modelo:</td>
  <td class="Estilo5"><strong>
    <input name="modelo" type="text" id="modelo" size="40" value="'.$reg['modelo'].'" />
  </strong></td>
</tr>
<tr>
  <td class="Estilo3">A&ntilde;o:</td>
  <td class="Estilo5"><strong>
    <input name="anio" type="text" id="anio" size="40" value="'.$reg['anio'].'" />
  </strong></td>
</tr>
<tr>
  <td class="Estilo3">Fecha:</td>
  <td class="Estilo5"><strong>
    <input name="fecha" type="text" id="fecha" size="40" value="'.$reg['fecha'].'" />
  </strong></td>
</tr>
<tr>
  <td class="Estilo3">Hora:</td>
  <td class="Estilo5"><strong>
    <input name="hora" type="text" id="hora" size="40" value="'.$reg['hora'].'" />
  </strong></td>
</tr>
<tr>
  <td class="Estilo3">Placa:</td>
  <td class="Estilo5"><strong>
    <input name="placa" type="text" id="placa" size="40" value="'.$reg['placa'].'" />
  </strong></td>
</tr>
<tr>
  <td class="Estilo3"><strong>Velocidad: </strong></td>
  <td class="Estilo5"><strong>
    <input name="velocidad" type="text" id="velocidad" size="40" value="'.$reg['velocidad'].'" />
  </strong></td></tr>
<tr>
  <td><input type="submit" name="button" id="button" onclick = "mostrar()" value="editar"/></td>
  <td><a href="javascript:history.back(1)" class="Estilo3"></a></td>
  <td>&nbsp;</td>
</tr>
<tr><td><label><a href="javascript:history.back(1)" class="Estilo3">CANCELAR</a><a href="javascript:history.back(1)"><br>
</a></label></td>
<td><input name="idR" type="hidden" id="idR" value="'.$_REQUEST['idR'].'"/></td>
<td><input name="control" type="hidden" id="control" value="3" /></td></tr></table>
</form>';
} //fin del WHILE
} //fin del IF
} //fin de la function
?>
</p>
</body>
</html>
