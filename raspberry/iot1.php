<?php

    // iot.php
    // Importamos la configuraci�n
    require("config.php");
    // Leemos los valores que nos llegan por GET
    $valorh = mysqli_real_escape_string($con, $_GET['valorh']);
    // Esta es la instrucci�n para insertar los valores
    $query = "INSERT INTO valores1(valor1) VALUES('".$valorh."')";
    // Ejecutamos la instrucci�n
    mysqli_query($con, $query);
    mysqli_close($con);
	echo $_GET['valorh'];
	
?>