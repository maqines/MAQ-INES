<html>
<style type="text/css">
body {
	
background-image: url(Imagenes/fondo.jpg);
	
}
.Estilo1 {
	color: #990000;
	font-family: "Courier New", Courier, monospace;
}
</style>
    <head>
		<script src="ajax1.js"></script>
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   		<script type="text/javascript">
     	google.charts.load('current', {'packages':['gauge']});
      	google.charts.setOnLoadCallback(drawChart);
      	function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['Dioxido', 0],
        ]);

        var options = {
          width: 400, height: 400,
          redFrom: 5000, redTo: 10000,
          yellowFrom:2000, yellowTo: 5000,
		  greenFrom:400, greenTo:2000,
		  max: 10000,
          minorTicks: 10,
		  majorTicks: ['0', '10000']
        };

        var chart = new google.visualization.Gauge(document.getElementById('Medidor'));

        chart.draw(data, options);

        setInterval(function() {
		  var JSON=$.ajax({url:"DatoSensor1.php",dataType: 'json',async: false}).responseText;
		  var Respuesta=jQuery.parseJSON(JSON);
          data.setValue(0, 1,Respuesta[0].humedad);
          chart.draw(data, options);
        }, 500);
        
      	}
    	</script>
        <script type="text/javascript" src="assets/script/canvasjs.min.js"></script>
        <script type="text/javascript" src="assets/script/jquery-2.2.3.min.js"></script>
    </head>
    <body>
	<h1 align="center" class="Estilo1">MONITOREO DE DIOXIDO</h1>
	
        <div id="chart" style=" float:left; height: 400px; width: 600px;  border-style: solid; border-color: #990000; position:relative; top:90px; left: 50px;">
        </div>
		<div id="Medidor" style="float:left; height: 400px; width: 400px; border-style: solid; border-color: #990000; position:relative; top:90px; left: 100px; background-color: #5F4343;">		</div>
    </body>
</html>