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
	} 
	else {
	
		$data = array();
		$result = mysqli_query($con, "select valor1 from valores1 ORDER BY ids DESC LIMIT 0,1"); 
		while ($row = mysqli_fetch_array($result)) {
        $point = array("humedad" => $row['valor1']);
        array_push($data, $point);
   		 }
		echo json_encode($data);
	
}
mysqli_close($con);
?>
