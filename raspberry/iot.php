<?php

    // iot.php
    // Importamos la configuraci�n
    require("config.php");
    // Leemos los valores que nos llegan por GET
    $valort = mysqli_real_escape_string($con, $_GET['valort']);
    // Esta es la instrucci�n para insertar los valores
    $query = "INSERT INTO valores(valor) VALUES('".$valort."')";
    // Ejecutamos la instrucci�n
    mysqli_query($con, $query);
    mysqli_close($con);
	echo $_GET['valort'];
	
?>