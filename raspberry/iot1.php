<?php

    // iot.php
    // Importamos la configuración
    require("config.php");
    // Leemos los valores que nos llegan por GET
    $valorh = mysqli_real_escape_string($con, $_GET['valorh']);
    // Esta es la instrucción para insertar los valores
    $query = "INSERT INTO valores1(valor1) VALUES('".$valorh."')";
    // Ejecutamos la instrucción
    mysqli_query($con, $query);
    mysqli_close($con);
	echo $_GET['valorh'];
	
?>