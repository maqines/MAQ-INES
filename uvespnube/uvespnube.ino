#include <ESP8266WiFi.h>

//#include <Ubidots.h>  //UBIDOTS

//#include "DHT.h" //cargamos la librería DHT
//#define DHTPIN 2 //Seleccionamos el pin en el que se //conectará el sensor
//#define DHTTYPE DHT11 //Se selecciona el DHT11 (hay //otros DHT)

//DHT dht(DHTPIN, DHTTYPE); //Se inicia una variable que será usada por Arduino para comunicarse con el sensor

const char* ssid = "AndroidAP";
const char* password = "72270806";
int UVOUT = A0; //Output from the sensor
//int REF_3V3 = A1; //3.3V power on the Arduino board

int a = 1;
int b = 50;
int c = 100;
int t;
char uv;

bool flag_a;
bool flag_b;
bool flag_c;

WiFiClient client;

void setup() {
  //dht.begin(); //Se inicia el sensor
  //pinMode(2, INPUT); 
   pinMode(UVOUT, INPUT);
  //pinMode(REF_3V3, INPUT);
  // iniciando conexi�n...
  Serial.begin(115200);
  Serial.println("Conectando a: ");
  Serial.println(ssid);
  WiFi.begin(ssid, password);

  while (WiFi.status() != WL_CONNECTED) {
        delay(500);
        Serial.print(".");
    }

    Serial.println("Conectado a Red WI-FI");
    Serial.println(ssid);
    Serial.print("La Ip de la placa es: ");
    Serial.println(WiFi.localIP());
}

void loop() {
  
  if (Serial.available())
  {
     uv=Serial.read();
     Serial.print(uv);
     delay(1000);
  
     if (client.connect("31.170.165.4", 80)>0) {
       Serial.print("#Conectado");
       
       // t=random(0,100);
        
        //client.print("GET http://ioting.org/input_data.php?us=telecom&pass=univalle&ob=Maceta%20iot&v1=");
        client.print("GET http://www.ines.hol.es/guardar_dato_uv.php?nombresensor=ml8511&uv=");

        client.print(uv);
        client.print(" HTTP/1.0");
        client.println();
        client.println("User-Agent: 31.170.165.4");
        client.println();

        Serial.println(" Datos enviados ");
        Serial.println("http://www.ines.hol.es/guardar_dato_uv.php?nombresensor=ml8511&uv=");
        Serial.println(uv);
          //Serial.println(outputVoltage);

        
 }
 else {
        Serial.println("#Fallo en la conexion");
    }
    
     
}

 
  
    delay(1000);
    
    
   
 }
