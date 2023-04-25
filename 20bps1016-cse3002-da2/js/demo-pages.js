var c1 = document.getElementById("myCanvas1");
var ctx1 = c.getContext("2d");
ctx1.beginPath();
ctx1.arc(95,50,40,0,2*Math.PI);
ctx1.stroke();
ctx1.font = "30px Arial";
ctx1.fillText("CIRCLE", 10, 50);


var c2 = document.getElementById("myCanvas");
var ctx2 = c.getContext("2d");
// Create gradient 
var grd = ctx.createRadialGradient(75, 50, 5, 90, 60, 100);
grd.addColorStop(0, "red");
grd.addColorStop(1, "white");
// Fill with gradient
ctx2.fillStyle = grd;
ctx2.fillRect(10, 10, 150, 80);
