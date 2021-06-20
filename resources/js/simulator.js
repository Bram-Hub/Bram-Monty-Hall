
/*
--------------------------------------------------------------------
Simulation
--------------------------------------------------------------------
*/
let door1 = 0;
let door2 = 0;
let door3 = 0;
let carDoor = 2;

window.initialize = function(){
    carDoor = 1;
}

window.clickDoor1 = function(){
    if(door1 == 0){
        door1 = 1;
        openDoor1();
    }
}

window.clickDoor2 = function(){
    if(door2 == 0){
        door2 = 1;
        openDoor2();
    }   
}

window.clickDoor3 = function(){
    if(door3 == 0){
        door3 = 1;
        openDoor3();
    }
}

window.openDoor1 = function(){
    if(carDoor == 1){
        document.getElementById("door1").src = "img/carDoor.png";
        alert("You win");
    }
    else{
        document.getElementById("door1").src = "img/goatDoor.png";
        alert("You lose");
    }
}

window.openDoor2 = function(){
    if(carDoor == 2){
        document.getElementById("door2").src = "img/carDoor.png";
        alert("You win");
    }
    else{
        document.getElementById("door2").src = "img/goatDoor.png";
        alert("You lose");
    }
}

window.openDoor3 = function(){
    if(carDoor == 3){
        document.getElementById("door3").src = "img/carDoor.png";
        alert("You win");
    }
    else{
        document.getElementById("door3").src = "img/goatDoor.png";
        alert("You lose");
    }
}