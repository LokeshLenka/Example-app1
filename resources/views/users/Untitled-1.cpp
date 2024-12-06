#include <SoftwareSerial.h>

/* Project: Bluetooth Controlled Robot Base */

//L293 Connection
const int motorA1 = 3;
const int motorA2 = 4;
const int motorAspeed = 5;
const int motorB1 = 7;
const int motorB2 = 8;
const int motorBspeed =6;
//Useful Variables

int state;
int vSpeed=200; // Default speed, from 0 to 255

void setup() {
// Set pins as outputs:
pinMode(motorA1, OUTPUT);
pinMode(motorA2, OUTPUT);
pinMode(motorB1, OUTPUT);
pinMode(motorB2, OUTPUT);
// Initialize serial communication at 9600 bits per second:
Serial.begin(9600);
}


void loop() {
if(Serial.available() > 0){
state = Serial.read();
}


Serial.println(state);
//Change speed if state is equal from 0 to 4. Values must be from 0 to 255
(PWM)

if (state == '0'){
vSpeed=0;}
else if (state == '1'){
vSpeed=100;}
else if (state == '2'){
vSpeed=180;}
else if (state == '3'){
vSpeed=200;}
else if (state == '4'){
vSpeed=255;}
// Forward
//If state is equal with letter 'F', car will go forward!
if (state == 'F') {
digitalWrite (motorA1,LOW);
delay(1);
digitalWrite(motorA2,HIGH);
delay(1);
digitalWrite (motorB1,LOW);
delay(1);
digitalWrite(motorB2,HIGH);
analogWrite (motorAspeed, vSpeed);
analogWrite (motorBspeed, vSpeed);
}

// /Forward Left/
//If state is equal with letter 'I', car will go forward left
else if (state == 'I') {
digitalWrite (motorA1,LOW);
delay(1);
digitalWrite(motorA2,HIGH);
delay(1);
digitalWrite (motorB1,LOW);
delay(1);
digitalWrite(motorB2,HIGH);
analogWrite (motorAspeed, 0);
analogWrite (motorBspeed, vSpeed);
}
/Forward Right/
//If state is equal with letter 'G', car will go forward right
else if (state == 'G') {
digitalWrite (motorA1,LOW);
delay(1);
digitalWrite(motorA2,HIGH);
delay(1);
digitalWrite (motorB1,LOW);
delay(1);
digitalWrite(motorB2,HIGH);
analogWrite (motorAspeed, vSpeed);
analogWrite (motorBspeed, 0);
}
// /*Backward/
//If state is equal with letter 'B', car will go backward
else if (state == 'B') {
digitalWrite (motorA1,HIGH);
delay(1);
digitalWrite(motorA2,LOW);
delay(1);
digitalWrite (motorB1,HIGH);
delay(1);
digitalWrite(motorB2,LOW);
analogWrite (motorAspeed, vSpeed);
analogWrite (motorBspeed, vSpeed);
}
/Backward Left/
//If state is equal with letter 'J', car will go backward left
else if (state == 'J') {
digitalWrite (motorA1,HIGH);
delay(1);
digitalWrite(motorA2,LOW);
delay(1);
digitalWrite (motorB1,HIGH);
delay(1);
digitalWrite(motorB2,LOW);
analogWrite (motorAspeed, 0);
analogWrite (motorBspeed, vSpeed);
}
/Backward Right/
//If state is equal with letter 'H', car will go backward right

else if (state == 'H') {
digitalWrite (motorA1,HIGH);
delay(1);
digitalWrite(motorA2,LOW);
delay(1);
digitalWrite (motorB1,HIGH);
delay(1);
digitalWrite(motorB2,LOW);
analogWrite (motorAspeed, vSpeed);
analogWrite (motorBspeed, 0);
}
/*Left*/
//If state is equal with letter 'L', wheels will turn left
else if (state == 'L') {
digitalWrite (motorA2,HIGH);
delay(1);
digitalWrite(motorA1,LOW);
delay(1);
digitalWrite (motorB2,LOW);
delay(1);
digitalWrite(motorB1,HIGH);
analogWrite (motorAspeed, vSpeed);
analogWrite (motorBspeed, vSpeed);
}
/*Right*/
//If state is equal with letter 'R', wheels will turn right
else if (state == 'R') {
digitalWrite (motorA2,LOW);
delay(1);
digitalWrite(motorA1,HIGH);
delay(1);
digitalWrite (motorB2,HIGH);
delay(1);
digitalWrite(motorB1,LOW);
analogWrite (motorAspeed, vSpeed);
analogWrite (motorBspeed, vSpeed);
}
/Stop*/
//If state is equal with letter 'S', stop the car
else if (state == 'S'){
analogWrite(motorA1, 0); analogWrite(motorA2, 0);
analogWrite(motorB1, 0); analogWrite(motorB2, 0);
}
}






/*
---------------------------------------------------------------------
*/

//-----------------------------------------------------------------------------------
//Alert reciever's phone number with country code
const String PHONE_1 = "+9779800990088";
const String PHONE_2 = ""; //optional
const String PHONE_3 = ""; //optional
//-----------------------------------------------------------------------------------

//-----------------------------------------------------------------------------------
#define rxPin 2
#define txPin 3
SoftwareSerial sim800L(rxPin,txPin);
//-----------------------------------------------------------------------------------

//-----------------------------------------------------------------------------------
int Flame_sensor = 5;
int Flame_detected;
//-----------------------------------------------------------------------------------

//-----------------------------------------------------------------------------------
#define buzzer_pin 4
//-----------------------------------------------------------------------------------

void setup()
{
  //-----------------------------------------------------------------------------------
  //Begin serial communication: Arduino IDE (Serial Monitor)
  Serial.begin(115200);

  //-----------------------------------------------------------------------------------
  //Begin serial communication: SIM800L
  sim800L.begin(9600);

  //-----------------------------------------------------------------------------------
  pinMode(Flame_sensor, INPUT);

  //-----------------------------------------------------------------------------------
  pinMode(buzzer_pin, OUTPUT);
  digitalWrite(buzzer_pin,LOW);

  //----------------------------------------------------------------------------------
  Serial.println("Initializing...");
  //Once the handshake test is successful, it will back to OK
  sim800L.println("AT");
  delay(1000);
  sim800L.println("AT+CMGF=1");
  delay(1000);
  //-----------------------------------------------------------------------------------
}

void loop()
{
  while(sim800L.available()){
  Serial.println(sim800L.readString());
  }

  Flame_detected = digitalRead(Flame_sensor);
  Serial.println(Flame_detected);
  //delay(100);
  //-----------------------------------------------------------------------------------
  //The fire is detected, trigger Alarm and send sms
  if (Flame_detected == 0)
  {
    digitalWrite(buzzer_pin,HIGH);
      Serial.println("Fire detected...! take action immediately.");
      send_multi_sms();
      make_multi_call();
    }
 //-----------------------------------------------------------------------------------
  //No fire is detected, turn OFF Alarm
  else
  {
    digitalWrite(buzzer_pin,LOW);
    }
//-----------------------------------------------------------------------------------
}

//-----------------------------------------------------------------------------------
void send_multi_sms()
{
  if(PHONE_1 != ""){
    Serial.print("Phone 1: ");
    send_sms("Fire detected...! take action immediately.", PHONE_1);
  }
  if(PHONE_2 != ""){
    Serial.print("Phone 2: ");
    send_sms("Fire detected...! take action immediately.", PHONE_2);
  }
  if(PHONE_3 != ""){
    Serial.print("Phone 3: ");
    send_sms("Fire detected...! take action immediately.", PHONE_3);
  }
}
//-----------------------------------------------------------------------------------

//-----------------------------------------------------------------------------------
void make_multi_call()
{
  if(PHONE_1 != ""){
    Serial.print("Phone 1: ");
    make_call(PHONE_1);
  }
  if(PHONE_2 != ""){
    Serial.print("Phone 2: ");
    make_call(PHONE_2);
  }
  if(PHONE_3 != ""){
    Serial.print("Phone 3: ");
    make_call(PHONE_3);
  }
}
//-----------------------------------------------------------------------------------

//-----------------------------------------------------------------------------------
void send_sms(String text, String phone)
{
    Serial.println("sending sms....");
    delay(50);
    sim800L.print("AT+CMGF=1r");
    delay(1000);
    sim800L.print("AT+CMGS=""+phone+""r");
    delay(1000);
    sim800L.print(text);
    delay(100);
    sim800L.write(0x1A); //ascii code for ctrl-26 //Serial2.println((char)26); //ascii code for ctrl-26
    delay(5000);
}
//-----------------------------------------------------------------------------------

//-----------------------------------------------------------------------------------
void make_call(String phone)
{
    Serial.println("calling....");
    sim800L.println("ATD"+phone+";");
    delay(20000); //20 sec delay
    sim800L.println("ATH");
    delay(1000); //1 sec delay
}
