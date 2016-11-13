//****************************************CODIGO GRAFICAS*************************************
window.onload = function () {
			CanvasJS.addColorSet("color",
                [//colorSet Array

                "#791111"        
                ]);
			
                var dataLength = 0;
                var data = [];
                var updateInterval = 500;
                updateChart();
                function updateChart() {
                    $.getJSON("data.php", function (result) {
                        if (dataLength !== result.length) {
                            for (var i = dataLength; i < result.length; i++) {
                                data.push({
                                    x: parseInt(result[i].valorx),
                                    y: parseInt(result[i].valory)
                                });
                            }
                            dataLength = result.length;
                            chart.render();
                        }
                    });
                }
                var chart = new CanvasJS.Chart("chart", {
				zoomEnabled: true,
				zoomType: "xy",
				exportEnabled: true,
                animationEnabled: true,
				theme: "theme2",
				backgroundColor: "#5F4343",
				colorSet: "color",
				//width: 320,
				//height:260,
				
					legend: {
						dockInsidePlotArea: true,
						verticalAlign: "top",
						horizontalAlign: "right",
						fontColor: "gray",               
					},
                    title: {
                        text: "GRAFICO MONOXIDO",
						 fontColor: "gray",
						 fontFamily: "tahoma",
						 //(fontSize: 30,
						 //fontStyle: "italica",
							
                    },
                    axisX: {
                        title: "Muestras",
						 //titleFontColor: "red",
						 //titleFontFamily: "tahoma",
						 gridDashType: "dot",
						 gridThickness: 2,
						 //interlacedColor: "#F8F1E4",
						 
                    },
                    axisY: {
                        title: "Valores",
						//interlacedColor: "#BF9292",
						gridDashType: "dot",
						gridThickness: 2,
						//minimum: 50
						suffix: "PPM", 
   						maximum: 1000,// rango maximo dht11 50 °C
						//tickLength: 5,
                    },
                    data: [{type: "line", dataPoints: data, showInLegend: true,
      			legendText: "Monoxido PPM", markerType: "square", markerColor: "#E30505"}],
                });
                setInterval(function () {
                    updateChart()
                }, updateInterval);
            }
