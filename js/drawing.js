//const C=document.getElementById("drawing").getContext("2d"); doesent work, god knows why

function clearCanvas(){
    var c=document.getElementById("drawing").getContext("2d");
    c.clearRect(0,0,500,500); //who designed this?
}

function drawAll(){
    tentacles()
    headb()
}

function headb(){
    var ctx = document.getElementById("drawing").getContext("2d");

    var img = document.getElementById("head-texture")
    var pat = ctx.createPattern(img, "repeat-x")
    ctx.fillStyle=pat;
    ctx.fillRect(100,10,100,50)
    //eyes
    ctx.fillStyle="#ffff84";
    ctx.fillRect(115,25,10,3)
    ctx.fillRect(175,25,10,3)
    ctx.fillStyle="black";
    ctx.fillRect(165,25,10,3)
    ctx.fillRect(125,25,10,3)
}

function tentacles(){
    var ctx = document.getElementById("drawing").getContext("2d");
    var img = document.getElementById("tentacles-texture")
    var pat = ctx.createPattern(img, "no-repeat")
//first Row
    ctx.fillStyle=pat;
    ctx.fillRect(50,25,8,75)
    ctx.fillRect(210,25,8,75)
    ctx.fillRect(125,45,8,75)
    ctx.fillRect(75,55,8,75)
//second Row
    ctx.fillStyle=pat;
    ctx.fillRect(60,75,8,75)
    ctx.fillRect(200,75,8,75)
    ctx.fillRect(160,75,8,75)
    ctx.fillRect(140,100,8,75)
    //сделай обводку и фулл имаге кнопки
}

function tline(){
    var c=document.getElementById("drawing").getContext("2d");
    c.beginPath();
    c.moveTo(randInt(0,300), randInt(0,300));
    c.lineTo(randInt(0,300), randInt(0,300));
    c.stroke();
}

function circle(){
    var c=document.getElementById("drawing").getContext("2d");
    c.beginPath();
    c.arc(randInt(0,300),randInt(0,300),50,0,2*Math.PI, true);
    c.stroke();
}

function square(){
    var c=document.getElementById("drawing").getContext("2d");
    var w = document.getElementById("width");
    var h = document.getElementById("height");
    c.fillStyle="red";
    c.fillRect(randInt(0,300),randInt(0,300),w.value,h.value)
}

function randInt(min, max){
    return Math.floor(Math.random() * (max - min + 1) ) + min;
}