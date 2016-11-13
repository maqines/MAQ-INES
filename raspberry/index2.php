<?php
session_start();
if($_SESSION["autorizacion"]!="si"){
header("location: index.html");
exit();
}
?>
<html>
 <style type="text/css">
<!--
body {
	
background-image: url(Imagenes/fondo.jpg);
	
}
.Estilo1 {
	color: #990000;
	font-family: "Courier New", Courier, monospace;
}

#sse1
{
    /*You can decorate the menu's container, such as adding background images through this block*/
    /*background-color: #222;*/
    height: 38px;
    padding: 15px;
    border-radius: 3px;
    box-sizing: content-box;
}
#sses1
{
    margin:0 auto;/*This will make the menu center-aligned. Removing this line will make the menu align left.*/
}
#sses1 ul 
{ 
    position: relative;
    list-style-type: none;
    float:left;
    padding:0;margin:0;
    border-bottom:solid 1px #6C0000;
}
#sses1 li
{
    float:left;
    list-style-type: none;
    padding:0;margin:0;background-image:none;
}
/*CSS for background bubble*/
#sses1 li.highlight
{
    background-color:#800;
    top:36px;
    height:2px;
    border-bottom:solid 1px #C00;
    z-index: 1;
    position: absolute;
    overflow:hidden;
}
#sses1 li a
{
    box-sizing: content-box;
    height:30px;
    padding-top: 8px;
    margin: 0 20px;/*used to adjust the distance between each menu item. Now the distance is 20+20=40px.*/
    color: #fff;
    font: normal 12px arial;
    text-align: center;
    text-decoration: none;
    float: left;
    display: block;
    position: relative;
    z-index: 2;
}
-->
       </style>
<head>

 <script src="menu.js"></script>   
</head>
<body>
<div id="sse1">
  <div id="sses1">
    <ul>
      <li><a href="listar.php">Listado de registros</a></li>
	  <li><a href="busqueda.php">Consultas BDD</a></li>
      <li><a href="temperatura.php">Monitoreo monoxido</a></li>
      <li><a href="humedad.php">Monitoreo dioxido</a></li>
    </ul>
  </div>
</div>
<h1 align="center" class="Estilo1">MAQ: MONITOR AIR QUALITY</h1>
<div align="center"><img src="imagenes/casa.JPG" width="565" height="428"   /></div>
</body>
</html>
