class Car {
    constructor(name, year) {
      this.name = name;
      this.year = year;
    }
  }

function FillCarArr(){

    var x = parseInt(document.getElementById("nbcar").value);

    const cars = []; 
    switch (x) {
        case 0:
            break;
        case 1:
            cars[0]= new Car(document.getElementById("fcar").value,document.getElementById("fdate").value);
            break;
        case 2 :
            cars[0]= new Car(document.getElementById("fcar").value,document.getElementById("fdate").value);
            cars[1]= new Car(document.getElementById("scar").value,document.getElementById("sdate").value);
            break;
        case 3:
            cars[0]= new Car(document.getElementById("fcar").value,document.getElementById("fdate").value);
            cars[1]= new Car(document.getElementById("scar").value,document.getElementById("sdate").value);
            cars[2]= new Car(document.getElementById("tcar").value,document.getElementById("tdate").value);
            break;
    }

    PrintCarArr(cars);
    return cars;
}

function PrintCarArr(cars) {

   var x = parseInt(document.getElementById("nbcar").value);

    switch (x) {
        case 0:
            document.getElementById("list_of_cars").innerHTML = "You have no car.";
            break;
        case 1:
            document.getElementById("list_of_cars").innerHTML = "Car : " + cars[0].name + ", bought in : " + cars[0].year;
            break;
        case 2 :
            document.getElementById("list_of_cars").innerHTML = "Car : " + cars[0].name + ", bought in : " + cars[0].year + " / Car : " + cars[1].name + ", bought in : " + cars[1].year;
            break;
        case 3:
            document.getElementById("list_of_cars").innerHTML = "Car : " + cars[0].name + ", bought in : " + cars[0].year + " / Car : " + cars[1].name + ", bought in : " + cars[1].year + " / Car : " + cars[2].name + ", bought in : " + cars[2].year;
            break;
    }
}

function PrintMessage() {

    var i = parseInt(document.getElementById("nbcar").value);
    
    let text = '{ "message" : [' +
    '{ "firstLetter":"JD" , "middleNb":"56" , "lastLetter":"PLI" },' +
    '{ "firstLetter":"CV" , "middleNb":"89" , "lastLetter":"QSJ" },' +
    '{ "firstLetter":"UJ" , "middleNb":"74" , "lastLetter":"IUF" },' +
    '{ "firstLetter":"ST" ,  "middleNb":"66" ,"lastLetter":"RFZ" } ]}';

    const obj = JSON.parse(text);

    switch (i) {
        case 0:
            var x = Math.floor(Math.random() * 4);
            var y = Math.floor(Math.random() * 4);
            var z = Math.floor(Math.random() * 4);

            document.getElementById("message_JSON").innerHTML = obj.message[x].firstLetter + obj.message[y].middleNb + " " + obj.message[z].lastLetter;
            break;

        case 1:
            var x = Math.floor(Math.random() * 4);
            var y = Math.floor(Math.random() * 4);
            var z = Math.floor(Math.random() * 4);

            document.getElementById("message_JSON").innerHTML = obj.message[x].firstLetter + obj.message[y].middleNb + " " + obj.message[z].lastLetter;
            break;

        case 2 :
            var x = Math.floor(Math.random() * 4);
            var y = Math.floor(Math.random() * 4);
            var z = Math.floor(Math.random() * 4);

            var x2 = Math.floor(Math.random() * 4);
            var y2 = Math.floor(Math.random() * 4);
            var z2 = Math.floor(Math.random() * 4);

            document.getElementById("message_JSON").innerHTML = obj.message[x].firstLetter + obj.message[y].middleNb + " " + obj.message[z].lastLetter + " // " + obj.message[x2].firstLetter + obj.message[y2].middleNb + " " + obj.message[z2].lastLetter;
            break;

        case 3:
            var x = Math.floor(Math.random() * 4);
            var y = Math.floor(Math.random() * 4);
            var z = Math.floor(Math.random() * 4);

            var x2 = Math.floor(Math.random() * 4);
            var y2 = Math.floor(Math.random() * 4);
            var z2 = Math.floor(Math.random() * 4);

            var x3 = Math.floor(Math.random() * 4);
            var y3 = Math.floor(Math.random() * 4);
            var z3 = Math.floor(Math.random() * 4);

            document.getElementById("message_JSON").innerHTML = obj.message[x].firstLetter + obj.message[y].middleNb + " " + obj.message[z].lastLetter + " // " + obj.message[x3].firstLetter + obj.message[y3].middleNb + " " + obj.message[z3].lastLetter + " // " + obj.message[x2].firstLetter + obj.message[y2].middleNb + " " + obj.message[z2].lastLetter;
            break;
    }

}