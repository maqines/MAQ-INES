<?php
header('Content-Type: application/json');

    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "sensores";
    // Conexión con la base de datos
    $con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	if (mysqli_connect_errno($con)) {
    echo "Failed to connect to DataBase: " . mysqli_connect_error();
	} else {
    $data_points = array();
    $result = mysqli_query($con, "select id,valor from valores"); 
    while ($row = mysqli_fetch_array($result)) {
        $point = array("valorx" => $row['id'], "valory" => $row['valor']);
        array_push($data_points, $point);
    }
	
    echo json_encode($data_points);
}
mysqli_close($con);
?>