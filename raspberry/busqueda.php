<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<script language='javascript' src="popcalendar.js"></script>
</head>
<style type="text/css">
<!--
body {
	
background-image: url(Imagenes/fondo.jpg);
	
}

.Estilo3 {font-family: "Courier New", Courier, monospace; font-size: 22px; font-weight: bold; color:#990000; }
.Estilo5 {color: #FFFFFF}
-->
       </style>
<body>

<table width="732" height="68" border="0" align="center">
  <tr>
    <td width="417" class="Estilo3">Criterio de busqueda igual a: </td>
    <td width="300"><form id="form1" name="form1" method="post" action="buscar.php ">
      <label>
      <input name="busq" type="text" id="busq" size="15" />
      </label>
      <label>
      <input type="submit" name="button" id="button" value="Buscar" />
      </label>
    </form></td>
    <td width="10" rowspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td class="Estilo3">Niveles de monoxido mayores a: </td>
    <td><form id="form2" name="form2" method="post" action="busqmono1.php ">
      <label>
      <input name="busq2" type="text" id="busq2" size="15"  />
      </label>
      <label>
      <input type="submit" name="button2" id="button2" value="Buscar" />
      </label>
    </form></td>
  </tr>
  <tr>
    <td class="Estilo3">Niveles de dioxido mayores a: </td>
    <td><form id="form3" name="form3" method="post" action="busqdiox1.php ">
      <label>
      <input name="busq3" type="text" id="busq3" size="15" />
      </label>
      <label>
      <input type="submit" name="button3" id="button3" value="Buscar" />
      </label>
    </form></td>
  </tr>
  <td class="Estilo3">Fecha: </td>
    <td><form id="form4" name="form4" method="post" action="busqfecha.php ">
      <label>
      <input name="fecha" type="text" id="dateArrival" onClick="popUpCalendar(this, form4.dateArrival, 'yyyy-mm-dd');" size="15"/>
      </label>
      <label>
      <input type="submit" name="button4" id="button4" value="Buscar" />
      </label>
    </form></td>
  </tr>
  </tr>
</table>
</body>
</html>
