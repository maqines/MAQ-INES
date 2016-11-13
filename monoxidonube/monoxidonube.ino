#include <ESP8266WiFi.h>
//#include <Ubidots.h>  //UBIDOTS

//#include "DHT.h" //cargamos la librería DHT
//#define DHTPIN 2 
//Seleccionamos el pin en el que se //conectará el sensor
//#define DHTTYPE DHT11 
//Se selecciona el DHT11 (hay //otros DHT)

//DHT dht(DHTPIN, DHTTYPE); 
//Se inicia una variable que será usada por Arduino para comunicarse con el sensor
const int sensor = A0; //pin 1 analógico
const int limiteEnPPM=300; //limite máximo tolerable de concentración de CO

//VARIABLES
int lectura; //lectura analógica (0 - 1023)
int m; //lectura en ppm (20 ppm - 2000 ppm)

const char* ssid = "FETIN-EXPOSITORES";
const char* password = "35Fetin2016";

int a = 1;
int b = 50;
int c = 100;
int t;

bool flag_a;
bool flag_b;
bool flag_c;

WiFiClient client;

void setup() {
  //dht.begin(); //Se inicia el sensor
  //pinMode(2, INPUT); 
  pinMode(sensor,INPUT);
  
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
  lectura = analogRead(sensor); //leemos del sensor MQ7S valores entre 0 1023
  m= map(lectura, 0, 1023, 20, 1023);//Convertimos el rango de lectura analógica (0-1023) al rango de lectura en ppm (20 ppm - 2000 pmm) que soporta MQ7
  //float h = dht.readHumidity(); //Se lee la humedad
  //float t = dht.readTemperature(); //Se lee la temperatura
  // put your main code here, to run repeatedly:
  Serial.println(m);
  if (client.connect("31.170.165.4",80)>0) {
       Serial.print("#Conectado");
       
       // t=random(0,100);
        
        //client.print("GET http://ioting.org/input_data.php?us=telecom&pass=univalle&ob=Maceta%20iot&v1=");
        client.print("GET http://www.ines.hol.es/guardar_dato_m.php?nombresensor=mq7&monoxido=");    
        
        client.print(m);
        client.print(" HTTP/1.0");
        client.println();
        client.println("User-Agent: 31.170.165.4");
        client.println();

        Serial.println(" Datos enviados ");
        Serial.println("http://www.ines.hol.es/guardar_dato_m.php?nombresensor=mq7&monoxido=");
        Serial.println(m);

        
 }
 else {
        Serial.println("#Fallo en la conexion");
    }
    
    delay(9000);
    
     
 }
