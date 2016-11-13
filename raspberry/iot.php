<?php

    // iot.php
    // Importamos la configuración
    require("config.php");
    // Leemos los valores que nos llegan por GET
    $valort = mysqli_real_escape_string($con, $_GET['valort']);
    // Esta es la instrucción para insertar los valores
    $query = "INSERT INTO valores(valor) VALUES('".$valort."')";
    // Ejecutamos la instrucción
    mysqli_query($con, $query);
    mysqli_close($con);
	echo $_GET['valort'];
	
?>